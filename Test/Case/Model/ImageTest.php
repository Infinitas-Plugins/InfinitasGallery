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
		'plugin.themes.theme',
		'plugin.users.group',
		'plugin.users.user',
		'plugin.view_counter.view_counter_view',
		'plugin.contents.global_tagged',
		'plugin.contents.global_tag',
		'plugin.contents.global_category',
		'plugin.contents.global_content',
		'plugin.contents.global_layout',
		'plugin.locks.lock',
		'plugin.management.ticket',
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

	public function testSomething() {

	}

}
