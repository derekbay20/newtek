<?php
/**
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Dynamic style about template
 *
 * @since 1.0.0
 */

if ( ! function_exists( 'slain_dynamic_styles' ) ):
	
	function slain_dynamic_styles() {

		$font_families = get_theme_mod( 'slain_font_families', array() );

		$logo_font_family = (isset($font_families['site_title'])) ? $font_families['site_title'] : '';

		$header_text_color = get_header_textcolor();
		$body_background_color = get_theme_mod('background_color');
		$logo_width = get_theme_mod( 'slain_header_logo_width', 200 );

		$feature_slider_onmob = get_theme_mod( 'slain_featured_slider_onmob', 1 );
		$featured_blocks_onmob = get_theme_mod( 'slain_featured_blocks_onmob', 1 );
		$related_posts_onmob = get_theme_mod( 'slain_related_posts_onmob', 1 );

		$branding_bg_color = get_theme_mod( 'slain_branding_background_color' );
		$accent_color = get_theme_mod( 'slain_content_accent_color', '#00a9ff' );
		$slain_sidebar_width = get_theme_mod( 'slain_single_sidebar_width', 270 );
		$both_sidbar_width = get_theme_mod( 'slain_both_sidebar_width', 200 );
		$enable_parallax = get_theme_mod( 'slain_enable_parallax_image', 1 );
		$branding_background = get_theme_mod( 'slain_branding_background_image' );
		$branding_bg_size = get_theme_mod( 'slain_branding_background_size', 'cover' );
		$nav_menu_align = get_theme_mod( 'slain_main_navigation_alignment', 'left' );
		$enable_randon_btn = get_theme_mod( 'slain_main_nav_random_icon', 1 );
		$header_text_hover = get_theme_mod( 'slain_header_hover_text_color', '#111111' );
		$content_background = get_theme_mod( 'slain_content_background_color' );
		$main_nav_font_style = get_theme_mod( 'slain_main_navigation_font_style', '' );
		$main_nav_font_transform = get_theme_mod( 'slain_main_navigation_font_transform', 'uppercase' );

		$left_sidebar_align = get_theme_mod( 'slain_left_sidebar_title_align', 'left' );
		$right_sidebar_align = get_theme_mod( 'slain_right_sidebar_title_align', 'left' );

		if(is_search()){
			$content_layout = get_theme_mod( 'slain_content_layout_search', 'list' );
		}elseif(is_archive()){
			$content_layout = get_theme_mod( 'slain_content_layout_archive', 'list' );
		}else{
			$content_layout = get_theme_mod( 'slain_content_layout_index', 'list' );
		}


		if(is_search()){
			$enable_dropcap_listing = get_theme_mod( 'slain_enable_drop_caps_search', 'disable' );
		}elseif(is_archive()){
			$enable_dropcap_listing = get_theme_mod( 'slain_enable_drop_caps_archive', 'disable' );
		}else{
			$enable_dropcap_listing = get_theme_mod( 'slain_enable_drop_caps_index', 'disable' );
		}

		if(is_page()){
			$enable_dropcaps_single = get_theme_mod( 'slain_enable_drop_caps_page', 'enable' );
		}else{
			$enable_dropcaps_single = get_theme_mod( 'slain_enable_drop_caps_post', 'enable' );
		}

		if(is_search()){
			$full_width_layout = get_theme_mod( 'slain_full_first_search', '1' );
		}elseif(is_archive()){
			$full_width_layout = get_theme_mod( 'slain_full_first_archive', '1' );
		}else{
			$full_width_layout = get_theme_mod( 'slain_full_first_index', '1' );
		}

		$all_categories = get_categories( array( 'hide_empty' => 1 ) );


		// CSS
		$css = '';

		// Top Bar
		$css .= '
			#top-bar a:hover,
			#top-bar li.current-menu-item > a,
			#top-bar li.current-menu-ancestor > a,
			#top-bar .sub-menu li.current-menu-item > a,
			#top-bar .sub-menu li.current-menu-ancestor> a {
			  color: '. esc_html($accent_color) .';
			}
		';

		// Page Header
		

		if ( $header_text_color != 'blank' ) {
			$css .= '
				.header-logo a,
				.site-description,
				.header-socials-icon {
					color: #'. esc_html( $header_text_color ) .';
				}
				.site-description:before,
				.site-description:after {
					background: #'. esc_html( $header_text_color ) .';
				}
			';
		}

		// Header Text Hover Color
		$css .= '
			.site-title a:hover,
			.header-socials-icon:hover {
				color: '. esc_html($header_text_hover) .';
			}
		';

		$css .= '
			.header-branding {
				background-color: '. esc_html($branding_bg_color) .';
			}
		';
		
		// Main Navigation
		$css .= '
			#main-nav a:hover,
			#main-nav .svg-inline--fa:hover,
			#main-nav li.current-menu-item > a,
			#main-nav li.current-menu-ancestor > a,
			#main-nav .sub-menu li.current-menu-item > a,
			#main-nav .sub-menu li.current-menu-ancestor > a {
				color: '. esc_html($accent_color) .';
			}

			.main-nav-sidebar:hover .bars span {
				background-color: '. esc_html($accent_color) .';
			}
		';

		// Content
		$css .= '
			/* Background */
			.sidebar-menu,
			.main-content,
			.featured-slider-area,
			#featured-links{
				background-color: '. esc_html($content_background) .';
			}

			.featured-link .cv-inner {
				border-color: '. esc_html(slain_hex2rgba( $content_background, 0.4 )) .';
			}

			.featured-link:hover .cv-inner {
				border-color: '. esc_html(slain_hex2rgba( $content_background, 0.8 )) .';
			}

			.page-content .read-more a:hover,
			.page-content .post-title a:hover {
				color: '. esc_html( slain_hex2rgba( '#030303', 0.75 ) ) .';
			}
		
		
			/* Accent */
			a,
			.post-categories,
			#page-wrap .slain-widget.widget_text a,
			.scrolltop,
			.required {
				color: '. esc_html($accent_color) .';
			}

			.ps-container > .ps-scrollbar-y-rail > .ps-scrollbar-y,
			.read-more a:after {
				background: '. esc_html($accent_color) .';
			}

			a:hover,
			.scrolltop:hover {
				color: '. esc_html(slain_hex2rgba( $accent_color, 0.8 )) .';
			}

			blockquote {
				border-color: '. esc_html($accent_color) .';
			}

			.widget-title h4 {
			  border-bottom-color: '. esc_html($accent_color) .';
			}


			/* Selection */
			::-moz-selection {
				color: #ffffff;
				background: '. esc_html($accent_color) .';
			}
			::selection {
				color: #ffffff;
				background: '. esc_html($accent_color) .';
			}

			.button,
			.page-content .slain-widget .button{
				color: '. esc_html($accent_color) .';
				border-color: '. esc_html($accent_color) .';
				background-color: transparent;
			}

			.button:hover,
			.slain-widget .button:hover,
			.submit:hover,
			.blog-pagination.numeric a:hover,
			.blog-pagination.numeric span,
			.slain-subscribe-box input[type="submit"],
			.widget_wysija input[type="submit"],
			.post-password-form input[type="submit"]:hover,
			.wpcf7 [type="submit"]:hover {
				color: #ffffff;
				background-color: '. esc_html($accent_color) .';
			}


			/* Image Overlay */
			.image-overlay,
			#infscr-loading,
			.page-content h4.image-overlay {
				color: #ffffff;
				background-color: '. esc_html(slain_hex2rgba( '#494949', 0.2 )) .';
			}

			.image-overlay a,
			.post-slider .prev-arrow,
			.post-slider .next-arrow,
			.page-content .image-overlay a,
			#featured-slider .slider-dots {
				color: #ffffff;
			}

			.slide-caption {
				background: '. esc_html(slain_hex2rgba( '#ffffff', 0.95 )) .';
			}
		';

		// Footer
		$css .= '	
			

			.instagram-title {
				background: '. esc_html(slain_hex2rgba( '#ffffff', 0.85 )) .';
			}

			
			#page-footer a:hover {
				color: '. esc_html($accent_color) .';
			}

			

		';

		/*
		** General Layouts =====
		*/
		// Blog Gutter
		$blog_page_gutter_horz = 32;
		$blog_page_gutter_vert = 35;

		// Site Width
		$css .= '
			.boxed-wrapper {
				max-width: 1160px;
			}
		';
		
		// Sidebar Width
		$css .= '
			.sidebar-menu {
				max-width: '. ( (int)$slain_sidebar_width + 70 ) .'px;
				left: -'. ( (int)$slain_sidebar_width + 70 ) .'px; 
				padding: 35px 20px 0px;
			}
		';

		$sidebar_names = slain_sidebar_name_array();
		if(count($sidebar_names)==2){
			$slain_sidebar_width = $both_sidbar_width;
		}

		$css .= '
			.sidebar-left,
			.sidebar-right {
				width: '. ( (int)$slain_sidebar_width + $blog_page_gutter_horz ) .'px;
			}
		';	

		if(count($sidebar_names)==1){
			if ( in_array( 'sidebar-left', $sidebar_names ) || in_array( 'sidebar-right', $sidebar_names ) ) {
				$css .= '
					.main-container {
						width: calc(100% - '. ( (int)$slain_sidebar_width + $blog_page_gutter_horz ) .'px);
						width: -webkit-calc(100% - '. ( (int)$slain_sidebar_width + $blog_page_gutter_horz ) .'px);
					}
				';
				if(in_array( 'sidebar-left', $sidebar_names)){
					$css .= '
						.main-container {
							float:right;
						}
					';
				}

			}else{
				$css .= '
				.main-container {
					width: 100%;
				}
			';
			}
		}elseif( count($sidebar_names)==2 ) {
			$css .= '
				.main-container {
					margin-right:-100%;
					margin-left:'.absint($slain_sidebar_width+$blog_page_gutter_horz).'px;
					width: calc(100% - '. ( ( (int)$slain_sidebar_width + $blog_page_gutter_horz ) * 2 ) .'px);
					width: -webkit-calc(100% - '. ( ( (int)$slain_sidebar_width + $blog_page_gutter_horz ) * 2 ) .'px);
				}
			';

		}else{

			$css .= '
				.main-container {
					width: 100%;
				}
			';
		}

		// List Layout
		if ( $content_layout == 'list' ) {
			$css .= '
				.blog-list-style {
					width: 100%;
					padding-bottom: 35px;
				}

				.blog-list-style .has-post-thumbnail .post-media {
					float: left;
					max-width: 300px;
					width: 100%;
				}

				.blog-list-style .has-post-thumbnail .post-content-wrap {
					width: calc(100% - 300px);
					width: -webkit-calc(100% - 300px);
					float: left;
					padding-left: 32px;
				}

				.blog-list-style .post-header, 
				.blog-list-style .read-more {
					text-align: left;
				}
			';

			if ( is_rtl() ) {
				$css .= '
					.blog-list-style .post-media {
						float: right;
					}

					.blog-list-style .post-content-wrap {
						float: right;
						padding-left: 0;
						padding-right: 32px;

					}

					.blog-list-style .post-header, 
					.blog-list-style .read-more {
						text-align: right;
					}
				';

			}
		}


		/*
		** Top Bar =====
		*/

		if ( ! has_nav_menu('top') ) {
			$css .= "
			@media screen and ( max-width: 979px ) {
				.top-bar-socials {
					float: none !important;
				}

				.top-bar-socials a {
					line-height: 40px !important;
				}
			}";
		}


		/*
		** Header Image =====
		*/
		$css .= '
			.header-branding {
				background-image: url('. esc_url( $branding_background ) .');
				background-size: '. esc_html($branding_bg_size) .';

			}
		';

		// Center if cover
		if ( esc_html($branding_bg_size) === 'cover' ) {
			$css .= '
				.header-branding {
					background-position: center center;
				}
			';		
		}

		// Header Logo
		$css .= '
			.custom-logo-link {
				max-width: '. (int)$logo_width .'px;
			}
		';

		// Parallax
		
		if ( $enable_parallax ) {
			$css .= '
				.header-branding {
					background-image: none;
				}
			';	
		}

		/*
		** Site Identity =====
		*/
		// Logo &  Tagline
		if ( ! display_header_text() ) {
			$css .= '
				.header-logo a:not(.custom-logo-link),
				.site-description {
					display: none;
				}
			';		
		}


		/*
		** Main Navigation =====
		*/
		
		// Align
		$css .= '
			#main-nav {
				text-align: '. esc_html($nav_menu_align) .';
			}
		';

		if ( $nav_menu_align === 'center' ) {
			$css .= '
				.main-nav-buttons {
				  position: absolute;
				  top: 0px;
				  left: 20px;
				  z-index: 1;
				}

			';
		}

		/*
		** Featured Blocks =====
		*/
		// Layout
		$featured_links = array();

		$featured_blocks = get_theme_mod( 'slain_featured_blocks', array() );
		foreach($featured_blocks as $block_single){
			$block_image = isset($block_single['image']) ? $block_single['image'] : '';
			if($block_image){
				$featured_links[] = $block_image;
			}
		}

		$featured_links = count( array_filter( $featured_links ) );
		$featured_links_gutter = 0;

		// Gutter	
		$featured_links_gutter = 25;
		$css .= '
			#featured-links .featured-link {
				margin-right: '. $featured_links_gutter .'px;
			}
			#featured-links .featured-link:last-of-type {
				margin-right: 0;
			}
		';

		// Columns
		$css .= '
			#featured-links .featured-link {
				width: calc( (100% - '. ( ($featured_links - 1) * $featured_links_gutter ) .'px) / '. $featured_links .' - 1px);
				width: -webkit-calc( (100% - '. ( ($featured_links - 1) * $featured_links_gutter ) .'px) / '. $featured_links .'- 1px);
			}
		';

		/*
		** Blog Page =====
		*/
		// Gutter
		$css .= '
			.blog-grid > li {
				display: inline-block;
				vertical-align: top;
				margin-right: '. $blog_page_gutter_horz .'px;
				margin-bottom: '. $blog_page_gutter_vert .'px;
			}

			.blog-grid > li.blog-grid-style {
				width: calc((100% - '. $blog_page_gutter_horz .'px ) /2 - 1px);
				width: -webkit-calc((100% - '. $blog_page_gutter_horz .'px ) /2 - 1px);
			}

			@media screen and ( min-width: 979px ) {

				.blog-grid > .blog-list-style:nth-last-of-type(-n+1) {
					margin-bottom: 0;
				}

				.blog-grid > .blog-grid-style:nth-last-of-type(-n+2) {
				 	margin-bottom: 0;
				}
				
			}

			@media screen and ( max-width: 640px ) {
				.blog-grid > li:nth-last-of-type(-n+1) {
					margin-bottom: 0;
				}
			}

		';


		if ( is_home() && ! is_paged() && $full_width_layout ) {
			$css .= '
				.blog-grid > li:nth-of-type(2n+1) {
					margin-right: 0;
				}
			';
		} else {
			$css .= '
				.blog-grid > li:nth-of-type(2n+2) {
					margin-right: 0;
				}
			';
		}


		if ( is_rtl() ) {
			
			$css .= '
			.blog-grid > li {
				margin-right: 0;
				margin-left: 32px;
			}';

			if ( is_home() && ! is_paged() && $full_width_layout ) {
				$css .= '
					.blog-grid > li:nth-of-type(2n+1) {
						margin-left: 0;
					}
				';
			} else {
				$css .= '
					.blog-grid > li:nth-of-type(2n+2) {
						margin-left: 0;
					}
				';
			}

		}
		
		// Blog Page Dropcaps
		if ( $enable_dropcap_listing == 'enable' ) {
			$css .= "
				.blog-grid .post-content > p:first-of-type:first-letter{
					float: left;
					margin: 6px 9px 0 -1px;
					font-family: 'Montserrat';
					font-weight: normal;
					font-style: normal;
					font-size: 81px;
					line-height: 65px;
					text-align: center;
					text-transform: uppercase;
					color: #030303;
				}

				@-moz-document url-prefix() {
					.blog-grid .post-content > p:first-of-type:first-letter{
					    margin-top: 10px !important;
					}
				}
			";
		}

		// Single Page Dropcaps
		if ( $enable_dropcaps_single == 'enable' ) {
			$css .= "
				.single .post-content > p:not(.wp-block-tag-cloud):first-of-type:first-letter,
				.page .post-content > p:not(.wp-block-tag-cloud):first-of-type:first-letter{
				  	float: left;
					margin: 6px 9px 0 -1px;
					font-family: 'Montserrat';
				  	font-weight: normal;
					font-style: normal;
					font-size: 81px;
					line-height: 65px;
					text-align: center;
					text-transform: uppercase;
				}

				@-moz-document url-prefix() {
					.single .post-content > p:not(.wp-block-tag-cloud):first-of-type:first-letter,
					.page .post-content > p:not(.wp-block-tag-cloud):first-of-type:first-letter{
					    margin-top: 10px !important;
					}
				}
			";
		}


		/*
		** Responsive =====
		*/
		// Featured Slider
		if ( !$feature_slider_onmob ) {
			$css .= '
			@media screen and ( max-width: 768px ) {
				.featured-slider-area {
					display: none;
				}
			}
			';
		}

		// Featured Links
		if ( !$featured_blocks_onmob ) {
			$css .= '
			@media screen and ( max-width: 768px ) {
				#featured-links {
					display: none;
				}
			}
			';
		}

		// Related Posts
		if ( !$related_posts_onmob ) {
			$css .= '
			@media screen and ( max-width: 640px ) {
				.related-posts {
					display: none;
				}
			}
			';
		}


		/*
		** Typography =====
		*/
		// Logo & Tagline
		$css .= "
			.header-logo a {
				font-family: '". str_replace( '+', ' ', esc_html($logo_font_family) ) ."';
			}
		";

		
		// Italic
		if ( $main_nav_font_style ) {
			$main_nav_css = strpos( $main_nav_font_style, 'bold' ) ? 'font-weight:bold;' : '';
			$main_nav_css .= strpos( $main_nav_font_style, 'italic' ) ? 'font-style:italic;' : '';
			$main_nav_css .= strpos( $main_nav_font_style, 'underline' ) ? 'text-decoration:underline;' : '';
			$css .= "
				#main-menu li a,
				#mobile-menu li {
					".$main_nav_css."
				}
			";
		}

		// Uppercase
		if ( $main_nav_font_transform ) {
			$css .= "
				#main-menu li a,
				#mobile-menu li {
					text-transform: ".$main_nav_font_transform.";
				}
			";
		}


		/*
		** Page Footer =====
		*/

		/*
		** Woocommerce =====
		*/

		/* Text */
		$css .= '
			.woocommerce div.product .stock,
			.woocommerce div.product p.price,
			.woocommerce div.product span.price,
			.woocommerce ul.products li.product .price,
			.woocommerce-Reviews .woocommerce-review__author,
			.woocommerce form .form-row .required,
			.woocommerce form .form-row.woocommerce-invalid label,
			.woocommerce .page-content div.product .woocommerce-tabs ul.tabs li a {
			    color: #464646;
			}

			.woocommerce a.remove:hover {
			    color: #464646 !important;
			}
		';

		/* Meta */
		$css .= '
			.woocommerce a.remove,
			.woocommerce .product_meta,
			.page-content .woocommerce-breadcrumb,
			.page-content .woocommerce-review-link,
			.page-content .woocommerce-breadcrumb a,
			.page-content .woocommerce-MyAccount-navigation-link a,
			.woocommerce .woocommerce-info:before,
			.woocommerce .page-content .woocommerce-result-count,
			.woocommerce-page .page-content .woocommerce-result-count,
			.woocommerce-Reviews .woocommerce-review__published-date,
			.woocommerce .product_list_widget .quantity,
			.woocommerce .widget_products .amount,
			.woocommerce .widget_price_filter .price_slider_amount,
			.woocommerce .widget_recently_viewed_products .amount,
			.woocommerce .widget_top_rated_products .amount,
			.woocommerce .widget_recent_reviews .reviewer {
			    color: #a1a1a1;
			}

			.woocommerce a.remove {
			    color: #a1a1a1 !important;
			}
		';

		/* Accent */
		$css .= '
			p.demo_store,
			.woocommerce-store-notice,
			.woocommerce span.onsale {
			   background-color: '. esc_html($accent_color) .';
			}

			.woocommerce .star-rating::before,
			.woocommerce .star-rating span::before,
			.woocommerce .page-content ul.products li.product .button,
			.page-content .woocommerce ul.products li.product .button,
			.page-content .woocommerce-MyAccount-navigation-link.is-active a,
			.page-content .woocommerce-MyAccount-navigation-link a:hover,
			.woocommerce-message::before {
			   color: '. esc_html($accent_color) .';
			}
		';

		/* Border Color */
		$css .= '
			.woocommerce form.login,
			.woocommerce form.register,
			.woocommerce-account fieldset,
			.woocommerce form.checkout_coupon,
			.woocommerce .woocommerce-info,
			.woocommerce .woocommerce-error,
			.woocommerce .woocommerce-message,
			.woocommerce .widget_shopping_cart .total,
			.woocommerce.widget_shopping_cart .total,
			.woocommerce-Reviews .comment_container,
			.woocommerce-cart #payment ul.payment_methods,
			#add_payment_method #payment ul.payment_methods,
			.woocommerce-checkout #payment ul.payment_methods,
			.woocommerce div.product .woocommerce-tabs ul.tabs::before,
			.woocommerce div.product .woocommerce-tabs ul.tabs::after,
			.woocommerce div.product .woocommerce-tabs ul.tabs li,
			.woocommerce .woocommerce-MyAccount-navigation-link,
			.select2-container--default .select2-selection--single {
				border-color: #e8e8e8;
			}

			.woocommerce-cart #payment,
			#add_payment_method #payment,
			.woocommerce-checkout #payment,
			.woocommerce .woocommerce-info,
			.woocommerce .woocommerce-error,
			.woocommerce .woocommerce-message,
			.woocommerce div.product .woocommerce-tabs ul.tabs li {
				background-color: '. esc_html(slain_hex2rgba( '#e8e8e8', 0.3 )) .';
			}

			.woocommerce-cart #payment div.payment_box::before,
			#add_payment_method #payment div.payment_box::before,
			.woocommerce-checkout #payment div.payment_box::before {
				border-color: '. esc_html(slain_hex2rgba( '#e8e8e8', 0.5 )) .';
			}

			.woocommerce-cart #payment div.payment_box,
			#add_payment_method #payment div.payment_box,
			.woocommerce-checkout #payment div.payment_box {
				background-color: '. esc_html(slain_hex2rgba( '#e8e8e8', 0.5 )) .';
			}
		';

		/* Buttons */
		$css .= '
			.page-content .woocommerce input.button,
			.page-content .woocommerce a.button,
			.page-content .woocommerce a.button.alt,
			.page-content .woocommerce button.button.alt,
			.page-content .woocommerce input.button.alt,
			.page-content .woocommerce #respond input#submit.alt,
			.woocommerce .page-content .widget_product_search input[type="submit"],
			.woocommerce .page-content .woocommerce-message .button,
			.woocommerce .page-content a.button.alt,
			.woocommerce .page-content button.button.alt,
			.woocommerce .page-content #respond input#submit,
			.woocommerce .page-content .widget_price_filter .button,
			.woocommerce .page-content .woocommerce-message .button,
			.woocommerce-page .page-content .woocommerce-message .button {
				color: #ffffff;
				background-color: #333333;
			}

			.page-content .woocommerce input.button:hover,
			.page-content .woocommerce a.button:hover,
			.page-content .woocommerce a.button.alt:hover,
			.page-content .woocommerce button.button.alt:hover,
			.page-content .woocommerce input.button.alt:hover,
			.page-content .woocommerce #respond input#submit.alt:hover,
			.woocommerce .page-content .woocommerce-message .button:hover,
			.woocommerce .page-content a.button.alt:hover,
			.woocommerce .page-content button.button.alt:hover,
			.woocommerce .page-content #respond input#submit:hover,
			.woocommerce .page-content .widget_price_filter .button:hover,
			.woocommerce .page-content .woocommerce-message .button:hover,
			.woocommerce-page .page-content .woocommerce-message .button:hover {
				color: #ffffff;
				background-color: '. esc_html($accent_color) .';
			}

		';

		$css.= '.sidebar-left .widget-title{
			text-align: '.esc_attr($left_sidebar_align).';
		}';

		$css.= '.sidebar-right .widget-title{
			text-align: '.esc_attr($right_sidebar_align).';
		}';

		foreach( $all_categories as $category_single ){
			$category_slug = $category_single->slug;
            $category_color = get_theme_mod( 'centurylib_category_color_'.strtolower( $category_slug ), '' );
            if(!$category_color){
                continue;
            }
            $cat_id = $category_single->term_id;
            $css .= '.cat-'.$category_slug.'{ color:'.$category_color.' !important;}';
        }


		$refine_output_css = slain_css_strip_whitespace( $css );

		wp_add_inline_style( 'slain-main', $refine_output_css );

	}

endif;

add_action( 'wp_enqueue_scripts', 'slain_dynamic_styles', 30 );