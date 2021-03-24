<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

$sidebar_list_items = slain_sidebar_name_array();
foreach( $sidebar_list_items as $index=>$sidebar_name ){
	if ( ! is_active_sidebar( $sidebar_name ) ){
		continue;
	}
	$sidebar_class = apply_filters( 'slain_sidebar_class', $sidebar_name );
	?>
	<div class="<?php echo esc_attr($sidebar_class); ?>-wrap small-widget-area widget-area">
		<aside id="<?php echo esc_attr($sidebar_name); ?>" class="<?php echo esc_attr($sidebar_class); ?>" role="complementary">
			<?php dynamic_sidebar( $sidebar_name ); ?>
		</aside><!-- $sidebar_name -->
	</div>
	<?php

}