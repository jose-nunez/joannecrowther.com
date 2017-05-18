<?php
/*
Plugin Name: Custom Taxonomies for joannecrowther.com
Description: creates custom taxomies
*/
?>

<?php 
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_compilation_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it compilation for your posts
function create_compilation_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

$labels = array(
	'name' => _x( 'Compilation', 'taxonomy general name' ),
	'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
	'search_items' =>__( 'Search Compilation' ),
	'all_items' => __( 'All Compilation' ),
	'parent_item' => __( 'Parent Topic' ),
	'parent_item_colon' => __( 'Parent Topic:' ),
	'edit_item' => __( 'Edit Topic' ), 
	'update_item' => __( 'Update Topic' ),
	'add_new_item' => __( 'Add New Topic' ),
	'new_item_name' => __( 'New Topic Name' ),
	'menu_name' => __( 'Compilation' ),
); 	

// Now register the taxonomy

register_taxonomy('compilation',array('post'), array(
	'hierarchical' => true,
	'labels' => $labels,
	'show_ui' => true,
	'show_admin_column' => true,
	'query_var' => true,
	'rewrite' => array( 'slug' => 'topic' ),
));

}
?>