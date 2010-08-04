<?php
	/**
	 *
	 *
	 */
	class Image extends GalleryAppModel{
		var $name = 'Image';

		public $virtualFields = array(
			'image_path' => 'CONCAT("content/gallery/", Image.image)'
		);

		public $actsAs = array(
	        'MeioUpload.MeioUpload' => array(
	        	'image' => array(
		        	'dir' => 'img{DS}content{DS}gallery',
		        	'create_directory' => true,
		        	'allowed_mime' => array(
			        	'image/jpeg',
			        	'image/pjpeg',
			        	'image/png'
					),
					'allowed_ext' => array(
						'.jpg',
						'.jpeg',
						'.png'
					)
				)
	        )
	    );
	}