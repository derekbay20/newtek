<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for page list field
 */
?>
<p class="tcy-widget-field-wrapper <?php echo esc_attr($wrapper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>">
		<?php echo esc_html( $title ); ?>: 
	</label>
	<?php
	/* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
	$args = array(
		'selected'              => $value,
		'name'                  => esc_attr( $centurywidget->get_field_name( $name ) ),
		'id'                    => esc_attr( $centurywidget->get_field_id( $name ) ),
		'class'                 => 'widefat',
		'show_option_none'      => esc_html__('Select Page','slain'),
		'option_none_value'     => 0 // string
	);
	wp_dropdown_pages( $args );

	if ( isset( $description ) ) { 
		?>
		<br/>
		<small><?php echo esc_html( $description ); ?></small>
		<?php 
	} 
	?>
</p>
