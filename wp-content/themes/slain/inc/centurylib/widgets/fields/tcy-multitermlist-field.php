<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for multiple term list field
 */
?>
<div class="tcy-widget-field-wrapper <?php echo esc_attr($wrapper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>">
		<?php echo esc_html( $title ); ?>: 
	</label>
	<ul class="centurylib-multiple-checkbox">
		<?php
		/* see more here https://developer.wordpress.org/reference/functions/get_terms/*/
		if( taxonomy_exists( $taxonomy ) ){
			$args = array(
				'taxonomy'     => $taxonomy,
				'hide_empty'   => false,
				'number'      => 999,
			);
			$all_terms = get_terms($args);
			if( $all_terms ){
				foreach( $all_terms as $single_term ){
					$teg_term_id = $single_term->term_id;
					$teg_term_name = $single_term->name;
					?>
					<li>
						<input 
						id="<?php echo esc_attr( $centurywidget->get_field_id($name) .'_'.$taxonomy.'_'.$teg_term_id ); ?>" 
						name="<?php echo esc_attr( $centurywidget->get_field_name($name).'[]' ); ?>" 
						type="checkbox" 
						value="<?php echo esc_attr( $teg_term_id ); ?>" 
						<?php checked(in_array($teg_term_id, (array)$value)); ?> 
						/>
						<label for="<?php echo esc_attr( $centurywidget->get_field_id($name) .'_'.$taxonomy.'_'.$teg_term_id ); ?>"><?php echo esc_html( $teg_term_name .' ('.$single_term->count.')' ); ?></label>
					</li>
					<?php
				}
			}else{
				?><span><?php esc_html_e( 'No terms found in this taxonomy', 'slain' ); ?></span><?php
			}
		}else{
			?><span><?php esc_html_e( 'Selected taxonomy doesn\'t exist', 'slain' ); ?></span><?php
		}
		
		?>
	</ul>
	<?php
	if ( isset( $description ) ) { 
		?>
		<span><?php echo esc_html( $description ); ?></span>
		<?php 
	}
	?>
</div>