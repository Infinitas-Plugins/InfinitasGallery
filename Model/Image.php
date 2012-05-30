<?php
	/**
	 *
	 *
	 */
	class Image extends GalleryAppModel {		
		public $findMethods = array(
			'gallery' => true
		);

		public $contentable = true;
		
		public $lockable = true;
		
		protected function _findGallery($state, $query, $results = array()) {
			if ($state === 'before') {
				if(empty($query[0])) {
					throw new Exception('No gallery selected');
				}
				
				$query['conditions'] = array_merge(
					(array)$query['conditions'],
					array(
						'GlobalCategoryContent.slug' => $query[0]
					)
				);
				unset($query[0]);
				
				return $query;
			}

			return $results;
		}
	}