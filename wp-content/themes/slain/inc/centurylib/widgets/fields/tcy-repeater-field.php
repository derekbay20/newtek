<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description Repeater field for widget
 */
$row_title = isset($widget_field['row_title']) ? $widget_field['row_title'] : esc_html__('Row', 'slain');
$addnew_label = isset($widget_field['addnew_label']) ? $widget_field['addnew_label'] : esc_html__('Add row', 'slain');
$options = isset($widget_field['options']) ? $widget_field['options'] : array();
$coder_repeater_depth = 'coderRepeaterDepth_'.'0';
$tcy_repeater_main_key = $name;
?>
<div class="tcy-widget-field-wrapper tcy-widget-repeater-wrapper <?php echo esc_attr($wrapper); ?>">
	<label class="tcy-widget-repeater-heading" for="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>"><?php echo esc_html( $title ); ?>:</label>
	<div class="centurylib-main-repeater">
		<?php
		$repeater_count = 0;
		if( is_array( $value ) && count( $value ) > 0 ){
			foreach ($value as $repeater_key=>$repeater_details){
				?>
				<div class="tcy-widget-repeater-table">
					<div class="centurylib-repeater-top">
						<div class="centurylib-repeater-title-action">
							<button type="button" class="centurylib-repeater-action">
								<span class="te-toggle-indicator" aria-hidden="true"></span>
							</button>
						</div>
						<div class="centurylib-repeater-title">
							<h3><?php echo esc_html($row_title); ?><span class="centurylib-main-repeater-inner-title"></span></h3>
						</div>
					</div>
					<div class='centurylib-inside-repeater hidden'>
						<?php
						foreach($options as $repeater_slug => $repeater_data){
							
							$tcy_repeater_child_field_name = (isset($repeater_data['name'] ) ) ? esc_attr($repeater_data['name']) : '';
							$repeater_field_id  = esc_attr($centurywidget->get_field_id( $name).$tcy_repeater_child_field_name);
							$name = esc_attr($tcy_repeater_main_key.'['.$repeater_count.']['.$tcy_repeater_child_field_name.']');
							$repeater_data['name'] = $name;
							$default = (isset($repeater_data['default']) ) ? $repeater_data['default'] : '';
							$value = ( isset($repeater_details[$tcy_repeater_child_field_name] ) ) ? $repeater_details[$tcy_repeater_child_field_name] : $default;
							centurylib_widgets_show_widget_field( $centurywidget, $repeater_data, $value );
						}
						?>
						<div class="centurylib-main-repeater-control-actions">
							<button type="button" class="button-link button-link-delete centurylib-main-repeater-remove"><?php esc_html_e('Remove','slain');?></button> |
							<button type="button" class="button-link centurylib-main-repeater-close"><?php esc_html_e('Close','slain');?></button>
						</div>
					</div>
				</div>
				<?php
				$repeater_count++;
			}
		}

		?>
		<script type="text/html" class="tcy-code-for-repeater">
			<div class="tcy-widget-repeater-table">
				<div class="centurylib-repeater-top">
					<div class="centurylib-repeater-title-action">
						<button type="button" class="centurylib-repeater-action">
							<span class="te-toggle-indicator" aria-hidden="true"></span>
						</button>
					</div>
					<div class="centurylib-repeater-title">
						<h3><?php echo esc_html($row_title); ?><span class="centurylib-main-repeater-inner-title"></span></h3>
					</div>
				</div>
				<div class='centurylib-inside-repeater hidden'>
					<?php
					
					foreach($options as $repeater_slug => $repeater_data){
						/**/
						$tcy_repeater_child_field_name = (isset($repeater_data['name'] ) ) ? esc_attr($repeater_data['name']) : '';
						$repeater_field_id  = esc_attr($centurywidget->get_field_id( $name).$tcy_repeater_child_field_name);
						$name = esc_attr($tcy_repeater_main_key.'['.$coder_repeater_depth.']['.$tcy_repeater_child_field_name.']');
						$repeater_data['name'] = $name;
						$default = isset($repeater_data['default']) ? $repeater_data['default'] : '';
						centurylib_widgets_show_widget_field( $centurywidget, $repeater_data, $default );
					}
					?>
					<div class="centurylib-main-repeater-control-actions">
						<button type="button" class="button-link button-link-delete centurylib-main-repeater-remove"><?php esc_html_e('Remove','slain');?></button> |
						<button type="button" class="button-link centurylib-main-repeater-close"><?php esc_html_e('Close','slain');?></button>
					</div>
				</div>
			</div>
		</script>

		<input class="tcy-total-repeater-counter" type="hidden" value="<?php echo esc_attr( $repeater_count ) ?>">
		<span class="button tcy-add-repeater" id="<?php echo esc_attr( $coder_repeater_depth ); ?>"><?php echo esc_html($addnew_label); ?></span><br/>

	</div>
	<?php if ( isset( $description ) ) { ?>
		<small><?php echo esc_html( $description ); ?></small>
	<?php } ?>
</div>