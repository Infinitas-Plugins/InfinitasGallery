<?php
	/**
	 *
	 *
	 */
	class ImagesController extends GalleryAppController {
		public function index() {
			$categories = isset($this->request->params['category'])
				? $this->Image->Category->children($this->request->params['category'])
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
		
		public function admin_dashboard() {
			$globalImages = $this->{$this->modelClass}->find(
				'all',
				array(
					'group' => array(
						'GlobalContent.global_category_id'
					)
				)
			);
			
			$this->set(compact('globalImages'));
		}

		public function admin_index() {
			$this->Paginator->settings = array(
				'GlobalCategory.title' => 'asc'
			);
			$images = $this->Paginator->paginate(null, $this->Filter->filter);

			$filterOptions = $this->Filter->filterOptions;
			$filterOptions['fields'] = array(
				'GlobalContent.title',
				'GlobalContent.body',
				'GlobalContent.global_category_id' => $this->Image->GlobalContent->find('categoryList'),
				'active' => Configure::read('CORE.active_options')
			);
			$this->set(compact('images', 'filterOptions'));
		}
	}