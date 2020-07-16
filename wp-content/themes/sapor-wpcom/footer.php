<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package sapor
 */
?>

	<!iframe src="//siterubix.com/widget/website/a_aid/18e930cd" frameborder="0" scrolling="no" width="600" height="190" style="text-align: center; margin: auto;"></iframe>


	</div><!-- #content -->
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'sapor' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'sapor' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'sapor' ), 'Sapor', '<a href="http://wordpress.com/themes/" rel="designer">WordPress.com</a>' ); ?>
			<span class="sep noshow"> | </span>
			<span class="footer-name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
