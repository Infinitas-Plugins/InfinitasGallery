<?php
	class GalleryAppController extends AppController{
		public $name = 'GalleryAppController';


		/**
		 * components.
		 *
		 * @access public
		 * @var array
		 */
		public $components = array(
			'Filter.Filter'
		);

		/**
		 * Helpers.
		 *
		 * @access public
		 * @var array
		 */
		public $helpers = array(
			'Filter.Filter'
		);
	}