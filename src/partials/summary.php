
<article id="post-<?php the_ID(); ?>" <?php post_class('summary clearfix'); ?>>
	<header class="sumary-thumbnail <?php echo !has_post_thumbnail()? 'hidden':''; ?>"> 
		<a class="hidden" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
			<?php get_template_part( 'partials/entry/thumbnail' ); ?>
		</a>
	</header>
	<section class="summary-content <?php echo !has_post_thumbnail()? 'wide':''; ?>">
		<div class="summary-content-inner">
			<?php if(!is_tax('compilation')) echo get_the_term_list($post->ID,'compilation','<h2 class="summary-compilation hidden">','','</h2>'); ?>
			<h1 class="summary-title"><a class="hidden" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php the_excerpt(); ?>
			<?php if( is_search() ) { ?><div class="entry-links"><?php wp_link_pages(); ?></div><?php } ?>
			<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
		</div>
	</section>
</article>