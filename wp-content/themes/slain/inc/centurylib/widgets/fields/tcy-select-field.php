<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description Select field for widget
 */
 ?>
<p class="tcy-widget-field-wrapper <?php echo esc_attr($wrapper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>">
		<?php echo esc_html( $title ); ?>:
	</label>
	<select name="<?php echo esc_attr( $centurywidget->get_field_name( $name ) ); ?>" id="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>" class="widefat <?php echo esc_attr($centurylib_widget_relation_class); ?>" data-relations="<?php echo esc_attr($centurylib_widget_relation_json) ?>">
		<?php foreach ( $options as $athm_option_name => $athm_option_title ) { ?>
			<option value="<?php echo esc_attr( $athm_option_name ); ?>" id="<?php echo esc_attr( $centurywidget->get_field_id( $athm_option_name ) ); ?>" <?php selected( $athm_option_name, $value ); ?>>
				<?php echo esc_html( $athm_option_title ); ?>
			</option>
		<?php } ?>
	</select>
	<?php if ( isset( $description ) ) { ?>
		<br/>
		<small><?php echo esc_html( $description ); ?></small>
	<?php } ?>
</p>