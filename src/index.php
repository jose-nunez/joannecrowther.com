<?php get_header(); ?>
<div id="container" class="right-sidebar clearfix">
	<section id="content" role="main">
		<div class="content-inner">
			







			<?php //if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'partials/summary' ); ?>
			<?php endwhile; endif; ?>

			<?php if ( get_next_posts_link() || get_previous_posts_link() ) : ?>
			<footer class="content-footer">
				<?php get_template_part( 'nav', 'below' ); ?>
			</footer>
			<?php endif; ?>
		</div>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>