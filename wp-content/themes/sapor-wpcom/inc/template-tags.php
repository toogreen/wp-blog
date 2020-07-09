<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package sapor
 */

if ( ! function_exists( 'sapor_paging_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function sapor_paging_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'sapor' ); ?></h2>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( _x( '<span class="post-nav" aria-hidden="true">' . __( 'Previous Posts', 'sapor' ) . '</span> ', 'Previous post link', 'sapor' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link(  _x( '<span class="post-nav" aria-hidden="true">' . __( 'Next Posts', 'sapor' ) . '</span> ', 'Next post link', 'sapor' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'sapor_posts_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function sapor_posts_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'sapor' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="post-nav" aria-hidden="true">' . __( 'Previous: ', 'sapor' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'sapor' ) . '</span> ' .
						'<span class="post-title">%title</span>', 'Previous post link', 'sapor' ) );
				next_post_link( '<div class="nav-next">%link</div>', _x( '<span class="post-nav" aria-hidden="true">' . __( 'Next: ', 'sapor' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'sapor' ) . '</span> ' .
						'<span class="post-title">%title</span>', 'Next post link', 'sapor' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'sapor_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function sapor_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() && ! has_post_thumbnail() ) {
		printf( '<span class="featured-post">%s</span>', __( 'Featured:', 'sapor' ) );
	}

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

	echo '<span class="posted-on">' . $posted_on . '</span>';

}
endif;

if ( ! function_exists( 'sapor_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function sapor_entry_meta() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {

		if ( is_singular() && is_multi_author() ) {
			printf( '<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span>' . __( ' by ', 'sapor' ) . '<a class="url fn n" href="%2$s">%3$s</a>.</span></span>',
				_x( 'Author', 'By ', 'sapor' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'sapor' ) );
		if ( $categories_list && sapor_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'sapor' ) . '. </span>', $categories_list );
		}
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s' . __( ' Post format: ', 'sapor' ) . '<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', '', 'sapor' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	edit_post_link( __( 'Edit', 'sapor' ), '<span class="edit-link">', '</span>' );

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'sapor' ), __( '1 Comment', 'sapor' ), __( '% Comments', 'sapor' ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'sapor_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function sapor_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list();
		if ( $tags_list ) {
			printf( '<div class="footer-tags"><span class="tags-links">' . __( '%1$s', 'sapor' ) . '</span></div>', $tags_list );
		}
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function sapor_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'sapor_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'sapor_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so sapor_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so sapor_categorized_blog should return false.
		return false;
	}
}

if ( ! function_exists( 'sapor_post_thumbnail' ) ) :
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * @since Sapor 1.0
 */
function sapor_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="featured-image">
		<?php the_post_thumbnail('sapor-featured-image'); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<div class="featured-image">
		<?php if ( is_sticky() ) : ?>
			<a href="<?php the_permalink(); ?>" class="stickypost-link" title="<?php esc_attr_e( 'Featured', 'sapor' ); ?>"><span class="screen-reader-text"><?php _e( 'Featured', 'sapor' ); ?></span><?php _e( 'Featured', 'sapor' ); ?></a>
		<?php endif; ?>
		<a class="featured-link" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
				the_post_thumbnail( 'sapor-featured-image', array( 'alt' => get_the_title() ) );
			?>
		</a>
	</div>

	<?php endif; // End is_singular()
}
endif;

/**
 * Returns the URL from the post.
 *
 * @uses get_the_link() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @return string URL
 */
function sapor_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

if ( ! function_exists( 'sapor_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]"
 *
 * @since Sapor 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function sapor_excerpt_more( $more ) {

	if ( has_post_format( 'aside' ) && !is_singular() ) {
		$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( '&#8734;', 'sapor' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
		return ' ' . $link;
	} else {
		$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading %s', 'sapor' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
		return '&hellip; ' . $link;
	}
}
add_filter( 'excerpt_more', 'sapor_excerpt_more' );
endif;

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Sapor 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function sapor_search_switch( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'sapor_search_switch' );


/**
 * Flush out the transients used in sapor_categorized_blog.
 */
function sapor_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'sapor_categories' );
}
add_action( 'edit_category', 'sapor_category_transient_flusher' );
add_action( 'save_post',     'sapor_category_transient_flusher' );
