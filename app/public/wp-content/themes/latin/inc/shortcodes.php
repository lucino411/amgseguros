<?php

/*
	
@package latincorrosionheme
	
	========================
		SHORTCODE OPTIONS
	========================
*/
function blastingexperts_tooltip( $atts, $content = null ){
	
	//[tooltip placement="top" title="This is the title"]This is the content[/tooltip]
	
	//get the attributes
	$atts = shortcode_atts(
		array(
			'placement' => 'auto',
			'title' => '',
		),
		$atts,
		'tooltip'
	);
	
	$title = ( $atts['title'] == '' ? $content : $atts['title'] );
	
	//return HTML
	return '<span class="blastingexperts-tooltip" data-toggle="tooltip" data-placement="' . $atts['placement'] . '" title="' . $title . '">' . $content . '</span>';


	
}

add_shortcode( 'tooltip', 'blastingexperts_tooltip' );

function blastingexperts_popover( $atts, $content = null ) {
	
	//[popover title="Popover title" placement="top" trigger="click" content="This is the Popover content"]This is the clickable content[/popover]
	
	//get the attributes
	$atts = shortcode_atts(
		array(
			'placement' => 'top',
			'title' => '',
			'trigger' => 'click',
			'content' => '',
		),
		$atts,
		'popover'
	);
	
	//return HTML
	return '<span class="blastingexperts-popover" data-toggle="popover" data-placement="' . $atts['placement'] . '" title="' . $atts['title'] . '" data-trigger="' . $atts['trigger'] . '" data-content="' . $atts['content'] . '">' . $content . '</span>';
		
}

add_shortcode( 'popover', 'blastingexperts_popover' );

// Contact Form shortcode
function blastingexperts_contact_form( $atts, $content = null ) {
	
	//[contact_form]
	
	//get the attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'contact_form'
	);
	
	//return HTML
	ob_start();
	include 'templates/contact-form.php';
	return ob_get_clean();
	
}
add_shortcode( 'contact_form', 'blastingexperts_contact_form' );


// Newsletter Form shortcode
function blastingexperts_newsletter_form( $atts, $content = null ) {
	
	//[newsletter_form]
	
	//get the attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'newsletter_form'
	);
	
	//return HTML
	ob_start();
	include 'templates/newsletter-form.php';
	return ob_get_clean();
	
}
add_shortcode( 'newsletter_form', 'blastingexperts_newsletter_form' );

// Freelance Form shortcode
function blastingexperts_freelance_form( $atts, $content = null ) {
	
	//freelance_form]
	
	//get the attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'freelance_form'
	);
	
	//return HTML
	ob_start();
	include 'templates/freelance-form.php';
	return ob_get_clean();
	
}
add_shortcode( 'freelance_form', 'blastingexperts_freelance_form' );