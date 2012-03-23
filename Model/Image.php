<?php
	/**
	 *
	 *
	 */
	class Image extends GalleryAppModel {
		public $virtualFields = array(
			'image_path' => 'CONCAT("/files/image/image/", Image.dir, "/", Image.image)'
		);
		
		public $findMethods = array(
			'gallery' => true
		);

		public $contentable = true;
		
		public $lockable = true;

		public $actsAs = array(
			'Filemanager.Upload' => array(
				'image' => array(
					'thumbnailSizes' => array(
						'jumbo' => '1600l',
						'large' => '1000l',
						'medium' => '600l',
						'small' => '200l',
						'thumb' => '50l'
					)
				)
			)
	    );
		
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