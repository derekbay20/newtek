<?php
/**
 * Function to sanitize number
 *
 * @since 1.0.0
 *
 * @param $centurylib_input
 * @param $centurylib_setting
 * @return int || float || numeric value
 *
 */
if ( ! function_exists( 'centurylib_sanitize_number' ) ) :
	function centurylib_sanitize_number ( $centurylib_input ) {
		$centurylib_sanitize_text = sanitize_text_field( $centurylib_input );
		// If the input is an number, return it; otherwise, return the default
		return ( is_numeric( $centurylib_sanitize_text ) ? $centurylib_sanitize_text : 0 );
	}
endif;

/**
 * Function to sanitize textarea
 *
 * @since 1.0.0
 *
 * @param $new_field_value
 * @return array
 *
 */
if ( ! function_exists( 'centurylib_sanitize_textarea' ) ) :
	function centurylib_sanitize_textarea ( $new_field_value ) {
		$centurylib_widgets_allowed_tags = array(
			'p' => array(),
			'em' => array(),
			'strong' => array(),
			'a' => array(
				'href' => array(),
			),
		);
		return wp_kses( $new_field_value, $centurylib_widgets_allowed_tags );
	}
endif;

/**
 * Function to sanitize multitermlist
 *
 * @since 1.0.0
 *
 * @param $new_field_value
 * @return array
 *
 */
if ( ! function_exists( 'centurylib_sanitize_multitermlist' ) ) :
	function centurylib_sanitize_multitermlist ( $new_field_value ) {
		$multi_term_list = array();
		if(is_array($new_field_value)){
			foreach($new_field_value as $key=>$value){
				$multi_term_list[] = absint($value);
			}
		}
		return $multi_term_list;
	}
endif;

/**
 * Function to sanitize multiselect
 *
 * @since 1.0.0
 *
 * @param $new_field_value
 * @return array
 *
 */
if( ! function_exists( 'centurylib_sanitize_multiselect' ) ) :
	function centurylib_sanitize_multiselect ( $new_field_value ) {
		$multiselect_list = array();
		if(is_array($new_field_value)){
			foreach($new_field_value as $key=>$value){
				$multiselect_list[] = esc_attr($value);
			}
		}
		return $multiselect_list;
	}
endif;

/**
 * Function to sanitize accordion
 *
 * @since 1.0.0
 *
 * @param $new_field_value
 * @return array
 *
 */
if( ! function_exists( 'centurylib_sanitize_accordion' ) ) :
	function centurylib_sanitize_accordion( $new_field_value ) {
		$dropdown_accordions = array();
		if(is_array($new_field_value)){
			foreach($new_field_value as $key=>$value){
				$dropdown_accordions[] = esc_attr($value);
			}
		}
		return $dropdown_accordions;
	}
endif;

/**
 * Function to sanitize repeater
 *
 * @since 1.0.0
 *
 * @param $new_field_value
 * @return array
 *
 */
if( ! function_exists( 'centurylib_sanitize_repeater' ) ) :
	function centurylib_sanitize_repeater($widget_field, $new_field_value ) {
		$sanitize_repeater_value = array();
		if( is_array($new_field_value) && count($new_field_value)){
			foreach($new_field_value as $row_index=>$repeater_row){
				$repeater_fields = $widget_field['options'];
				foreach($repeater_fields as $fields_key=>$repeater_field){

					$repeater_field_type = isset($repeater_field['type']) ? $repeater_field['type'] : '';
					$repeater_field_name = isset($repeater_field['name']) ? $repeater_field['name'] : '';
					$repeater_field_value = isset($repeater_row[$repeater_field_name]) ? $repeater_row[$repeater_field_name] : '';
					$sanitize_repeater_value[$row_index][$repeater_field_name] = centurylib_widgets_updated_field_value( $repeater_field,  $repeater_field_value);
					
				}
			}
		}
		return $sanitize_repeater_value;
	}
endif;