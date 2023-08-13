<?php
/**
 * Plugin Name:     My Plugin
 * Plugin URI:      https://myplugin.test 
 * Description:     Test plugin 
 * Author:          Sudip Limbu 
 * Author URI:      https://sudiplimbu.com 
 * Text Domain:     myplugin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         myplugin
 */

function hello($name) {
	return "Hello " . $name . ". Welcome to Kathmandu";
}

require_once plugin_dir_path(__FILE__) . 'class-custom-color-heading.php';

$custom_color_heading = new Custom_Color_Heading();
$custom_color_heading->init();

