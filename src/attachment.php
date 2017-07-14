<?php global $post; ?>



<?php get_header(); ?>

<section id="content" role="main">
	<div class="content-inner">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'partials/attachment' , 'entry' ); ?>

			<?php $attachments = get_children( array( 'post_parent' => $post->post_parent ) ); ?>
			<?php if ( count( $attachments )>1 ) : ?>
			<footer class="content-footer">
				<?php get_template_part( 'nav', 'below-attachment' ); ?>
			</footer>
			<?php endif; ?>

			<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
		<?php endwhile; endif; ?>
	</div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>