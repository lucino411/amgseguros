<?php

/*
	
@package latincorrosionheme
	
	========================
		THEME SUPPORT OPTIONS
	========================
*/

$options = get_option( 'post_formats' );
// $output = array();

if( !empty( $options ) ){

	// foreach ($options as $option => $value) {
	// 	$output[] = $option;
		
	// }
	// print_r( array_keys($options));
	// die("products_first_ends");

	// add_theme_support( 'post-formats', $output );
	add_theme_support( 'post-formats', array_keys($options) );
}

$header = get_option( 'custom_header' );
if( $header == 1 ){
	add_theme_support( 'custom-header' );
}

$background = get_option( 'custom_background' );
if( $background == 1 ){
	add_theme_support( 'custom-background' );
}

add_theme_support( 'post-thumbnails' );

/*
======================================= 
CUSTOM IMAGE SIZES
======================================= 
*/

add_image_size( 'slider-principal', 1920, 668, true );


/*
======================================= 
CUSTOM LOGO
======================================= 
*/
function be_custom_logo_setup() {
	$defaults = array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
    'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'be_custom_logo_setup' );


/* Activate HTML5 features */
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );