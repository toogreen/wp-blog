<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package sapor
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="entry-wrapper">
					<header class="entry-header">
						<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'sapor' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="page-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'sapor' ); ?></p>

						<?php get_search_form(); ?>

					</div><!-- .page-content -->
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
