<?php
/**
 * Featured Slider Template Part
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

$featured_blocks =  get_theme_mod( 'slain_featured_blocks', array() );
$featured_width = get_theme_mod( 'slain_featured_blocks_width', 'boxed' );

$boxed_class = ($featured_width=='boxed') ? 'boxed-wrapper' : '';
$contained_class = ($featured_width=='contained') ? 'boxed-wrapper' : '';
?>
<div id="featured-links" class="<?php echo esc_attr($boxed_class); ?> clear-fix">
	<div class="clear-fix <?php echo esc_attr($contained_class); ?>">
	<?php 
	foreach( $featured_blocks as $block_single ): 
		$block_link = isset($block_single['link']) ? $block_single['link'] : '';
		$block_title = isset($block_single['title']) ? $block_single['title'] : '';
		$image_id = isset($block_single['image']) ? $block_single['image'] : '';
		if(!$image_id){
			continue;
		}
		?>
		<div class="featured-link">
			<?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
			<a href="<?php echo esc_html( $block_link ); ?>">
				<div class="cv-outer">
					<?php if($block_title): ?>
						<div class="cv-inner">
							<h6><?php echo esc_html( $block_title ); ?></h6>
						</div>
					<?php endif; ?>
				</div>
			</a>
		</div>
	<?php endforeach; ?>
	</div>
</div><!-- #featured-links -->