<?php
/**
 * @package sapor
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrapper">
		<?php sapor_post_thumbnail(); ?>

		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-meta">
			<?php sapor_posted_on(); ?>
			<?php sapor_entry_meta(); ?>
		</div><!-- .entry-meta -->

		<?php if ( 'post' == get_post_type() && ( has_post_format( 'image' ) || has_post_format( 'gallery' ) || has_post_format( 'link' ) || has_post_format( 'quote' ) || has_post_format( 'video' ) ) ) { ?>
			<div class="entry-content">
				<?php the_content( '&hellip; ' . __( 'Continue reading', 'sapor' ) ); ?>
			</div><!-- .entry-content -->
		<?php } else { ?>
			<div class="entry-content">
				<?php the_excerpt(); ?>
				<div class="entry-flair">
					<?php sapor_post_flair(); ?>
				</div><!-- .entry-flair -->
			</div><!-- .entry-content -->
		<?php } ?>

		<footer class="entry-footer">
			<?php sapor_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
