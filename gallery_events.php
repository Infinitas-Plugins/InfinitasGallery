<?php
	class GalleryEvents{
		public function onSetupCache(){
			Configure::load('gallery.config');
			return array(
				'name' => 'gallery',
				'config' => array(
					'prefix' => 'gallery.'
				)
			);
		}

		/**
		 * The javascript to load into Infinitas
		 *
		 * @param object $event the current event
		 * @param array $data controller params
		 * @return mixed, string|array of js files. false if not needed
		 */
		public function onRequireJavascriptToLoad(&$event, $data){
			if(!GalleryEvents::__needAssets($data)){
				return false;
			}
			
			return array(
				'/gallery/js/pirobox',
				'/gallery/js/gallery'
			);
		}

		/**
		 * The css to load into Infinitas
		 *
		 * @param object $event the current event
		 * @param array $data controller params
		 * @return mixed, string|array of css files. false if not needed
		 */
		public function onRequireCssToLoad(&$event, $data){			
			if(!GalleryEvents::__needAssets($data)){				
				return false;
			}

			return array(
				'/gallery/css/gallery',
				'/gallery/css/style_'.Configure::read('GalleryPlugin.style')
			);
		}

		/**
		 * Check if the assets are needed for this request.
		 * 
		 * @param array $data params from controller
		 * @return bool true if assets are neede, false if not
		 */
		private function __needAssets($data){			
			return $data['plugin'] == 'gallery' && !$data['admin'];
		}
	}