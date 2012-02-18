<?php
	class GalleryEvents{
		public function onSetupCache(){
			Configure::load('Gallery.config');
			return array(
				'name' => 'gallery',
				'config' => array(
					'prefix' => 'gallery.'
				)
			);
		}

		public function onPluginRollCall(){
			return array(
				'name' => 'Gallery',
				'description' => 'Build and manage image galleries',
				'icon' => '/gallery/img/icon.png',
				'author' => 'Infinitas',
				'dashboard' => array('plugin' => 'gallery', 'controller' => 'images', 'action' => 'index'),
			);
		}

		public function onAdminMenu($event){
			$menu['main'] = array(
				'Gallery' => array('controller' => 'images', 'action' => 'index'),
			);

			return $menu;
		}

		/**
		 * The javascript to load into Infinitas
		 *
		 * @param object $event the current event
		 * @param array $data controller params
		 * @return mixed, string|array of js files. false if not needed
		 */
		public function onRequireJavascriptToLoad($event, $data){
			if(!GalleryEvents::__needAssets($data)){
				return false;
			}
			
			return array(
				'Gallery.pirobox',
				'Gallery.gallery'
			);
		}

		/**
		 * The css to load into Infinitas
		 *
		 * @param object $event the current event
		 * @param array $data controller params
		 * @return mixed, string|array of css files. false if not needed
		 */
		public function onRequireCssToLoad($event, $data){			
			if(!GalleryEvents::__needAssets($data)){				
				return false;
			}

			return array(
				'Gallery.gallery',
				'Gallery.style_'.Configure::read('GalleryPlugin.style')
			);
		}

		/**
		 * Check if the assets are needed for this request.
		 * 
		 * @param array $data params from controller
		 * @return bool true if assets are neede, false if not
		 */
		private function __needAssets($data){			
			return true; //$data['plugin'] == 'gallery' && !$data['admin'];
		}
	}