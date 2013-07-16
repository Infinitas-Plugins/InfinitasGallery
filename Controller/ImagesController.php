<?php
/**
 *
 *
 */

class ImagesController extends GalleryAppController {

	public function index() {
		$categories = isset($this->request->params['slug'])
			? $this->Image->GlobalContent->GlobalCategory->children($this->request->params['slug'])
			: $this->Image->GlobalContent->GlobalCategory->getActiveIds();

		$this->Image->GlobalContent->GlobalCategory->bindModel(array(
			'hasMany' => array(
				'Image' => array(
					'className' => 'Gallery.Image',
					'foreignKey' => 'foreign_key'
				)
			)
		));

		$galleries = $this->Image->find('all', array(
			'conditions' => array(
				'GlobalCategory.id' => Hash::extract($categories, '{n}.GlobalCategory.id')
			),
			'contain' => array(
				//'Image'
			),
			'group' => array('GlobalCategory.id')
		));

		$this->set(compact('galleries'));
	}
	
	public function admin_dashboard() {
		$globalImages = $this->{$this->modelClass}->find('all', array(
			'group' => array(
				'GlobalContent.global_category_id'
			)
		));
		
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