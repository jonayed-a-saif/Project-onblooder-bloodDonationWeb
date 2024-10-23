<?php
	// Block direct access
	if( ! defined( 'ABSPATH' ) ){
		exit( );
	}
	/**
	* @Packge 	   : Webteck
	* @Version     : 1.0
	* @Author     : Themeholy
    * @Author URI : https://www.themeholy.com/
	*
	*/

	if( ! is_active_sidebar( 'webteck-woo-sidebar' ) ){
		return;
	}
?>
<div class="col-xxl-4 col-lg-5">
	<!-- Sidebar Begin -->
	<aside class="sidebar-area shop-sidebar">
		<?php
			dynamic_sidebar( 'webteck-woo-sidebar' );
		?>
	</aside>
	<!-- Sidebar End -->
</div>