<?php
/**
 * This is the template that displays all widgets included in homepage widget area.
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

if ( is_active_sidebar( 'slain_home_content_area' ) ) {
	?>
	<div class="home-content-section home-full-area clear-fix">
		<div class="boxed-wrapper">
			<?php dynamic_sidebar( 'slain_home_content_area' ); ?>
		</div>
	</div><!-- .home-top-section -->
	<?php
}

/**
 * Home Middle Section Area
 *
 * @since 1.0.0
 */
if ( is_active_sidebar( 'slain_home_middle_section_area' ) ) {
	?>
	<div class="home-middle-section  clear-fix">
		<div class="boxed-wrapper">
			<div class="middle-primary widget-area slain-sticky-wraper ">
				<?php dynamic_sidebar( 'slain_home_middle_section_area' ); ?>
			</div><!-- .middle-primary -->
			<div class="middle-aside small-widget-area widget-area slain-sticky-wraper sidebar-right">
				<?php dynamic_sidebar( 'slain_home_middle_aside_area' ); ?>
			</div><!-- .middle-aside -->
		</div>
	</div><!-- .home-middle-section -->
	<?php
}

/**
 * Home Bottom Section Area
 *
 * @since 1.0.0
 */
if ( is_active_sidebar( 'slain_home_bottom_section_area' ) ) {
	?>
	<div class="home-bottom-section home-full-area">
		<div class="boxed-wrapper">
			<?php dynamic_sidebar( 'slain_home_bottom_section_area' ); ?>
		</div>
	</div><!-- .home-bottom-section -->

	<?php

}

