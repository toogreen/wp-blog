<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package sapor
 */

if ( is_active_sidebar( 'sidebar-1' ) || has_nav_menu( 'main' ) || has_nav_menu ( 'social' ) ) : ?>
	<div id="secondary" class="sidebar" role="complementary">
		<?php sapor_the_site_logo(); ?>
		<?php if ( has_nav_menu ( 'social' ) ) : ?>
			<?php wp_nav_menu( array(
				'theme_location' => 'social',
				'depth' => 1,
				'link_before' => '<span class="screen-reader-text">',
				'link_after' => '</span>',
				'container_class' => 'social-links',
			) ); ?>
		<?php endif; ?>

		<?php if ( has_nav_menu( 'main' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
			</nav><!-- #site-navigation -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!-- #secondary -->
		<?php } ?>
	</div>
<?php endif; ?>