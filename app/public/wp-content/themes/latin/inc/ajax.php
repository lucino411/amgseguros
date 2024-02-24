<?php

/*
	
@package latincorrosionheme	
	========================
		AJAX FUNCTIONS
	========================
*/
// add_action( 'wp_ajax_nopriv_blastingexperts_load_more', 'blastingexperts_load_more' );
// add_action( 'wp_ajax_blastingexperts_load_more', 'blastingexperts_load_more' );

// add_action( 'wp_ajax_nopriv_blastingexperts_save_user_contact_form', 'blastingexperts_save_contact' );
// add_action( 'wp_ajax_blastingexperts_save_user_contact_form', 'blastingexperts_save_contact' );

add_action( 'wp_ajax_nopriv_latin_save_user_contact_form', 'latin_save_contact' );
add_action( 'wp_ajax_latin_save_user_contact_form', 'latin_save_contact' );

add_action( 'wp_ajax_nopriv_be_save_user_newsletter_form', 'be_save_newsletter' );
add_action( 'wp_ajax_be_save_user_newsletter_form', 'be_save_newsletter' );

add_action( 'wp_ajax_nopriv_be_save_user_freelance_form', 'be_save_freelance' );
add_action( 'wp_ajax_be_save_user_freelance_form', 'be_save_freelance' );

/*
======================================= 
Function Load More
======================================= 
*/

// function blastingexperts_load_more() {
	
// 	$paged = $_POST["page"]+1;
// 	$prev = $_POST["prev"];
// 	$archive = $_POST["archive"];
	
// 	if( $prev == 1 && $_POST["page"] != 1 ){
// 		$paged = $_POST["page"]-1;
// 	}
	
// 	$args = array(
// 		'post_type' => 'post',
// 		'post_status' => 'publish',
// 		'paged' => $paged
// 	);
	
// 	if( $archive != '0' ){
		
// 		$archVal = explode( '/', $archive );
// 		$flipped = array_flip($archVal);
		
// 		switch( isset( $flipped ) ) {
			
// 			case $flipped["category"] :
// 				$type = "category_name";
// 				$key = "category";
// 				break;
				
// 			case $flipped["tag"] :
// 				$type = "tag";
// 				$key = $type;
// 				break;
				
// 			case $flipped["author"] :
// 				$type = "author";
// 				$key = $type;
// 				break;
			
// 		}
		
// 		$currKey = array_keys( $archVal, $key );
// 		$nextKey = $currKey[0]+1;
// 		$value = $archVal[ $nextKey ];
			
// 		$args[ $type ] = $value;
		
// 		//check page trail and remove "page" value
// 		if( isset( $flipped["page"] ) ){
			
// 			$pageVal = explode( 'page', $archive );
// 			$page_trail = $pageVal[0];
			
// 		} else {
// 			$page_trail = $archive;
// 		}
		
// 	} else {
// 		$page_trail = '/';
// 	}
	
// 	$query = new WP_Query( $args );
	
// 	if( $query->have_posts() ):
		
// 		echo '<div class="page-limit" data-page="' . $page_trail . 'page/' . $paged . '/">';
				
// 		while( $query->have_posts() ): $query->the_post();
		
// 			get_template_part( 'template-parts/content', get_post_format() );
		
// 		endwhile;
		
// 		echo '</div>';
		
// 	else:
	
// 		echo 0;
		
// 	endif;
	
// 	wp_reset_postdata();
	
// 	die();
	
// }



/*
======================================= 
Save Contact Form
======================================= 
*/

// function blastingexperts_save_contact(){

// 	$title = wp_strip_all_tags($_POST["name"]);
// 	$email = wp_strip_all_tags($_POST["email"]);
// 	$message = wp_strip_all_tags($_POST["message"]);
	
// 	$args = array(
// 		'post_title' => $title,
// 		'post_content' => $message,
// 		'post_author' => 1,
// 		'post_status' => 'publish',
// 		'post_type' => 'be-contact',
// 		'meta_input' => array(
// 			'_contact_email_value_key' => $email
// 		)
// 	);

// 	$postID = wp_insert_post( $args );

// 	if ($postID !== 0) {
//         $to = get_bloginfo('admin_email');
//         $subject = 'Formulario de Contacto Blasting Experts - '.$title;

//         $headers[] = 'From: '.get_bloginfo('name').' <'.$to.'>'; // 'From: Alex <me@alecaddd.com>'
//         $headers[] = 'Reply-To: '.$title.' <'.$email.'>';
//         $headers[] = 'Content-Type: text/html: charset=UTF-8';

//         wp_mail($to, $subject, $message, $headers);
//     }


// 	echo $postID;

// 	die();

// }

