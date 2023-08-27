<?php

/* 
Plugin Name: My Plugin 
Plugin URI: https://myplugin.test 
Description: Demo about the tdd 
Version: 1.0 
Author: Sudip Limbu 
Author URI: https://sudiplimbu.com 
*/

/** 
 * Main Class - My Plugin 
 */
class MyPlugin
{

	/*--------------------------------------------* 
	* Attributes 
	*--------------------------------------------*/

	/** Refers to a single instance of this class. */
	private static $instance = null;

	/*--------------------------------------------* 
	* Constructor 
	*--------------------------------------------*/

	/** 
	 * Creates or returns an instance of this class. 
	 * 
	 * @return MyPlugin A single instance of this class. 
	 */
	public static function get_instance()
	{

		if (null == self::$instance) {
			self::$instance = new self;
		}

		return self::$instance;
	} // end get_instance; 

	/** 
	 * Initializes the plugin by setting localization, filters, and administration functions. 
	 */
	private function __construct()
	{
		// Register javascript 
		add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
	}

	/*--------------------------------------------* 
	* Functions 
	*--------------------------------------------*/

	/** 
	 * Function that will add css and javascript file. 
	 */
	public function enqueue_admin_scripts()
	{
		// CSS rules
		wp_enqueue_style('myp-main-css', plugins_url('main.css', __FILE__));


		// Make sure to add the dependecy to js file 
		wp_enqueue_script('myp-main-js', plugins_url('main.js', __FILE__), array('jquery'), '', true);
	}
}

MyPlugin::get_instance();
