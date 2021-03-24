<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description show widget fueld field for widget
 */
function centurylib_widgets_show_widget_field( $centurywidget = '', $widget_field = '', $value = '' ){

	extract( $widget_field );

	$wrapper = isset($wrapper) ? $wrapper : '';
	$relation = isset($relation) ? $relation : array();
	$centurylib_widget_relation_json = wp_json_encode( $relation);
	$centurylib_widget_relation_class = ($relation) ? 'relation' : '';

	$widget_fild_path = centurylib_file_directory('widgets/fields/tcy-'.$type.'-field.php');
	if( file_exists($widget_fild_path) ){
		require $widget_fild_path;
	}else{
		?>
		<p><?php echo esc_html__('Field type', 'slain').' '.esc_attr($type).' '.esc_html__('Not found.', 'slain'); ?></p>
		<?php
	}

}

function centurylib_widgets_updated_field_value( $widget_field, $new_field_value ){

	$type = '';

	extract( $widget_field );

	switch ( $type ) {
		// Allow only integers in number fields
		case 'number':
			return centurylib_sanitize_number( $new_field_value, $widget_field );
			break;
		// Allow some tags in textareas
		case 'textarea':
			return centurylib_sanitize_textarea($new_field_value);
			break;
		// No allowed tags for all other fields
		case 'url':
			return esc_url_raw( $new_field_value );
			break;
		case 'multitermlist':
			return centurylib_sanitize_multitermlist($new_field_value);
			break;
		case 'multiselect':
			return centurylib_sanitize_multiselect($new_field_value);
			break;
		case 'accordion':
			return centurylib_sanitize_accordion($new_field_value);
			break;
		case 'repeater':
			return centurylib_sanitize_repeater($widget_field, $new_field_value );
			break;
		default:
			return wp_kses_post( sanitize_text_field( $new_field_value ) );

	}
}