function latin_save_contact(){
	$nombre = wp_strip_all_tags($_POST["name"]);
	$apellido = wp_strip_all_tags($_POST["apellido"]);
	$email = wp_strip_all_tags($_POST["email"]);
	$profesion = wp_strip_all_tags($_POST["profesion"]);
	$pais_residencia = wp_strip_all_tags($_POST["pais_residencia"]);
	$perfil_linkedin = wp_strip_all_tags($_POST["perfil_linkedin"]);
	$message = wp_strip_all_tags($_POST["message"]);	

	$args = array(
		'post_author' => 1,
		'post_status' => 'publish',
		'post_type' => 'be-contact',
		'post_nombre' => $nombre,
		'post_apellido' => $apellido,
		'post_profesion' => $profesion,
		'post_residencia' => $pais_residencia,
		'post_linkedin' => $perfil_linkedin,
		'post_content' => $message,
		'meta_input' => array(
			'_contact_email_value_key' => $email,
			'_contact_nombre_value_key' => $nombre,
			'_contact_apellido_value_key' => $apellido,
			'_contact_pais_residencia_value_key' => $pais_residencia,
			'_contact_profesion_value_key' => $profesion,
			'_contact_perfil_linkedin_value_key' => $perfil_linkedin,
		)
	);

	$postID = wp_insert_post( $args );

	// if ($postID !== 0) {
    //     $to = get_bloginfo('admin_email');
    //     $subject = 'Formulario de Newsletter Blasting Experts - '.$title;

    //     $headers[] = 'From: '.get_bloginfo('name').' <'.$to.'>'; // 'From: Alex <me@alecaddd.com>'
    //     $headers[] = 'Reply-To: '.$title.' <'.$email.'>';
    //     $headers[] = 'Content-Type: text/html: charset=UTF-8';

    //     wp_mail($to, $subject, $message, $headers);
    // }


	echo $postID;

	die();

}

/*
======================================= 
Save Newsletter Form
======================================= 
*/
function be_save_newsletter(){

	$email = wp_strip_all_tags($_POST["email"]);

	$args = array(
		'post_author' => 1,
		'post_status' => 'publish',
		'post_type' => 'be-newsletter',
		'meta_input' => array(
			'_newsletter_email_value_key' => $email
		)
	);

	$postID = wp_insert_post( $args );

	// if ($postID !== 0) {
    //     $to = get_bloginfo('admin_email');
    //     $subject = 'Formulario de Newsletter Blasting Experts - '.$title;

    //     $headers[] = 'From: '.get_bloginfo('name').' <'.$to.'>'; // 'From: Alex <me@alecaddd.com>'
    //     $headers[] = 'Reply-To: '.$title.' <'.$email.'>';
    //     $headers[] = 'Content-Type: text/html: charset=UTF-8';

    //     wp_mail($to, $subject, $message, $headers);
    // }


	echo $postID;

	die();

}









/*
======================================= 
Save Freelance Form
======================================= 
*/

function be_save_freelance(){

	$nombre = wp_strip_all_tags($_POST["name"]);
	$apellido = wp_strip_all_tags($_POST["apellido"]);
	$email = wp_strip_all_tags($_POST["email"]);
	$profesion = wp_strip_all_tags($_POST["profesion"]);
	$pais_residencia = wp_strip_all_tags($_POST["pais_residencia"]);
	$perfil_linkedin = wp_strip_all_tags($_POST["perfil_linkedin"]);
	$perfil_facebook = wp_strip_all_tags($_POST["perfil_facebook"]);
	$experiencia1 = wp_strip_all_tags($_POST["experiencia1"]);
	$experiencia2 = wp_strip_all_tags($_POST["experiencia2"]);
	$experiencia3 = wp_strip_all_tags($_POST["experiencia3"]);
	$message = wp_strip_all_tags($_POST["message"]);	
	
	$args = array(
		'post_nombre' => $nombre,
		'post_apellido' => $apellido,
		'post_profesion' => $profesion,
		'post_residencia' => $pais_residencia,
		'post_linkedin' => $perfil_linkedin,
		'post_facebook' => $perfil_facebook,
		'post_experiencia1' => $experiencia1,
		'post_experiencia2' => $experiencia2,
		'post_experiencia3' => $experiencia3,
		'post_content' => $message,
		'post_author' => 1,
		'post_status' => 'publish',
		'post_type' => 'be-freelance',
		'meta_input' => array(
			'_freelance_email_value_key' => $email,
			'_freelance_nombre_value_key' => $nombre,
			'_freelance_apellido_value_key' => $apellido,
			'_freelance_pais_residencia_value_key' => $pais_residencia,
			'_freelance_profesion_value_key' => $profesion,
			'_freelance_perfil_linkedin_value_key' => $perfil_linkedin,
			'_freelance_perfil_facebook_value_key' => $perfil_facebook,
			'_freelance_experiencia1_value_key' => $experiencia1,
			'_freelance_experiencia2_value_key' => $experiencia2,
			'_freelance_experiencia3_value_key' => $experiencia3,
		)
	);

	$postID = wp_insert_post( $args );


	// if ($postID !== 0) {
        // $to = get_bloginfo('admin_email');
    //     $to = get_bloginfo('lucino411@gmail.com');
    //     $subject = 'Formulario de Freelancers Blasting Experts - '.$title;

    //     $headers[] = 'From: '.get_bloginfo('name').' <'.$to.'>'; // 'From: Alex <me@alecaddd.com>'
    //     $headers[] = 'Reply-To: '.$title.' <'.$email.'>';
    //     $headers[] = 'Content-Type: text/html: charset=UTF-8';

    //     wp_mail($to, $subject, $message, $headers);
    // }


	echo $postID;

	die();

}












/*-- ----- check paged ----- --*/

function blastingexperts_check_paged( $num = null ){
	
	$output = '';
	
	if( is_paged() ){ $output = 'page/' . get_query_var( 'paged' ); }
	
	if( $num == 1 ){
		$paged = ( get_query_var( 'paged' ) == 0 ? 1 : get_query_var( 'paged' ) );
		return $paged;
	} else {
		return $output;
	}
	
}