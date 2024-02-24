<?php

    require get_template_directory() . '/inc/vendor/Mobile_Detect.php';    
	require get_template_directory() . '/inc/cleanup.php';
    require get_template_directory() . '/inc/function-admin.php';
    require get_template_directory() . '/inc/enqueue.php';
    require get_template_directory() . '/inc/theme-support.php';
    require get_template_directory() . '/inc/custom-post-type.php';
    require get_template_directory() . '/inc/walkernav.php';
    require get_template_directory() . '/inc/shortcodes.php';
    require get_template_directory() . '/inc/ajax.php'; //Esto debe ir debajo de shortcodes.php para evitar error 400
    require get_template_directory() . '/inc/widgets.php';
    require get_template_directory() . '/inc/custom-functions.php';
    require get_template_directory() . '/inc/custom-taxonomies.php';