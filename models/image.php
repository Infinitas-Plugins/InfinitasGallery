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

/*
	class Image extends GalleryAppModel{
		var $name = 'Image';

		public $virtualFields = array(
			'image_path' => 'CONCAT("content/gallery/", Image.image)'
		);

		public $actsAs = array(
	        'Filemanager.Upload' => array(
	        	'image' => array(
		        	'path' => 'plugins{DS}gallery{DS}webroot{DS}images{DS}',
					'fields' => array(
						'dir' => 'dir',
						'type' => 'type',
						'size' => 'size'
					),
					'thumbnails' => false,
					'thumbsizes' => array(
						'xvga' => '1024x768',
						'vga' => '640x480',
						'thumb' => '80x80'
					),
					'thumbnailQuality' => 80,
					'thumbnailMethod' => 'php'
				)
	        )
	    );

		public function  __construct($id = false, $table = null, $ds = null) {
			parent::__construct($id, $table, $ds);

			$this->validate = array(
				'image' => array(
					'isCompletedUpload' => array(
						'rule' => 'isCompletedUpload',
						'message' => __('Image was not successfully uploaded', true)
					),
					'isFileUpload' => array(
						'rule' => 'isFileUpload',
						'message' => __('Image was missing from submission', true)
					),
					'isSuccessfulWrite' => array(
						'rule' => 'isSuccessfulWrite',
						'message' => __('Image could not be written to the server', true)
					)
				)
			);
		}
	}
*/