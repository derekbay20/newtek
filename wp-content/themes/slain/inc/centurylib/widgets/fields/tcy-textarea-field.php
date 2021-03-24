<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description TEXTAREA field for widget
 */
?>
<p class="tcy-widget-field-wrapper <?php echo esc_attr($wrapper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>">
		<?php echo esc_html( $title ); ?>:
	</label>
	<textarea class="widefat <?php echo esc_attr($centurylib_widget_relation_class); ?>" rows="<?php echo intval( $centurylib_widgets_row ); ?>" id="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>" name="<?php echo esc_attr( $centurywidget->get_field_name( $name ) ); ?>" data-relations="<?php echo esc_attr($centurylib_widget_relation_json) ?>" ><?php echo esc_html( $value ); ?></textarea>
</p>