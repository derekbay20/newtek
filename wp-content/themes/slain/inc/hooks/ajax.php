<?php
/*
 * Dglib Ajax related Hook goes here.
 */
if(!function_exists('slain_block_posts_tabs_callback')):

	function slain_block_posts_tabs_callback(){

		$_all_post_vals = wp_unslash( $_POST );

		$block_layout   = isset( $_all_post_vals['block_layout'] ) ? esc_attr($_all_post_vals['block_layout']) : '';
		$thumbnail_size   = isset( $_all_post_vals['thumbnail_size'] ) ? esc_attr($_all_post_vals['thumbnail_size']) : '';
		$largeimg_size   = isset( $_all_post_vals['largeimg_size'] ) ? esc_attr($_all_post_vals['largeimg_size']) : '';
		$large_excerpt_length   = isset( $_all_post_vals['large_excerpt_length'] ) ? absint($_all_post_vals['large_excerpt_length']) : '';
		$small_excerpt_length   = isset( $_all_post_vals['small_excerpt_length'] ) ? absint($_all_post_vals['small_excerpt_length']) : '';
		$posts_per_page   = isset( $_all_post_vals['posts_per_page'] ) ? absint($_all_post_vals['posts_per_page']) : 6;
		$terms_ids   = isset( $_all_post_vals['terms_ids'] ) ? absint($_all_post_vals['terms_ids']) : '';

		$response = array(
			'request' => $_all_post_vals,
			'is_success' => false,
			'widget_html' => false,
		);
        // Verify the nonce before proceeding.
		$block_posts_nonce   = isset( $_all_post_vals['block_posts_nonce'] ) ? esc_html($_all_post_vals['block_posts_nonce']) : '';
		$block_posts_action = 'slain_block_post_tabs_nonce';

        // Check if nonce is set...
		if ( ! isset( $block_posts_nonce ) ) {
			$response['is_success'] = esc_html__( 'Nonce doesnot exist.', 'slain' );
			wp_send_json($response);
		}

        // Check if nonce is valid...
		if ( ! wp_verify_nonce( $block_posts_nonce, $block_posts_action ) ) {
			$response['is_success'] = esc_html__( 'Nonce doesnot match.', 'slain' );
			wp_send_json($response);
		}

		ob_start();
		$slain_args = array(
			'terms_ids' => $terms_ids,
			'thumbnail_size' => $thumbnail_size,
			'largeimg_size' => $largeimg_size,
			'large_excerpt_length' => $large_excerpt_length,
			'small_excerpt_length' => $small_excerpt_length,
		);
		?><div class="block-posts-wrapper centurylib-tab-term-<?php echo absint($terms_ids); ?> tab-active"><?php
		switch ( $block_layout ){
			case 'layout2':
			slain_block_second_layout_section( $slain_args );
			break;
			case 'layout3':
			slain_block_box_layout_section( $slain_args );
			break;
			case 'layout4':
			slain_block_alternate_grid_section( $slain_args );
			break;
			case 'layout5':
			slain_block_blog_style_section( $slain_args );
			break;
			default:
			slain_block_one_layout_section( $slain_args );
			break;
		}
		?></div><?php
		$widget_html = ob_get_clean();
		if($widget_html){
			$response['widget_html'] = $widget_html;
		}
		wp_send_json($response);
		
	}

endif;
add_action( 'wp_ajax_slain_block_posts_tabs', 'slain_block_posts_tabs_callback' );
add_action( 'wp_ajax_nopriv_slain_block_posts_tabs', 'slain_block_posts_tabs_callback' );