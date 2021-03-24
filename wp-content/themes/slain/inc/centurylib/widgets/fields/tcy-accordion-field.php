<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for accordion field
 */
$options = isset($widget_field['options']) ? $widget_field['options'] : array();
$all_values = get_option('widget_' . $centurywidget->id_base);
$this_widget_instance = isset($all_values[$centurywidget->number]) ? $all_values[$centurywidget->number] : array();
$value = (array)$value;
?>
<div class="tcy-widget-field-wrapper tcy-widget-accordion-wrapper <?php echo esc_attr($wrapper); ?>">
	<?php
	if( count( $options ) > 0 && is_array( $options ) ){ 
		foreach ($options as $accordion_key=>$accordion_details){
			$is_dropdown = in_array($accordion_key, $value);
			$title = isset($accordion_details['title']) ? esc_html($accordion_details['title']) : '';
			$options = isset($accordion_details['options']) ? $accordion_details['options'] : array();
			$accordion_wraper_class = ($is_dropdown) ? 'open' : 'closed';
			$accordion_icon_class = ($is_dropdown) ? 'fa-angle-up' : 'fa-angle-down';
			?>
			<div class="centurylib-accordion-wrapper <?php echo esc_attr($accordion_wraper_class); ?>">
				<label for="<?php echo esc_attr( $centurywidget->get_field_id( $name.$accordion_key ) ); ?>" class="centurylib-accordion-title"><?php esc_html($title); ?>
					<?php echo esc_html($title); ?><i class="centurylib-accordion-arrow fa <?php echo esc_attr($accordion_icon_class); ?>"></i>
					<input id="<?php echo esc_attr( $centurywidget->get_field_id( $name.$accordion_key ) ); ?>" name="<?php echo esc_attr( $centurywidget->get_field_name( $name ) ); ?>[]" value="<?php echo esc_attr($accordion_key); ?>" <?php checked( 1, $is_dropdown ) ?> class="tcy-hidden" type="checkbox">
				</label>
				<div class="centurylib-accordion-content">
					<?php
					if(count($options)):
						foreach($options as $field_key=>$accordion_field):
							$current_widgets_field_default = isset($accordion_field['default']) ? $accordion_field['default'] : '';
							$current_field_widget_name = isset($accordion_field['name']) ? $accordion_field['name'] : '';

							if(!$current_field_widget_name){
								return;
							}
							$current_widgets_field_value = isset($this_widget_instance[$current_field_widget_name]) ? $this_widget_instance[$current_field_widget_name] : $current_widgets_field_default;
							centurylib_widgets_show_widget_field( $centurywidget, $accordion_field, $current_widgets_field_value );
						endforeach;
					else:
						?>
						<p><?php esc_html_e('Sorry no field are added on accordion.', 'slain'); ?></p>
						<?php
					endif;
					?>
				</div>
			</div>
			<?php
		}

	}else{
		?>
			<p><?php esc_html_e('There is no accordion on this accordion group', 'slain'); ?></p>
		<?php
	}
	?>
	<?php if ( isset( $description ) ) { ?>
		<br/>
		<small><?php echo wp_kses_post( $description ); ?></small>
	<?php } ?>
</div>