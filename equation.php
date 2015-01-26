<?php
/*
Plugin Name: equation2015
Plugin URI: http://fyaconiello.github.com/wp-plugin-template
Description: Wordpress + Codecogs equation editor intergration
Version: 1.0
Author: Panagiotis Halatsakos
Author URI: http://ditikos.github.io
License: GPL2
*/

if (!class_exists('WP_Equation_2015'))
{
	class WP_Equation_2015
	{
		public function __construct()
		{
			add_action( 'admin_init', array(&$this, 'equation_editor'));
		}

		public static function activate()
		{

		}

		public static function deactivate()
		{

		}

		public function equation_editor() {
			add_filter('mce_buttons', array(&$this,'myplugin_register_buttons'));
			add_filter('mce_external_plugins', array(&$this,'myplugin_register_tinymce_javascript'));
		}

		public function myplugin_register_buttons($buttons) {
		   array_push($buttons, 'eqneditor');
		   return $buttons;
		}


		public function myplugin_register_tinymce_javascript($plugin_array) {
		   $plugin_array['eqneditor'] = plugins_url('/eqneditor/plugin.min.js',__FILE__);
		   return $plugin_array;
		}

	}
}

if (class_exists('WP_Equation_2015')) {
	register_activation_hook(__FILE__,array('WP_Equation_2015','activate'));
	register_deactivation_hook(__FILE__,array('WP_Equation_2015','deactivate'));

	$wp_equation2015 = new WP_Equation_2015();
}