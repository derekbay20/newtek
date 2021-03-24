<?php
/**
 * Slain Theme Customizer
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

 /*
** Featured Links =====
*/
// add featured links section
$wp_customize->add_section( 
	'slain_featured_block_section' , 
	array(
		'title'		 => esc_html__( 'Featured Blocks', 'slain' ),
		'priority'	 => 30,
		'capability' => 'edit_theme_options',
		'panel'		=> 'site_additional_sections'
	)
);

$wp_customize->add_setting(
	'slain_featured_blocks_onmob',
	array(
		'default'		=> '1',
		'sanitize_callback'		=> 'absint'
	),
);

$wp_customize->add_control(
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_featured_blocks_onmob',
		array(
			'label'		=> esc_html__( 'Visible on mobile?', 'slain' ),
			'section' => 'slain_featured_block_section',
            'priority' => 10,
            'type'=>'checkbox',
		)
	)
);

$wp_customize->add_setting(
	'slain_featured_blocks_width',
	array(
		'default'	=> 'boxed',
		'sanitize_callback' => 'centurylib_sanitize_select'
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'slain_featured_blocks_width',
		array(
			'type'		=> 'select',
			'priority'	=> 10,
			'transport'	=> 'refresh',
			'label'		=> esc_html__( 'Width', 'slain' ),
			'section'		=> 'slain_featured_block_section',
			'choices'		=> array(
				'full' => esc_html__( 'Full', 'slain' ),
				'boxed' => esc_html__( 'Boxed', 'slain' ),
				'contained' => esc_html__( 'Contained', 'slain' )
			)
		)
	)
);

$no_of_block = 3;
$no_of_fields = 3;
for( $index=0; $index<$no_of_block; $index++ ){

	$wp_customize->add_setting(
		'slain_featured_blocks['.$index.'][title]',
		array(
			'default'	=> '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'slain_featured_blocks['.$index.'][title]',
		array(
			'type'		=> 'text',
			'priority'	=> ($index*$no_of_fields+1)*10,
			'transport'	=> 'refresh',
			'label'		=> esc_html__( 'Block Title ', 'slain' ).($index+1),
			'section'		=> 'slain_featured_block_section',
		)
	);
	$wp_customize->add_setting(
		'slain_featured_blocks['.$index.'][link]',
		array(
			'default'	=> '',
			'sanitize_callback' => 'sanitize_url'
		)
	);

	$wp_customize->add_control(
		'slain_featured_blocks['.$index.'][link]',
		array(
			'type'		=> 'text',
			'priority'	=> ($index*$no_of_fields+2)*10,
			'transport'	=> 'refresh',
			'label'		=> esc_html__( 'Block Link ', 'slain' ).($index+1),
			'section'		=> 'slain_featured_block_section',
		)
	);
	$wp_customize->add_setting(
		'slain_featured_blocks['.$index.'][image]',
		array(
			'default'	=> '',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control(
			$wp_customize,
			'slain_featured_blocks['.$index.'][image]',
			array(
				'priority'	=> ($index*$no_of_fields+3)*10,
				'transport'	=> 'refresh',
				'height'=>500, // cropper Height
	            'width'=>500, // Cropper Width
	            'flex_width'=>true, //Flexible Width
	            'flex_height'=>true, // Flexible Heiht
				'label'		=> esc_html__( 'Block Image ', 'slain' ).($index+1),
				'section'		=> 'slain_featured_block_section',
			)
		)
	);

}
