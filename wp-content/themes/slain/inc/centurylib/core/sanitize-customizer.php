<?php
/*
 * Sanitize Repeater Data
 */
if ( ! function_exists( 'centurylib_sanitize_repeater_data' ) ){
	function centurylib_sanitize_repeater_data( $repeater_value ){
		$repeater_json = json_decode( $repeater_value, true );
		if( !empty( $repeater_json ) ) {
			foreach ( $repeater_json as $boxes => $box ){
				foreach ( $box as $key => $value ){
					if( $key == 'link' || $key == 'image' ){
						$repeater_json[$boxes][$key] = esc_url_raw( $value );
					}
                    elseif ( $key == 'checkbox' ){
						$repeater_json[$boxes][$key] = centurylib_sanitize_checkbox( $value );
					}
					else{
						$repeater_json[$boxes][$key] = esc_attr( $value );
					}
				}
			}
			return json_encode( $repeater_json );
		}
		return json_encode(array());
	}
}

/*
 * Sanitize Checkbox Data
 */
if(!function_exists('centurylib_sanitize_checkbox')){

	function centurylib_sanitize_checkbox($is_checked){

		return $is_checked ? true : false;

	}

}


if(!function_exists( 'centurylib_sanitize_select' ) ):

	// select
	function centurylib_sanitize_select( $input, $setting ) {
		
		// get all select options
		$options = $setting->manager->get_control( $setting->id )->choices;
		
		// return default if not valid
		return ( array_key_exists( $input, $options ) ? $input : $setting->default );
	}

endif;

if(!function_exists( 'centurylib_sanitize_textarea' ) ):

	// textarea
	function centurylib_sanitize_textarea( $input ) {

		$allowedtags = array(
			'a' => array(
				'href' 		=> array(),
				'title' 	=> array(),
				'_blank'	=> array()
			),
			'img' => array(
				'src' 		=> array(),
				'alt' 		=> array(),
				'width'		=> array(),
				'height'	=> array(),
				'style'		=> array(),
				'class'		=> array(),
				'id'		=> array()
			),
			'br' 	 => array(),
			'em' 	 => array(),
			'strong' => array()
		);

		// return filtered html
		return wp_kses( $input, $allowedtags );

	}

endif;