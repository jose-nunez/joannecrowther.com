
<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ): 
			$bkgpos = ''; $custom_pos = get_post_meta(get_the_ID(),'background-position',true);
			if($custom_pos) $bkgpos = 'background-position:'.$custom_pos.';';

			$bkgheight = ''; $custom_height = get_post_meta(get_the_ID(),'background-height',true);
			if($custom_height) $bkgheight = 'padding-bottom:'.$custom_height.';';
		?>
			<div class="thumbnail" 
				style="background-image:url(<?php echo get_template_directory_uri() ?>/img/frame_1_white.png),url(<?php echo get_the_post_thumbnail_url(); ?>);<?php echo $bkgpos.$bkgheight; ?>">
			</div>
		<?php endif; ?>
		<?php echo get_the_term_list($post->ID,'compilation','<h2 class="entry-compilation hidden">','','</h2>'); ?>
		<h1 class="entry-title"><a class="hidden" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php edit_post_link(); ?>
		<?php //get_template_part( 'entry', 'meta' ); ?>
	</header>
	<?php get_template_part( 'partials/entry/entry', ( 'content' ) ); ?>
	<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
</article>