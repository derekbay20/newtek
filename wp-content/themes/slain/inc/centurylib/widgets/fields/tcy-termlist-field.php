<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for term list field
 */
?>
<p class="tcy-widget-field-wrapper <?php echo esc_attr($wrapper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>">
		<?php echo esc_html( $title ); ?>: 
	</label>
	<?php
	/* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
	if( taxonomy_exists( $taxonomy_type ) ){
		$args = array(
			'show_option_all'	=> esc_html__('Show All', 'slain'),
			'show_option_none'   => false,
			'orderby'            => 'name',
			'order'              => 'asc',
			'show_count'         => 1,
			'hide_empty'         => 0,
			'echo'               => 1,
			'selected'           => $value,
			'hierarchical'       => 1,
			'name'               => esc_attr( $centurywidget->get_field_name( $name ) ),
			'id'                 => esc_attr( $centurywidget->get_field_id( $name ) ),
			'class'              => 'widefat',
			'taxonomy'           => $taxonomy_type,
			'hide_if_empty'      => false,
		);
		wp_dropdown_categories( $args );	
	}else{
		?><select id="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>" name="<?php echo esc_attr( $centurywidget->get_field_name( $name ) ); ?>" class="widefat">
			<option value=""><?php esc_html_e( 'No terms found in this taxonomy', 'slain' ); ?></option>
		</select><?php
	}	

	if ( isset( $description ) ) { 
		?>
		<br/>
		<small><?php echo esc_html( $description ); ?></small>
		<?php 
	} 
	?>

</p>