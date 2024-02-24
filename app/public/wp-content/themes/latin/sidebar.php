<?php /*
	
		@package latincorrosionheme

*/

if ( ! is_active_sidebar( 'blastingexperts-sidebar' ) ) {
	return;
}

?>

<aside id="secondary" class="widget-area" role="complementary">

	<!-- GTranslate: https://gtranslate.io/ -->
	<span class="gtranslate-sidebar">
		<?php echo do_shortcode('[gtranslate]'); ?>
	</span>


	<!-- Display de main menu within the sidebar on small resolutions -->
	<!-- <div class="d-md-none">		 -->
	<!-- <div class="d-xl-none">		 -->
	<div class="be-sidebar-navbar">		
		<?php
			wp_nav_menu( array(
				'theme_location' => 'sidebar',
				// 'theme_location' => 'primary',
				'container' => false,
				'menu_class' => 'navbar-nav be-menu-navbar navbar-collapse',
				// 'walker' => new BE_Walker_Nav_Primary()
				// 'walker' 			=> new bemegamenu\core\walkernav()							

			) );	
		?>
	</div>

	<!-- Display the widgets into the sidebar -->
	
	<?php dynamic_sidebar( 'blastingexperts-sidebar' ); ?>	
	
      
</aside>