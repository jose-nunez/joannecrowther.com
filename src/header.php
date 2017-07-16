<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed">
		<header id="header" class="main-header" role="banner">
			<section id="branding">
				<div id="site-title">
					<?php /*
					<?php if (($isFront = is_front_page() || is_home() || is_front_page() && is_home())): ?>
						<h1>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
								<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
							</a>
						</h1>	
					<?php else: ?>
					*/ ?>
						<h1 class="main-title">
							<a class="hidden" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
								<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
							</a>
						</h1>
					<?php //endif; ?>
				</div>
				<div id="site-description"><?php bloginfo( 'description' ); ?></div>
			</section>
			<nav id="menu" role="navigation">
				<?php /*
				<div id="search">
					<?php get_search_form(); ?>
				</div>
				*/ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu','container_class'=>'main-menu-wrap','menu_class'=>'main-menu','menu_id'=>'main-menu') ); ?>
			</nav>
		</header>