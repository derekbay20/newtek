<?php
/**
 * The template for displaying footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */
$merge_menu = get_theme_mod( 'slain_merge_top_main_menu', 0 );
$header_width = get_theme_mod( 'slain_global_header_width', 'contained' );
$header_class = ($header_width==='contained') ? 'boxed-wrapper' : '';
$show_menu_sidebar = get_theme_mod( 'slain_main_nav_show_sidebar', 0 );
$show_random_icon = get_theme_mod( 'slain_main_nav_random_icon', 0 );
$enable_search_icon = get_theme_mod( 'slain_main_nav_search_icon', 0 );
$menu_align = get_theme_mod( 'slain_main_navigation_alignment', 'left' );
?>
<div id="main-nav" class="clear-fix menu-align-<?php echo esc_attr($menu_align); ?>">
	<div class="<?php echo esc_attr($header_class); ?>">	
		<div class="main-nav-buttons">
			<!-- Alt Sidebar Icon -->
			<?php 
			if ( $show_menu_sidebar ): 
				?>
			<a class="main-nav-sidebar" href="javascript:void(0)">
				<span class="btn-tooltip"><?php esc_html_e( 'Menu Sidebar', 'slain' ); ?></span>
				<span class="bars">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</a>
			<?php endif; ?>
		</div>
		<?php 
		$show_menu_sidebar = get_theme_mod( 'slain_main_nav_show_sidebar', 0 );
		if ( $show_menu_sidebar ): 
			get_template_part( 'template-parts/widget/area', 'menu' ); // Sidebar Menu
		endif;
		
		$mobile_menu_location = 'main';
		if(has_nav_menu( $mobile_menu_location )): ?>
			<!-- Mobile Menu Button -->
			<a class="mobile-menu-btn" href="javascript:void(0);">
				<span><?php esc_html_e( 'Menu', 'slain' ); ?></span>
				<i class="fa fa-chevron-down"></i>
			</a>
		<?php endif; ?>
		<?php 
		$main_menu_class = ($show_menu_sidebar) ? ' has-left-icon ' : ' no-left-icon ';
		$main_menu_class .= ( $show_random_icon || $enable_search_icon ) ? ' has-right-icon ' : ' no-right-icon ';
		// Navigation Menus
		wp_nav_menu( array(
			'theme_location' 	=> 'main',
			'menu_id'        	=> 'main-menu',
			'menu_class' 		=> $main_menu_class,
			'container' 	 	=> 'nav',
			'container_class'	=> 'main-menu-container',
			'fallback_cb' 		=> 'slain_main_menu_fallback'
		) );
		$mobile_menu_items = '';
		if ( $merge_menu ) {
			$mobile_menu_items = wp_nav_menu( array(
				'theme_location' => 'top',
				'container'		 => '',
				'items_wrap' 	 => '%3$s',
				'echo'			 => false,
				'fallback_cb'	 => false,
			) );
			if ( ! has_nav_menu('main') ) {
				$mobile_menu_location = 'top';
				$mobile_menu_items = '';
			}
		}
		wp_nav_menu( array(
			'theme_location' 	=> $mobile_menu_location,
			'menu_id'        	=> 'mobile-menu',
			'menu_class' 		=> '',
			'container' 	 	=> 'nav',
			'container_class'	=> 'mobile-menu-container',
			'items_wrap' 		=> '<ul id="%1$s" class="%2$s">%3$s '. $mobile_menu_items .'</ul>',
			'fallback_cb'	    => false,
		) );
		?>
		<!-- Icons -->
		<div class="main-nav-icons">
			<!-- Random Post Button -->	
			<?php 	
			if ( $show_random_icon ):
				slain_random_post_button();
			endif;
			if ( $enable_search_icon ) : ?>
			<div class="main-nav-search">
				<span class="btn-tooltip"><?php esc_html_e( 'Search', 'slain' ); ?></span>
				<a href="#" class="fa fa-search"></a>
				<a href="#" class="fa fa-times"></a>
			</div><!--main-nav-search-->
			
			<?php endif; ?>
		</div>
		<?php if ( $enable_search_icon ) : ?>
			<div class="menu-search-from">
				<?php get_search_form(); ?>
			</div>
		<?php endif; ?>
	</div>
</div><!-- #main-nav -->
