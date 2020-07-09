<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sapor
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrapper">
		<?php sapor_post_thumbnail(); ?>
		<header class="entry-header">
			<?php if ( is_sticky() ) : ?>
				<span class="entry-format"><a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'Featured', 'sapor' ); ?>"><span class="screen-reader-text"><?php _e( 'Featured', 'sapor' ); ?></span></a></span>
			<?php endif; ?>
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-meta">
			<?php sapor_posted_on(); ?>
			<?php sapor_entry_meta(); ?>
		</div><!-- .entry-meta -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
			<div class="entry-flair">
				<?php sapor_post_flair(); ?>
			</div><!-- .entry-flair -->
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php sapor_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
