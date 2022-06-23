<?php
/**
 * Osten-auto functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Osten-auto
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function osten_auto_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Osten-auto, use a find and replace
		* to change 'osten-auto' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'osten-auto', get_template_directory() . '/languages' );

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

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'osten_auto_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
			'flex-height' => true
		)
	);
}
add_action( 'after_setup_theme', 'osten_auto_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function osten_auto_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'osten_auto_content_width', 640 );
}
add_action( 'after_setup_theme', 'osten_auto_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function osten_auto_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'osten-auto' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'osten-auto' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'osten_auto_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function osten_auto_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri(). '/assets/css/jquery.fancybox.css', array(), _S_VERSION );
	wp_enqueue_style( 'reset', get_template_directory_uri(). '/assets/css/reset.css', array(), _S_VERSION );
	wp_enqueue_style( 'slick', get_template_directory_uri().'/assets/css/slick.css', array(), _S_VERSION );

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), _S_VERSION, true);
	wp_enqueue_script( 'osten-auto-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script('fancybox-js', get_template_directory_uri().'/assets/js/jquery.fancybox.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('wow', get_template_directory_uri().'/assets/js/wow.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script('slick-js', get_template_directory_uri().'/assets/js/slick.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('main-js', get_template_directory_uri().'/assets/js/main.js', array('jquery'), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'osten_auto_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Support img svg
 */
# # Add SVG to the list of files allowed for download
add_filter('upload_mimes', 'svg_upload_allow');
function svg_upload_allow($mimes)
{
    $mimes['svg']  = 'image/svg+xml';
    return $mimes;
}

# MIME type fix for SVG files
add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{
    if (version_compare($GLOBALS['wp_version'], '5.1.0', '>='))
        $dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
    else
        $dosvg = ('.svg' === strtolower(substr($filename, -4)));

    if ($dosvg) {
        if (current_user_can('manage_options')) {
            $data['ext']  = 'svg';
            $data['type'] = 'image/svg+xml';
        } else {
            $data['ext'] = $type_and_ext['type'] = false;
        }
    }

    return $data;
}

// // Для створення налаштувань для футера щоб виводилося на всіх сторінках
if( function_exists('acf_add_options_page') ) {

	// Add parent.
acf_add_options_page(array(
		'page_title'  => __('Theme General Settings'),
		'menu_title'  => __('Theme Settings'),
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false,
	));

	// Add sub page.
 acf_add_options_page(array(
		'page_title'  => __('Settings footer'),
		'menu_title'  => __('footer'),
		'parent_slug' => 'theme-general-settings',
	));
}
