<?php get_header(); ?>
<div id="container" class="right-sidebar clearfix">
	<section id="content" role="main">
		<div class="content-inner">
			<header class="header">
				<h1 class="archive-title author"><?php _e( 'Author Archives', 'joannecrowther' ); ?>: <?php the_author_link(); ?></h1>





			</header>			
			<?php if ( '' != get_the_author_meta( 'user_description' ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . get_the_author_meta( 'user_description' ) . '</div>' ); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'partials/summary' ); ?>
			<?php endwhile; endif; ?>
			<?php get_template_part( 'nav', 'below' ); ?>
		</div>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>