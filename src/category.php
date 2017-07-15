<?php get_header(); ?>
<div id="container" class="right-sidebar clearfix">
	<section id="content" role="main">
		<div class="content-inner">
			<header class="header">
				<h1 class="archive-title"><?php _e( 'Category Archives: ', 'joannecrowther' ); ?><?php single_cat_title(); ?></h1>





			</header>			
			<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'partials/summary' ); ?>
			<?php endwhile; endif; ?>
			<?php get_template_part( 'nav', 'below' ); ?>
		</div>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>