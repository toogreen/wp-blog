<?php
/**
 * sapor functions and definitions
 *
 * @package sapor
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 730; /* pixels */
}

if ( ! function_exists( 'sapor_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sapor_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sapor, use a find and replace
	 * to change 'sapor' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sapor', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'sapor-featured-image', 900, 900 );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main' => __( 'Main Menu', 'sapor' ),
		'social'  => __( 'Social Links Menu', 'sapor' ),
	) );

	add_editor_style( array( 'editor-style.css', sapor_fonts_url() ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sapor_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // sapor_setup
add_action( 'after_setup_theme', 'sapor_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function sapor_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sapor' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sapor_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sapor_scripts() {
	wp_enqueue_style( 'sapor-fonts', sapor_fonts_url(), array(), null );

	wp_enqueue_style( 'sapor-style', get_stylesheet_uri() );

	wp_enqueue_script( 'sapor-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'sapor-script', get_template_directory_uri() . '/js/sapor.js', array( 'jquery' ), '20150730', true );

	// Add Genericons font, used in the main stylesheet.
	if ( wp_style_is( 'genericons', 'registered' ) )
		wp_enqueue_style( 'genericons' );
	else
		wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), null );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sapor_scripts' );

/**
 * Register two fonts.
 *
 * @return string
 */
function sapor_fonts_url() {
	$fonts_url = '';
	$font_families = array();
	$subsets   = 'latin,latin-ext';

	// PT Sans font used for headings, description and footer text
	if ( 'off' !== _x( 'on', 'PT Sans font: on or off', 'sapor' ) ) {
		$fonts[] = 'PT Sans:400,700,400italic,700italic';
	}

	// PT Serif font used for body
	if ( 'off' !== _x( 'on', 'PT Serif font: on or off', 'sapor' ) ) {
		$fonts[] = 'PT Serif:400,700,400italic,700italic';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'cyrillic'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (cyrillic)', 'sapor' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

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


// updater for WordPress.com themes
if ( is_admin() )
	include dirname( __FILE__ ) . '/inc/updater.php';
