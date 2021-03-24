<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for tab group field
 */
$current_widget_slug = $centurywidget->id_base.'_'.$centurywidget->number.'_';
?>
<div class="tcy-widget-field-tab-wraper <?php echo esc_attr($wrapper); ?>">
	<h5 class="tcy-widget-tab-list nav-tab-wrapper">
		<?php 
		foreach($options as $tab_key=>$tab_details){
			$current_tab_id = $current_widget_slug.$tab_key;
			?>
			<label for="field_<?php echo esc_attr($current_tab_id); ?>" data-id="#content_<?php echo esc_attr($current_tab_id); ?>" class="nav-tab <?php echo ($tab_key == $value) ? 'nav-tab-active' : ''; ?>"><?php echo esc_html($tab_details['title']); ?><input id="field_<?php echo esc_attr($current_tab_id); ?>" type="radio" name="<?php echo esc_attr($centurywidget->get_field_name($name) ); ?>" value="<?php echo esc_attr($tab_key); ?>" <?php checked($value, $tab_key); ?> class="tcy-hidden"/></label>
		<?php } ?>
	</h5>
	<div class="tcy-tab-content-wraper">
		<?php
		foreach($options as $tab_key=>$tab_details){ 
			$current_tab_id = $current_widget_slug.$tab_key;
			?>
			<div id="content_<?php echo esc_attr($current_tab_id); ?>" class="centurylib-tab-contents <?php echo ($value==$tab_key
			) ? 'centurylib-tab-active' : ''; ?>" >
				<?php
					$all_values = get_option('widget_' . $centurywidget->id_base);
					$this_widget_instance = isset($all_values[$centurywidget->number]) ? $all_values[$centurywidget->number] : array();
					$widget_fields = isset($tab_details['options']) ? $tab_details['options'] : array();
					// Loop through fields
					if(count($widget_fields)):
			            foreach ( $widget_fields as $widget_field ) {
			                // Make array elements available as variables
			                extract( $widget_field );
			                $default = isset($widget_field['default']) ? $widget_field['default'] : '';
			                $centurylib_widgets_field_value = isset( $this_widget_instance[ $name ] ) ? $this_widget_instance[ $name ] : $default;
			                centurylib_widgets_show_widget_field( $centurywidget, $widget_field, $centurylib_widgets_field_value );
			            }
			        else:
			        	?><p><?php echo esc_html__('No fields are added on ', 'slain').esc_attr($tab_details['name']).esc_html__(' tab', 'slain'); ?></p><?php
			        endif;
				?>
			</div>
		<?php } ?>
	</div>
</div>