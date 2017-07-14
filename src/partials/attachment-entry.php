<?php global $post; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
	<header class="entry-header">
		



		<?php if ( wp_attachment_is_image( $post->ID ) ) : $att_image = wp_get_attachment_image_src( $post->ID, "large" ); ?>
		<div class="align-center">
			<a href="<?php echo wp_get_attachment_url( $post->ID ); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo $att_image[0]; ?>" class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a>
		</div>
		<?php else : ?>
			<a href="<?php echo wp_get_attachment_url( $post->ID ); ?>" title="<?php echo esc_html( get_the_title( $post->ID ), 1 ); ?>" rel="attachment"><?php echo basename( $post->guid ); ?></a>
		<?php endif; ?>
		<?php if($post->post_parent): ?>
			<h2 class="entry-compilation hidden"><a href="<?php echo get_permalink( $post->post_parent ); ?>" title="<?php printf( __( 'Return to %s', 'joannecrowther' ), esc_html( get_the_title( $post->post_parent ), 1 ) ); ?>" rev="attachment"><span class="meta-nav"></span><?php echo get_the_title( $post->post_parent ); ?></a></h2>
		<?php endif; ?>
		<h1 class="entry-title"><a class="hidden" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php edit_post_link(); ?>
		<?php //get_template_part( 'entry', 'meta' ); ?>
	</header>
	<?php get_template_part( 'partials/entry/attachment', ( 'content' ) ); ?>
	<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
</article>