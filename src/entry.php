
<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
	<header class="entry-header">
		<div class="thumbnail">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail(''); } ?>
		</div>
		
		<?php echo get_the_term_list($post->ID,'compilation','<h2 class="entry-compilation hidden">','','</h2>'); ?>

		<h1 class="entry-title">
			<a class="hidden" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php //edit_post_link(); ?>
		<?php //if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
	</header>
	<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
	<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
</article>