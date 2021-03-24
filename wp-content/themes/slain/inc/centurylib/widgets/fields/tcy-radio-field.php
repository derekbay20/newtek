<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for radio field
 */
?>
<p class="tcy-widget-field-wrapper <?php echo esc_attr($wrapper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>">
		<?php echo esc_html( $title ); ?>:
	</label>
	<div class="radio-wrapper">
		<?php
			foreach ( $options as $athm_option_name => $athm_option_title ){
		?>
			<input id="<?php echo esc_attr( $centurywidget->get_field_id( $athm_option_name ) ); ?>" name="<?php echo esc_attr( $centurywidget->get_field_name( $name ) ); ?>" type="radio" value="<?php echo esc_attr( $athm_option_name ); ?>" <?php checked( $athm_option_name, $value ); ?> />
				<label for="<?php echo esc_attr( $centurywidget->get_field_id( $athm_option_name ) ); ?>"><?php echo esc_html( $athm_option_title ); ?>:</label>
		<?php } ?>
	</div>
	<?php if ( isset( $description ) ) { ?>
		<small><?php echo esc_html( $description ); ?></small>
	<?php } ?>
</p>