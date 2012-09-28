<?php
App::uses('Image', 'Gallery.Model');

/**
 * Image Test Case
 *
 */
class ImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.gallery.image',
		'plugin.gallery.global_content',
		'plugin.gallery.global_layout',
		'plugin.gallery.theme',
		'plugin.gallery.global_category',
		'plugin.gallery.group',
		'plugin.gallery.view_counter_view',
		'plugin.gallery.user',
		'plugin.gallery.global_tagged',
		'plugin.gallery.global_tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Image = ClassRegistry::init('Gallery.Image');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Image);

		parent::tearDown();
	}

}
