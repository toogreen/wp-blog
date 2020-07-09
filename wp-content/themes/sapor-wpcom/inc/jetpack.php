<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package sapor
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function sapor_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
		'render'    => 'sapor_infinite_scroll_render',
	) );

	add_theme_support( 'jetpack-responsive-videos' );

	add_image_size( 'sapor-logo', 260, 260 );
	add_theme_support( 'site-logo', array( 'size' => 'sapor-logo' ) );
}
add_action( 'after_setup_theme', 'sapor_jetpack_setup' );

/* Render Infinite Scroll Items
*/
function sapor_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
		    get_template_part( 'template-parts/content', 'search' );
		else :
		    get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
} // end function sapor_infinite_scroll_render

/**
 * Return early if Site Logo is not available.
 *
 * @since Sapor 1.0
 */
function sapor_the_site_logo() {
	if ( ! function_exists( 'jetpack_the_site_logo' ) ) {
		return;
	} else {
		jetpack_the_site_logo();
	}
}

/**
 * Remove sharedaddy from excerpt.
 */
function sapor_remove_sharedaddy() {
    remove_filter( 'the_excerpt', 'sharing_display', 19 );
}
add_action( 'loop_start', 'sapor_remove_sharedaddy' );
