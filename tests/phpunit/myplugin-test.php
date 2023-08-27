<?php

/**
 * Class My_Plugin
 *
 * @package myplugin
 */

/**
 * My_Plugin test case.
 */
class Test_CPA_Theme_Options extends WP_UnitTestCase
{
	public function testEnqueueAdminScripts()
	{
		// Get an instance of CPA_Theme_Options
		$my_enqueue_scripts = CPA_Theme_Options::get_instance();

		// Mock WordPress functions
		$this->expectOutputString('');
		$this->assertTrue(function_exists('wp_enqueue_style'));
		$this->assertTrue(function_exists('wp_enqueue_script'));

		// Call the enqueue_admin_scripts method
		$my_enqueue_scripts->enqueue_admin_scripts();

		// Assert that the styles and scripts were enqueued
		$this->assertContains('wp-color-picker', wp_styles()->queue);
		$this->assertContains('cpa_custom_js', wp_scripts()->queue);
	}

	public function test_option_setting_and_validation()
	{
		// Get an instance of CPA_Theme_Options
		$cpa_instance = CPA_Theme_Options::get_instance();

		// Simulate user input
		$fields = array(
			'title' => 'My Test Title',
			'background' => '#FF0000',
		);

		// Validate the options
		$validated_options = $cpa_instance->validate_options($fields);

		// Make assertions
		$this->assertEquals('My Test Title', $validated_options['title']);
		$this->assertEquals('#FF0000', $validated_options['background']);
	}

	public function test_color_validation()
	{
		// Get an instance of CPA_Theme_Options
		$cpa_instance = CPA_Theme_Options::get_instance();

		// Valid and invalid colors
		$valid_color = '#00FF00';
		$invalid_color = 'invalidcolor';

		// Check color validation
		$this->assertTrue($cpa_instance->check_color($valid_color));
		$this->assertFalse($cpa_instance->check_color($invalid_color));
	}
}
