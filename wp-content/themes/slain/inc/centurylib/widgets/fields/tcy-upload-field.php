<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description UPLOAD field for widget
 */
?>
<p class="tcy-widget-field-wrapper sub-option widget-upload <?php echo esc_attr($wrapper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>"><?php echo esc_html( $title ); ?></label>
	<span class="img-preview-wrap" <?php echo empty( $value ) ? 'style="display:none;"' : ''; ?>>
		<img class="widefat" src="<?php echo esc_url( $value ); ?>" alt="<?php esc_attr_e( 'Image preview', 'slain' ); ?>"  />
	</span>
	<!-- .img-preview-wrap -->
	<input type="text" class="widefat <?php echo esc_attr($centurylib_widget_relation_class); ?>" name="<?php echo esc_attr( $centurywidget->get_field_name( $name ) ); ?>" id="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>" placeholder="<?php esc_attr_e('Choose file', 'slain'); ?>" value="<?php echo esc_url( $value ); ?>" data-relations="<?php echo esc_attr($centurylib_widget_relation_json) ?>" />
	<input type="button" value="<?php esc_attr_e( 'Upload', 'slain' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','slain'); ?>" data-button="<?php esc_attr_e( 'Select Image','slain'); ?>"/>
	<input type="button" value="<?php esc_attr_e( 'Remove', 'slain' ); ?>" class="button media-image-remove" />
</p>