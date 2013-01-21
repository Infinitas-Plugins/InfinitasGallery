<?php
App::uses('AllTestsBase', 'Test/Lib');

class AllGalleryTestsTest extends AllTestsBase {

/**
 * Suite define the tests for this suite
 *
 * @return void
 */
	public static function suite() {
		$suite = new CakeTestSuite('All Gallery test');

		$path = CakePlugin::path('Gallery') . 'Test' . DS . 'Case' . DS;
		$suite->addTestDirectoryRecursive($path);

		return $suite;
	}
}
