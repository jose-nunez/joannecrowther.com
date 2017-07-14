<?php

// Remove size from post featured image
add_filter( 'post_thumbnail_html', 'joannecrowther_remove_image_size_attributes', 10);
// add_filter( 'image_send_to_editor', 'joannecrowther_remove_image_size_attributes',10);
function joannecrowther_remove_image_size_attributes( $html ) {
	return preg_replace( '/(width|height)="\d*"/', '', $html );
}

// Remove size from image gallery shortcode
add_filter('do_shortcode_tag', 'joannecrowther_remove_image_gallery_size_attributes', 10, 2);
function joannecrowther_remove_image_gallery_size_attributes( $output, $tag ) {
	if ( 'gallery' !== $tag ) {
		return $output;
	}
	return preg_replace( '/(width|height)="\d*"/', '', $output );
}

// lightbox-gallery.php Line #570
// $total = count($attachments)-(is_numeric($from)? $from:0);

//Overrides Template for image-widget 
add_filter('sp_template_image-widget_widget.php', 'joannecrowther_image_widget_template');
function joannecrowther_image_widget_template($template) {
    return get_template_directory() . '/image_widget_template/widget.php';
}
add_filter('image_widget_image_maxwidth', 'joannecrowther_image_widget_maxwidth');
function joannecrowther_image_widget_maxwidth($template) {
    return null;
}


// Show ID in admin Pages
add_filter( 'manage_posts_columns', 'revealid_add_id_column', 5 );
add_filter( 'manage_pages_columns', 'revealid_add_id_column', 5 );
add_action( 'manage_posts_custom_column', 'revealid_id_column_content', 5, 2 );
add_action( 'manage_pages_custom_column', 'revealid_id_column_content', 5, 2 );
add_filter( 'manage_posts_sortable_columns', 'revealid_id_sortable_column' );
function revealid_add_id_column( $columns ) {
	$checkbox = array_slice( $columns , 0, 1 );
	$columns = array_slice( $columns , 1 );

	$id['revealid_id'] = 'ID';
	
	$columns = array_merge( $checkbox, $id, $columns );
	return $columns;
}
function revealid_id_column_content( $column, $id ) {
	if( 'revealid_id' == $column ) {
		echo $id;
	}
}
/*function revealid_id_sortable_column( $columns ) {
	$columns['revealid_id'] = 'ID';
    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);
    return $columns;
}*/


// Attachment Title
add_filter( 'the_title', 'joannecrowther_attachment_empty_title', 10, 2 );
function joannecrowther_attachment_empty_title( $title, $id = null ) {

    if ( is_attachment() && !$title) {
		$title = 'No title';
    }

    return $title;
}


/* ________________________________________________________________________________________________________________ */

add_action( 'after_setup_theme', 'joannecrowther_setup' );
function joannecrowther_setup(){
	load_theme_textdomain( 'joannecrowther', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;
	register_nav_menus(array( 'main-menu' => __( 'Main Menu', 'joannecrowther' )));
}

add_action( 'wp_enqueue_scripts', 'joannecrowther_load_scripts' );
function joannecrowther_load_scripts(){
	wp_enqueue_script( 'jquery' );
}

add_action( 'comment_form_before', 'joannecrowther_enqueue_comment_reply_script' );
function joannecrowther_enqueue_comment_reply_script(){
	if (get_option('thread_comments')){
		wp_enqueue_script('comment-reply');
	}
}

add_filter( 'the_title', 'joannecrowther_title' );
function joannecrowther_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}

add_filter( 'wp_title', 'joannecrowther_filter_wp_title' );
function joannecrowther_filter_wp_title( $title ){
	return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'joannecrowther_widgets_init' );
function joannecrowther_widgets_init(){
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'joannecrowther' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area for Pages', 'joannecrowther' ),
		'id' => 'primary-widget-area-pages',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}

function joannecrowther_custom_pings($comment){
	$GLOBALS['comment'] = $comment;
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}

add_filter( 'get_comments_number', 'joannecrowther_comments_number' );
function joannecrowther_comments_number($count){
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}
