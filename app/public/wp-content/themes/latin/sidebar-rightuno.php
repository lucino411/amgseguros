<?php /*
	
@package blastingexpertstheme

*/

if ( ! is_active_sidebar( 'be-rightsidebar-uno' ) ) {
	return;
} ?>

<aside id="secondary" class="widget-area" role="complementary">
	<!-- Display the widgets into the sidebar -->	
	<?php dynamic_sidebar( 'be-rightsidebar-uno' ); ?>		      
</aside>