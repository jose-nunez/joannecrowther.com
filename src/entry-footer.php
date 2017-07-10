<footer class="entry-footer">
	<?php if(count(get_the_category())>0):?>
		<span class="cat-links"><?php _e( 'Categories: ', 'joannecrowther' ); ?><?php the_category( ', ' ); ?></span>
	<?php endif; ?>
	<span class="tag-links"><?php the_tags(); ?></span>
</footer> 