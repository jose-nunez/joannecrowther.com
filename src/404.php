



<?php get_header(); ?>
<div id="container" class="clearfix">

	<section id="content" role="main">
		<div class="content-inner">
			<article id="post-0" class="post not-found entry">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Page not Found', 'joannecrowther' ); ?></h1>
				</header>
				<section class="entry-content">
					<p class="align-center">
						<?php _e( 'Nothing found for the requested page. Try a search instead?', 'joannecrowther' ); ?>
					</p>
					<?php get_search_form(); ?>
				</section>
			
			</article>
		</div>
	</section>
	<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>