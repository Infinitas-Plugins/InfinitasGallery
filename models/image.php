<?php
	/**
	 *
	 *
	 */
	class Image extends GalleryAppModel {
		public $name = 'Image';

		public $virtualFields = array(
			'image_path' => 'CONCAT("content/gallery/", Image.image)'
		);

		public $contentable = true;

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
	}