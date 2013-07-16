<?php
/**
 * Image model for galleries
 */

class Image extends GalleryAppModel {

/**
 * Custom find methods
 * 
 * @var array
 */
	public $findMethods = array(
		'gallery' => true,
		'image' => true
	);

/**
 * Attatch the contentable functionality
 * 
 * @var boolean
 */
	public $contentable = true;

/**
 * Allow gallery images to be locked while in use
 * 
 * @var boolean
 */
	public $lockable = true;
	
/**
 * Get a collection of images based on category slug
 * 
 * @param string $state the state before / after
 * @param array $query the query conditions
 * @param array $results the query results 
 * 
 * @return array
 */
	protected function _findGallery($state, $query, $results = array()) {
		if ($state === 'before') {
			if(empty($query[0])) {
				throw new Exception('No gallery selected');
			}
			
			$query['conditions'] = array_merge((array)$query['conditions'], array(
				'GlobalCategoryContent.slug' => $query[0]
			));
			
			return $query;
		}

		return $results;
	}

/**
 * Get a single image based on slug / primary key
 * 
 * @param string $state the state before / after
 * @param array $query the query conditions
 * @param array $results the query results 
 * 
 * @return array
 */
	protected function _findImage($state, $query, $results = array()) {
		if ($state == 'before') {
			if (empty($query[0])) {
				throw new InvalidArgumentException(__d('gallery', 'No image specified'));
			}
			$query['conditions'] = array_merge((array)$query['conditions'], array(
				$this->alias . '.id' => $this->GlobalContent->field('foreign_key', array(
					'or' => array(
						'GlobalContent.slug' => $query[0],
						'GlobalContent.foreign_key' => $query[0]
					)
				))
			));

			$query['limit'] = 1;
			return $query;
		}

		if (empty($results)) {
			return array();
		}

		return $results[0];
	}

}