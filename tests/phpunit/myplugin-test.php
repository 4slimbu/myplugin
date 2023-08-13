<?php
/**
 * Class My_Plugin
 *
 * @package myplugin
 */

/**
 * My_Plugin test case.
 */
class My_Plugin extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */
	public function test_say_hello() {
		// Replace this with some actual testing code.
		$this->assertEquals( hello('Sudip'), 'Hello Sudip. Welcome to Kathmandu' );
	}
}

