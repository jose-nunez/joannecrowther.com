
<?php get_header(); ?>
<div id="container" class="right-sidebar clearfix">
	<section id="content" role="main">
		<div class="content-inner">
			<header class="header">
				<h1 class="archive-title"><?php 
				if ( is_day() ) { printf( __( 'Daily Archives: %s', 'joannecrowther' ), get_the_time( get_option( 'date_format' ) ) ); }
				elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'joannecrowther' ), get_the_time( 'F Y' ) ); }
				elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'joannecrowther' ), get_the_time( 'Y' ) ); }
				else { _e( 'Archives', 'joannecrowther' ); }
				?></h1>
			</header>
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'partials/summary' ); ?>
			<?php endwhile; endif; ?>
			<?php get_template_part( 'nav', 'below' ); ?>
		</div>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>