<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mhp
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<script src="https://use.typekit.net/xsg8ccg.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mhp' ); ?></a>

	<div class="nav-wrap">
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">

				<h1 class="site-title" style="background-color: <?php the_field('title_bgc', 'options'); ?>; font-weight: <?php the_field('font_weight','options'); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="background: linear-gradient(<?php the_field('underline_color','options') ?>, <?php the_field('underline_color','options') ?>) no-repeat; color: <?php the_field('title_color', 'options'); ?>"><?php bloginfo( 'name' ); ?></a></h1>


<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>

			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-list-ul"></i></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
</div><!-- nav-wrap -->

	<div id="content" class="site-content">
