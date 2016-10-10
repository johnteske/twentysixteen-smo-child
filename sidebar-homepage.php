<?php
/**
 * The template for the homepage bottom widget areas
 */

if ( ! is_active_sidebar( 'smo_home_1' ) && ! is_active_sidebar( 'smo_home_2' ) ) {
	return;
}

// If we get this far, we have widgets. Let's do this.
?>
<aside id="content-bottom-widgets" class="content-bottom-widgets" role="complementary">
	<?php if ( is_active_sidebar( 'smo_home_1' ) ) : ?>
		<div class="widget-area">
			<?php dynamic_sidebar( 'smo_home_1' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'smo_home_2' ) ) : ?>
		<div class="widget-area">
			<?php dynamic_sidebar( 'smo_home_2' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>
</aside><!-- .content-bottom-widgets -->
