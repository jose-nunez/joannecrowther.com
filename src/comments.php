<?php if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) return; ?>
<section id="comments">
<?php  if ( have_comments() ) : 
	global $comments_by_type;
	$comments_by_type = &separate_comments( $comments );
	if ( ! empty( $comments_by_type['comment'] ) ) : 
	?>
		<section id="comments-list" class="comments">
			<h3 class="comments-title"><?php comments_number(); ?></h3>
			<?php if ( get_comment_pages_count() > 1 ) : ?>
				<nav id="comments-nav-above" class="comments-navigation" role="navigation">
					<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
				</nav>
			<?php endif; ?>
			<ul>
				<?php 
				/*$args = array(
					'walker'            => null,
					'style'             => 'ul',
					'callback'          => null,
					'end-callback'      => null,
					'type'              => 'all',
					'reply_text'        => 'Reply',
					'page'              => '',
					'per_page'          => '',
					'avatar_size'       => 32,
					'reverse_top_level' => null,
					'reverse_children'  => '',
					'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
					'short_ping'        => false,   // @since 3.6
				        'echo'              => true     // boolean, default is true
				);*/

				wp_list_comments( 'type=comment' ); ?>
			</ul>
			<?php if ( get_comment_pages_count() > 1 ) : ?>
			<nav id="comments-nav-below" class="comments-navigation" role="navigation">
				<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
			</nav>
			<?php endif; ?>
		</section>
	<?php 
	endif; 
	if ( ! empty( $comments_by_type['pings'] ) ) : 
		$ping_count = count( $comments_by_type['pings'] ); 
		?>
		<section id="trackbacks-list" class="comments">
			<h3 class="comments-title"><?php echo '<span class="ping-count">' . $ping_count . '</span> ' . ( $ping_count > 1 ? __( 'Trackbacks', 'joannecrowther' ) : __( 'Trackback', 'joannecrowther' ) ); ?></h3>
			<ul>
				<?php wp_list_comments( 'type=pings&callback=joannecrowther_custom_pings' ); ?>
			</ul>
		</section>
	<?php 
	endif; 
endif;
if ( comments_open() ){

	$comment_opt = array(
		// 'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment here', 'noun' ) . '</label><textarea placeholder="HOLA LISA MUACK MUACK" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>'
		'comment_field' => '<p class="comment-form-comment"><label for="comment">' . '</label><textarea placeholder="'. _x( 'Comment here', 'noun' ) .'" id="comment" name="comment" rows="8" aria-required="true"></textarea></p>'
	);

	comment_form($comment_opt);
}
?>
</section>