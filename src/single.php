



<?php get_header(); ?>

<section id="content" role="main">
	<div class="content-inner">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
			<?php get_template_part( 'partials/entry' ); ?>
			
			<?php if ( is_single() ) : ?>
			<footer class="content-footer">
				<?php get_template_part( 'nav', 'below-single' ); ?>
			</footer>
			<?php endif; ?>

			<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
		<?php endwhile; endif; ?>
	</div>
</section>
<?php get_sidebar(is_single()? null:'page'); ?>
<?php get_footer(); ?>