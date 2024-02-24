<?php

/*
	
@package latincorrosionheme
	
	========================
		ADMIN ENQUEUE FUNCTIONS
	========================
*/

function blastingexperts_load_admin_scripts( $hook ){
	//echo $hook;
	
	//register css admin section
	wp_register_style( 'raleway-admin', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
	wp_register_style( 'blastingexperts_admin', get_template_directory_uri() . '/css/blastingexperts.admin.css', array(), '1.0.0', 'all' );
	
	//register js admin section
	wp_register_script( 'blastingexperts-admin-script', get_template_directory_uri() . '/js/blastingexperts.admin.js', array('jquery'), '1.0.0', true );
	
	$pages_array = array(
		'toplevel_page_blastingexperts',
		'blastingexperts_page_blastingexperts_theme',
		'blastingexperts_page_blastingexperts_theme_contact',
		'blastingexperts_page_blastingexperts_css'
	);
	
	//PHP 7
	
	if( in_array( $hook, $pages_array ) ){		
		wp_enqueue_style( 'raleway-admin' );
		wp_enqueue_style( 'blastingexperts_admin' );	
	} 
	
	if( 'toplevel_page_blastingexperts' == $hook ){		
		wp_enqueue_media();		
		wp_enqueue_script( 'blastingexperts-admin-script' );		
	}
	
	if ( 'blastingexperts_page_blastingexperts_css' == $hook ){
		wp_enqueue_script( 'blastingexperts-custom-css-script', get_template_directory_uri() . '/js/blastingexperts.custom_css.js', array('jquery'), '1.0.0', true );	
	}
	
}
add_action( 'admin_enqueue_scripts', 'blastingexperts_load_admin_scripts' );

/*
	
	================================================
		FRONT-END ENQUEUE FUNCTIONS
	================================================
*/

function blastingexperts_load_scripts(){
	
	// wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500');
	wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap');
	wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	// wp_enqueue_style( 'aguafina', 'https://fonts.googleapis.com/css2?family=Aguafina+Script&display=swap');
	wp_enqueue_style( 'bootstrapicons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.5.3', 'all' );
	wp_enqueue_style( 'magnificpopup', get_template_directory_uri() . '/css/magnific-popup.css', array(), '1.1.0', 'all' );
	wp_enqueue_style( 'blastingexperts', get_template_directory_uri() . '/css/be.min.css', array(), '1.0.0', 'all' );
	
	// wp_deregister_script( 'jquery' );
    // wp_register_script( 'jquery' , get_template_directory_uri() . '/js/jquery.js', false, '3.5.1', true );
	// wp_enqueue_script( 'jquery' );    
    wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), '1.14.3', true);
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.5.3', true );
	wp_enqueue_script( 'magnificpopup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true );
	wp_enqueue_script( 'blastingexperts', get_template_directory_uri() . '/js/blastingexperts.js', array('jquery'), '1.0.0', true );
	
}
add_action( 'wp_enqueue_scripts', 'blastingexperts_load_scripts' );