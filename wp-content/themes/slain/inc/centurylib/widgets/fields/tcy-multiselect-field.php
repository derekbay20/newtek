<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for multiple select field
 */
?>
<div class="tcy-widget-field-wrapper <?php echo esc_attr($wrapper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>">
		<?php echo esc_html( $title ); ?>: 
	</label>
	<ul class="centurylib-multiple-checkbox">
		<?php
		if( $options ){
			foreach( $options as $athm_option_name => $athm_option_title ){
				?>
				<li>
					<input 
					id="<?php echo esc_attr( $centurywidget->get_field_id($name) .'_'.$athm_option_name ); ?>" 
					name="<?php echo esc_attr( $centurywidget->get_field_name($name).'[]' ); ?>" 
					type="checkbox" 
					value="<?php echo esc_attr( $athm_option_name ); ?>" 
					<?php checked(in_array($athm_option_name, (array)$value)); ?> 
					/>
					<label for="<?php echo esc_attr( $centurywidget->get_field_id($name) .'_'.$athm_option_name ); ?>"><?php echo esc_html( $athm_option_title ); ?></label>
				</li>
				<?php
			}
		}
		if ( isset( $description ) ) { 
			?>
			<br/>
			<small><?php echo esc_html( $description ); ?></small>
			<?php 
		}
		?>
	</ul>
</div>