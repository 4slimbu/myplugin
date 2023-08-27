<?php

/**
 * Class My_Plugin
 *
 * @package myplugin
 */

/**
 * My_Plugin test case.
 */
class Test_MyPlugin extends WP_UnitTestCase
{
	public function testEnqueueAdminScripts()
	{
		// Get an instance of MyPlugin
		$my_enqueue_scripts = MyPlugin::get_instance();

		// Mock WordPress functions
		$this->expectOutputString('');
		$this->assertTrue(function_exists('wp_enqueue_style'));
		$this->assertTrue(function_exists('wp_enqueue_script'));

		// Call the enqueue_admin_scripts method
		$my_enqueue_scripts->enqueue_admin_scripts();

		// Assert that the styles and scripts were enqueued
		$this->assertContains('myp-main-css', wp_styles()->queue);
		$this->assertContains('myp-main-js', wp_scripts()->queue);
	}
}
