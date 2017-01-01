<?php
/**
 * mhp functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mhp
 */

if ( ! function_exists( 'mhp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mhp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on mhp, use a find and replace
	 * to change 'mhp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mhp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'mhp' ),
		'secondary' => esc_html__( 'Secondary', 'mhp' ),
		'footer' => esc_html__( 'Footer', 'mhp' ),
		'frontpage' => esc_html__( 'Front Page Buttons', 'mhp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Custom Options page
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'General Theme Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
			'icon_url' => 'dashicons-visibility',
			'position' => 2
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Landing Page Settings',
			'menu_title'	=> 'Landing Page',
			'parent_slug'	=> 'theme-general-settings',
		));
	}

	// HEX to RGB converter
	function hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
	$r = hexdec(substr($hex,0,1).substr($hex,0,1));
	$g = hexdec(substr($hex,1,1).substr($hex,1,1));
	$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
	$r = hexdec(substr($hex,0,2));
	$g = hexdec(substr($hex,2,2));
	$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);

	return $rgb; // returns an array with the rgb values
	}


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mhp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'mhp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mhp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mhp_content_width', 640 );
}
add_action( 'after_setup_theme', 'mhp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mhp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mhp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mhp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mhp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mhp_scripts() {
	wp_enqueue_style('mhp-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');

	wp_enqueue_style( 'mhp-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mhp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script('jQuery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js');

	wp_enqueue_script( 'mhp_-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jQuery'));

	wp_enqueue_script( 'mhp-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array('jQuery'));

	// wp_enqueue_script( 'mhp-soundcloud', get_template_directory_uri() . '/js/bundle.js', array(), '20161209', true );

	wp_enqueue_script( 'mhp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mhp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
