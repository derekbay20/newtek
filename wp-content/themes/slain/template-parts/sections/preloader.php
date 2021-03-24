<?php // Preloader HTML Codes
$enable_preloader = get_theme_mod( 'slain_enable_preloader', false );
if ( $enable_preloader ) : ?>
<div class="slain-preloader-wrap">
	<div class="cssload-container">
		<div id="loadFacebookG">
			<div id="blockG_1" class="facebook_blockG"></div>
			<div id="blockG_2" class="facebook_blockG"></div>
			<div id="blockG_3" class="facebook_blockG"></div>
		</div>
	</div>
</div><!-- .slain-preloader-wrap -->
<?php 
endif; 