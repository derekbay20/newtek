<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for multiple checkbox field
 */
$value = (array)$value;
?>
<p class="tcy-widget-field-wrapper <?php echo esc_attr($wrapper); ?>">
	<?php echo esc_html( $title ); ?>
	<?php foreach ( $options as $athm_option_name => $athm_option_title ) { ?>
		<label class="block-field widefat" for="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ).esc_attr($athm_option_name); ?>">
			<input id="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ).esc_attr($athm_option_name); ?>" name="<?php echo esc_attr( $centurywidget->get_field_name( $name ) ); ?>[]" type="checkbox" value="<?php echo esc_attr($athm_option_name); ?>" <?php checked(1, in_array($athm_option_name, $value) ); ?>/>
			<?php echo esc_html( $athm_option_title ); ?>
		</label>
	<?php } ?>
	<?php if ( isset( $description ) ) { ?>
		<br/>
		<small><?php echo wp_kses_post( $description ); ?></small>
	<?php } ?>
</p>