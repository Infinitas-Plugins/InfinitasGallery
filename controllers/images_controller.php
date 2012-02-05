<?php
	/**
	 *
	 *
	 */
	class ImagesController extends GalleryAppController{
		public $name = 'Images';

		public function index() {
			$categories = isset($this->params['category'])
				? $this->Image->Category->children($this->params['category'])
				: $this->Image->Category->getActiveIds();

			$this->Image->Category->bindModel(
				array(
					'hasMany' => array(
						'Image' => array(
							'className' => 'Gallery.Image',
							'foreignKey' => 'category_id'
						)
					)
				)
			);

			$galleries = $this->Image->GlobalCategory->find(
				'all',
				array(
					'conditions' => array(
						'GlobalCategory.id' => Set::extract('/GlobalCategory/id', $categories)
					),
					'contain' => array(
						'Image'
					)
				)
			);

			$this->set(compact('galleries'));
		}

		public function admin_index() {
			$this->paginate['Image'] = array(
				'contain' => array(
					'Category'
				)
			);
			$images = $this->paginate(null, $this->Filter->filter);

			$filterOptions = $this->Filter->filterOptions;
			$filterOptions['fields'] = array(
				'title',
				'description',
				'category_id' => $this->Image->Category->generatetreelist(),
				'active' => Configure::read('CORE.active_options')
			);
			$this->set(compact('images', 'filterOptions'));
		}

		public function admin_add() {
			if (!empty($this->data)) {
				$this->Image->create();
				if ($this->Image->save($this->data)) {
					$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'image'));
					$this->redirect(array('action' => 'index'));
				}

				else {
					$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'image'));
				}
			}
		}

		public function admin_edit($id = null) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(sprintf(__('Invalid %s', true), 'image'));
				$this->redirect(array('action' => 'index'));
			}

			if (!empty($this->data)) {
				if ($this->Image->save($this->data)) {
					$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'image'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'image'));
				}
			}

			if (empty($this->data)) {
				$this->data = $this->Image->read(null, $id);
			}
		}
	}