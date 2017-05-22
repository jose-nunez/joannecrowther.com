<?php
/*
Plugin Name: joannecrowther.com - Google Analitycs
Description: Adds google analytics tracking code
Plugin URI: www.josenunez.org
Version: 1.0
Author: Jose Nunez
Author URI: www.josenunez.org
*/


define('URL',plugin_dir_url( __FILE__ ));

class jnTinyGoogleAnalytics{

	function install(){
	}
	function uninstall(){

	}

	function init(){
		// add_action( 'wp_enqueue_scripts',array($this,'load_scripts'));
		wp_register_script('jno_tiny_google_analytics', URL.'/js/main.min.js',null,null);
		wp_enqueue_script('jno_tiny_google_analytics');
	}
	
	function load_scripts(){
		wp_enqueue_script('jno_tiny_google_analytics');
		// wp_enqueue_style( 'font-awesome');
	}
}

global $jno_tinyGoogleAnalytics;
$jno_tinyGoogleAnalytics = new jnTinyGoogleAnalytics();
add_action('init', array($jno_tinyGoogleAnalytics,'init'),10);
register_activation_hook( __FILE__, array($jno_tinyGoogleAnalytics,'install'));
register_deactivation_hook( __FILE__,array($jno_tinyGoogleAnalytics,'uninstall'));


?>