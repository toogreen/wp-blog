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

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'sapor' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php sapor_entry_footer(); ?>
		</footer><!-- .entry-footer -->

		<?php
			if ( '' != get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		?>
	</div><!-- .entry-wrapper -->
</article><!-- #post-## -->
