<aside id="sidebar" role="complementary">
	<div class="sidebar-inner">
		<?php if ( is_active_sidebar( 'primary-widget-area-pages' ) ) : ?>
		<div id="primary" class="widget-area">
		<ul class="xoxo">
		<?php dynamic_sidebar( 'primary-widget-area-pages' ); ?>
		</ul>
		</div>
		<?php endif; ?>
	</div>
</aside>
