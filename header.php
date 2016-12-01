<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package deadpool
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'deadpool' ); ?></a>
	<header id="masthead" class="site-header" role="banner" style="background-image:url('<?php header_image(); ?>')">
		<div class="overlay"></div>
		<div class="top-bar row">
		<div class="container">
			<div class="site-branding col-md-7">
				<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="http://localhost/xprdev/wp-content/themes/deadpool/img/logo.png" alt="">
				</a>
			</div><!-- .site-branding -->
		<nav id="site-navigation" class="main-navigation navbar col-md-5" role="navigation">

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'deadpool' ); ?></button>
			<?php wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'ul',
                'container_class'   => 'collapse navbar-collapse',
        		'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );?>
		</nav><!-- #site-navigation -->
		</div>

			</div>
<?php $description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<h2 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
			<?php
			endif; ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
