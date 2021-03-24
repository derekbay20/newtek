<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for checkbox field
 */
?>
<p class="tcy-widget-field-wrapper <?php echo esc_attr($wrapper); ?>">
	<input class="<?php echo esc_attr($centurylib_widget_relation_class); ?>" id="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>" name="<?php echo esc_attr( $centurywidget->get_field_name( $name ) ); ?>" type="checkbox" value="1" <?php checked( '1', $value ); ?> data-relations="<?php echo esc_attr($centurylib_widget_relation_json) ?>"/>
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>">
		<?php echo esc_html( $title ); ?>
	</label>
	<?php if ( isset( $description ) ) { ?>
		<br/>
		<small><?php echo wp_kses_post( $description ); ?></small>
	<?php } ?>
</p>