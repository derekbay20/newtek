<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description URL field for widget
 */
?>
<p class="tcy-widget-field-wrapper <?php echo esc_attr($wrapper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>">
		<?php echo esc_html( $title ); ?>:
	</label>
	<input class="widefat <?php echo esc_attr($centurylib_widget_relation_class); ?>" id="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>" name="<?php echo esc_attr( $centurywidget->get_field_name( $name ) ); ?>" type="text" value="<?php echo esc_html( $value ); ?>"  data-relations="<?php echo esc_attr($centurylib_widget_relation_json) ?>"/>
	<?php if ( isset( $description ) ) { ?>
		<br/>
		<small><?php echo esc_html( $description ); ?></small>
	<?php } ?>
</p>