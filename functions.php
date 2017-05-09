<?php
/**
 * Define Child Theme Constants
 *
 * @since 1.0.0
 */
define( 'CHILD_THEME_NAME', 'Starter Theme' );
define( 'CHILD_THEME_AUTHOR', 'Calvin Koepke' );
define( 'CHILD_THEME_AUTHOR_URL', 'https://calvinkoepke.com/' );
define( 'CHILD_THEME_URL', 'http://ck.io' );
define( 'CHILD_THEME_VERSION', '2.0.0' );

/**
 *
 * Start the engine
 *
 * @since 1.0.0
 *
 */
include_once( get_template_directory() . '/lib/init.php');

/**
 *
 * Load files in the /assets/ directory
 *
 * @since 1.0.0
 *
 */
add_action( 'wp_enqueue_scripts', 'ck_load_assets' );
function ck_load_assets() {

	// Load fonts.
	wp_enqueue_style( 'ck-fonts', '//fonts.googleapis.com/css?family=Lato:400,700,700italic', array(), CHILD_THEME_VERSION );

	// Load JS.
	wp_enqueue_script( 'ck-global', get_stylesheet_directory_uri() . '/build/js/global.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Load default icons.
	wp_enqueue_style( 'dashicons' );

	// Load responsive menu.
	$suffix = defined( SCRIPT_DEBUG ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_script( 'ck-responsive-menu', get_stylesheet_directory_uri() . '/build/js/responsive-menus' . $suffix . '.js', array( 'jquery', 'ck-global' ), CHILD_THEME_VERSION, true );
	wp_localize_script(
		'ck-responsive-menu',
		'genesis_responsive_menu',
	 	ck_get_responsive_menu_args()
	);

}

/**
 * Set the responsive menu arguments.
 *
 * @return array Array of menu arguments.
 *
 * @since 1.1.0
 */
function ck_get_responsive_menu_args() {

	$args = array(
		'mainMenu'         => __( 'Menu', 'calvinkoepke-com' ),
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Menu', 'calvinkoepke-com' ),
		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
				'.nav-secondary',
			),
			'others'  => array(
				'.nav-footer',
				'.nav-sidebar',
			),
		),
	);

	return $args;

}

/**
 *
 * Add theme supports
 *
 * @since 1.0.0
 *
 */
add_theme_support( 'genesis-responsive-viewport' ); /* Enable Viewport Meta Tag for Mobile Devices */
add_theme_support( 'html5',  array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) ); /* HTML5 */
add_theme_support( 'genesis-accessibility', array( 'skip-links', 'search-form', 'drop-down-menu', 'headings' ) ); /* Accessibility */
add_theme_support( 'genesis-after-entry-widget-area' ); /* After Entry Widget Area */
add_theme_support( 'genesis-footer-widgets', 3 ); /* Add Footer Widgets Markup for 3 */


/**
 *
 * Apply custom body classes
 *
 * @since 1.0.0
 * @uses /lib/classes.php
 *
 */
include_once( get_stylesheet_directory() . '/lib/classes.php' );

/**
 *
 * Apply Starter Theme defaults (overrides default Genesis settings)
 *
 * @since 1.0.0
 * @uses /lib/defaults.php
 *
 */
include_once( get_stylesheet_directory() . '/lib/defaults.php' );

/**
 *
 * Apply Starter Theme default attributes
 *
 * @since 1.0.0
 * @uses /lib/attributes.php
 *
 */
include_once( get_stylesheet_directory() . '/lib/attributes.php' );
