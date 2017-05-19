<?php
/*
Plugin Name: Taxonomies joannecrowther.com
Description: Creates "Compilation" taxonomy
Plugin URI: www.josenunez.org
Version: 1.0
Author: Jose Nunez
Author URI: www.josenunez.org
*/


define('JCCT_URL',plugin_dir_url( __FILE__ ));

class jcCustomTaxonomies{

	function install(){}
	function uninstall(){}

	function init(){
		$labels = array(
			'name' => _x( 'Compilation', 'taxonomy general name' ),
			'singular_name' => _x( 'Compilation', 'taxonomy singular name' ),
			'search_items' =>__( 'Search Compilation' ),
			'all_items' => __( 'All Compilation' ),
			'parent_item' => __( 'Parent Compilation' ),
			'parent_item_colon' => __( 'Parent Compilation:' ),
			'edit_item' => __( 'Edit Compilation' ), 
			'update_item' => __( 'Update Compilation' ),
			'add_new_item' => __( 'Add New Compilation' ),
			'new_item_name' => __( 'New Compilation Name' ),
			'menu_name' => __( 'Compilations' ),
		);

		register_taxonomy('compilation',array('post'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'compilation' ),
		));
	}
}

global $jcct_plugin;
$jcct_plugin = new jcCustomTaxonomies();
add_action('init', array($jcct_plugin,'init'),10);
register_activation_hook( __FILE__, array($jcct_plugin,'install'));
register_deactivation_hook( __FILE__,array($jcct_plugin,'uninstall'));

?>