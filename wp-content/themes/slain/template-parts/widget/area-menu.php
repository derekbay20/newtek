<div class="sidebar-menu-wrap">
	<div class="sidebar-menu-close image-overlay"></div>
	<aside class="sidebar-menu small-widget-area" style="display: none;">
		<div class="sidebar-menu-header">
			<h3><?php esc_html_e( 'Sidebar Menu', 'slain' ); ?></h3>
			<a class="sidebar-menu-close-btn" href="javascript:void(0)">
				<span></span>
				<span></span>
			</a>
		</div>
		<?php
			if ( ! is_active_sidebar( 'menu-sidebar' ) ) {
				echo '<div ="slain-widget"><p>'. esc_html__( 'No Widgets found in the Menu Sidebar!', 'slain' ) .'</p></div>';
			} else {
				dynamic_sidebar( 'menu-sidebar' );
			}
		?>
	</aside>
</div>