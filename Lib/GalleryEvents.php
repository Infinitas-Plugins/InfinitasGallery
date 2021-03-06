<?php
	class GalleryEvents {
		public function onSetupCache(Event $Event) {
			Configure::load('Gallery.config');
			return array(
				'name' => 'gallery',
				'config' => array(
					'prefix' => 'gallery.'
				)
			);
		}

		public function onPluginRollCall(Event $Event) {
			return array(
				'name' => 'Gallery',
				'description' => 'Build and manage image galleries',
				'icon' => '/gallery/img/icon.png',
				'author' => 'Infinitas',
				'dashboard' => array('plugin' => 'gallery', 'controller' => 'images', 'action' => 'dashboard'),
			);
		}

		public function onAdminMenu(Event $Event) {
			$menu['main'] = array(
				'Dashboard' => array('plugin' => 'gallery', 'controller' => 'images', 'action' => 'dashboard'),
				'Gallery' => array('plugin' => 'gallery', 'controller' => 'images', 'action' => 'index'),
			);

			return $menu;
		}

		/**
		 * The javascript to load into Infinitas
		 *
		 * @param object $Event the current event
		 * @param array $data controller params
		 * @return mixed, string|array of js files. false if not needed
		 */
		public function onRequireJavascriptToLoad(Event $Event, $data) {
			if(!GalleryEvents::__needAssets($data)) {
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
		 * @param object $Event the current event
		 * @param array $data controller params
		 * @return mixed, string|array of css files. false if not needed
		 */
		public function onRequireCssToLoad(Event $Event, $data) {
			if(!GalleryEvents::__needAssets($data)) {
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
		private function __needAssets($data) {
			return true; //$data['plugin'] == 'gallery' && !$data['admin'];
		}
	}