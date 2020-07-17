<?php
/**
 * The template for displaying all single posts.
 *
 * @package sapor
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php
				// Previous/next post navigation.
				sapor_posts_navigation();
			?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>
		

		</main><!-- #main -->
		
	</div><!-- #primary -->

<?php get_sidebar(); ?>

 <!-- toogreen added ad from wealthy affiliates here -->
		<iframe src="//siterubix.com/widget/website/a_aid/18e930cd" frameborder="0" scrolling="no" width="600" height="190" style="text-align: center; margin: auto;">

<?php get_footer(); ?>
