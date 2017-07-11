<?php /*
	Template Name: No Sidebar
*/?>
<?php get_header(); ?>

<section id="content" class="wide" role="main">
	<div class="content-inner">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<?php get_template_part( 'entry' ); ?>
			<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
		
		<?php endwhile; endif; ?>
	</div>
</section>
<?php get_footer(); ?>