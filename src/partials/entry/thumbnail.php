<div>
	<?php if ( has_post_thumbnail() ): 
		$bkgpos = ''; $custom_pos = get_post_meta(get_the_ID(),'background-position',true);
		if($custom_pos) $bkgpos = 'background-position:'.$custom_pos.';';

		$bkgheight = ''; $custom_height = get_post_meta(get_the_ID(),'background-height',true);
		if($custom_height) $bkgheight = 'padding-bottom:'.$custom_height.';';
	?>
		<div class="thumbnail" 
			style="background-image:url(<?php echo get_template_directory_uri() ?>/img/frame_1_white.png),url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'large'); ?>);<?php echo $bkgpos.$bkgheight; ?>">
		</div>
	<?php endif; ?>
</div>