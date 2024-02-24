<?php

/*
	
		@package latincorrosionheme

/**
 * Class for rendering Wordpress navigation in Bootstrap style -  Productos
 */

 /*
======================================= 
Defer Scripts
======================================= 
*/

function mind_defer_scripts( $tag, $handle, $src ) {
	$defer = array( 
		'popper',
		'bootstrap',
	  	'magnific-popup',
	  	'blastingexperts',
	);
	if ( in_array( $handle, $defer ) ) {
	   return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
	}	  
	  return $tag;
  } 
  add_filter( 'script_loader_tag', 'mind_defer_scripts', 10, 3 );


/*
======================================= 
	Defer loading videos
======================================= 
*/

function defer_video_oembed(){

	// get iframe HTML
	$iframe = get_field('oembed');
	// use preg_match to find iframe src
	preg_match('/src="(.+?)"/', $iframe, $matches);
	$src = $matches[1];
	
	// add extra params to iframe src
	$params = array(
		'controls'    => 0,
		'hd'        => 1,
		'autohide'    => 1
	);
	
	$new_src = add_query_arg($params, $src);
	
	$iframe = str_replace($src, $new_src, $iframe);
	
	// add extra attributes to iframe html
	$attributes = 'frameborder="0" class="lazyload"';
	// use preg_replace to change iframe src to data-src
	$iframe = preg_replace('~<iframe[^>]*\K(?=src)~i','data-',$iframe);
	$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
	
	// echo $iframe
	return $iframe;
	
	}
	
	
	// function defer_video_src_to_data($data, $url, $args) {
	// 	$data = preg_replace('/(src="([^\"\']+)")/', 'src="" data-src-defer="$2"', $data);
	// 	return $data;
	// } // end function defer_video_src_to_data
	// add_filter('oembed_result', 'defer_video_src_to_data', 99, 3);
	// add_filter('embed_oembed_html', 'defer_video_src_to_data', 99, 3);



/*
	
@package blastingexpertstheme
	
	========================
		Contact Form
	========================
*/

// $contact = get_option( 'activate_contact' );
// if( $contact ){
//     add_action( 'init', 'blastingexperts_contact_custom_post_type' );
//     add_filter( 'manage_be-contact_posts_columns', 'be_set_contact_columns' );
// 	add_action( 'manage_be-contact_posts_custom_column', 'be_contact_custom_column', 10, 2 );
	
// 	add_action( 'add_meta_boxes', 'be_contact_add_meta_box' );
// 	add_action( 'save_post', 'be_save_contact_email_data' );
// }


// // Agrega campos en el administrador de Wordpress

// function be_set_contact_columns( $columns ){
// 	$newColumns = array();
// 	$newColumns['title'] = 'Full Name';
// 	$newColumns['message'] = 'Message';
// 	$newColumns['email'] = 'Email';
// 	$newColumns['date'] = 'Date';
// 	return $newColumns;
// }

// function be_contact_custom_column( $column, $post_id ){

// 	switch( $column ){
		
// 		case 'message' :
// 			echo get_the_excerpt();
// 			break;
			
// 		case 'email' :
// 			$email = get_post_meta( $post_id, '_contact_email_value_key', true );
// 			echo '<a href="mailto:'.$email.'">'.$email.'</a>';
// 			break;
// 	}
	
// }

// /* CONTACT META BOXES */

// function be_contact_add_meta_box() {
// 	add_meta_box( 'contact_email', 'User Email', 'be_contact_email_callback', 'be-contact', 'side' );
// }

// function be_contact_email_callback( $post ) {
// 	wp_nonce_field( 'be_save_contact_email_data', 'be_contact_email_meta_box_nonce' );
	
// 	$value = get_post_meta( $post->ID, '_contact_email_value_key', true );
	
// 	echo '<label for="be_contact_email_field">Email de Usuario: </lable>';
// 	echo '<input type="email" id="be_contact_email_field" name="be_contact_email_field" value="' . esc_attr( $value ) . '" size="25" />';
// }

// function be_save_contact_email_data( $post_id ) {
	
// 	if( ! isset( $_POST['be_contact_email_meta_box_nonce'] ) ){
// 		return;
// 	}
	
// 	if( ! wp_verify_nonce( $_POST['be_contact_email_meta_box_nonce'], 'be_save_contact_email_data') ) {
// 		return;
// 	}
	
// 	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
// 		return;
// 	}
	
// 	if( ! current_user_can( 'edit_post', $post_id ) ) {
// 		return;
// 	}
	
// 	if( ! isset( $_POST['be_contact_email_field'] ) ) {
// 		return;
// 	}
	
// 	$my_data = sanitize_text_field( $_POST['be_contact_email_field'] );
	
// 	update_post_meta( $post_id, '_contact_email_value_key', $my_data );
	
// }


$contact = get_option( 'activate_contact' );
if( $contact ){
    add_action( 'init', 'blastingexperts_contact_custom_post_type' );
    add_filter( 'manage_be-contact_posts_columns', 'be_set_contact_columns' );
	add_action( 'manage_be-contact_posts_custom_column', 'be_contact_custom_column', 10, 2 );
	
	add_action( 'add_meta_boxes', 'be_contact_add_meta_box' );
	add_action( 'save_post', 'be_save_contact_email_data' );
}


// Agrega campos en el administrador de Wordpress

function be_set_contact_columns( $columns ){
	$newColumns = array();
	$newColumns['nombre'] = 'Nombre';
	$newColumns['apellido'] = 'Apellido';
	$newColumns['pais_residencia'] = 'País de Residencia';
	$newColumns['email'] = 'Email';
	$newColumns['date'] = 'Date';
	return $newColumns;
}

function be_contact_custom_column( $column, $post_id ){

	switch( $column ){

		case 'nombre' :
			$nombre = get_post_meta( $post_id, '_contact_nombre_value_key', true );
			echo '<p>'.$nombre.'</p>';
			break;				

		case 'apellido' :
			$apellido = get_post_meta( $post_id, '_contact_apellido_value_key', true );
			echo '<p>'.$apellido.'</p>';
			break;	
			
		case 'email' :
			$email = get_post_meta( $post_id, '_contact_email_value_key', true );
			echo '<a href="mailto:'.$email.'">'.$email.'</a>';
			break;

		case 'pais_residencia' :
			$pais_residencia = get_post_meta( $post_id, '_contact_pais_residencia_value_key', true );
			echo '<p>'.$pais_residencia.'</p>';
			break;
	}
	
}

/* contact META BOXES */ //agrega el metabox a Gutemberg

function be_contact_add_meta_box() {
	add_meta_box( 'contact_nombre', 'Nombre', 'be_contact_nombre_callback', 'be-contact', 'normal' );
	add_meta_box( 'contact_apellido', 'Apellido', 'be_contact_apellido_callback', 'be-contact', 'normal' );
	add_meta_box( 'contact_profesion', 'Profesion', 'be_contact_profesion_callback', 'be-contact', 'normal' );
	add_meta_box( 'contact_pais_residencia', 'País de Residencia', 'be_contact_pais_residencia_callback', 'be-contact', 'normal' );
	add_meta_box( 'contact_email', 'Email', 'be_contact_email_callback', 'be-contact', 'normal' );
	add_meta_box( 'contact_perfil_linkedin', 'Linkedin', 'be_contact_perfil_linkedin_callback', 'be-contact', 'normal' );
}


function be_contact_email_callback( $post ) {
	wp_nonce_field( 'be_save_contact_email_data', 'be_contact_email_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_contact_email_value_key', true );
	
	echo '<label for="be_contact_email_field">Email de Usuario: </label>';
	echo '<input type="email" id="be_contact_email_field" name="be_contact_email_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_contact_email_data( $post_id ) {
	
	if( ! isset( $_POST['be_contact_email_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_contact_email_meta_box_nonce'], 'be_save_contact_email_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_contact_email_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_contact_email_field'] );
	
	update_post_meta( $post_id, '_contact_email_value_key', $my_data );
	
}

function be_contact_nombre_callback( $post ) {
	wp_nonce_field( 'be_save_contact_nombre_data', 'be_contact_nombre_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_contact_nombre_value_key', true );
	
	echo '<label for="be_contact_nombre_field">Nombre de Usuario: </label>';
	echo '<input type="text" id="be_contact_nombre_field" name="be_contact_nombre_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_contact_nombre_data( $post_id ) {
	
	if( ! isset( $_POST['be_contact_nombre_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_contact_nombre_meta_box_nonce'], 'be_save_contact_nombre_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_contact_nombre_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_contact_nombre_field'] );
	
	update_post_meta( $post_id, '_contact_nombre_value_key', $my_data );
	
}

function be_contact_apellido_callback( $post ) {
	wp_nonce_field( 'be_save_contact_apellido_data', 'be_contact_apellido_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_contact_apellido_value_key', true );
	
	echo '<label for="be_contact_apellido_field">Apellido de Usuario: </label>';
	echo '<input type="text" id="be_contact_apellido_field" name="be_contact_apellido_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_contact_apellido_data( $post_id ) {
	
	if( ! isset( $_POST['be_contact_apellido_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_contact_apellido_meta_box_nonce'], 'be_save_contact_apellido_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_contact_apellido_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_contact_apellido_field'] );
	
	update_post_meta( $post_id, '_contact_apellido_value_key', $my_data );
	
}

function be_contact_pais_residencia_callback( $post ) {
	wp_nonce_field( 'be_save_contact_pais_residencia_data', 'be_contact_pais_residencia_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_contact_pais_residencia_value_key', true );
	
	echo '<label for="be_contact_pais_residencia_field">Pais de Residencia: </label>';
	echo '<input type="text" id="be_contact_pais_residencia_field" name="be_contact_pais_residencia_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_contact_pais_residencia_data( $post_id ) {
	
	if( ! isset( $_POST['be_contact_pais_residencia_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_contact_pais_residencia_meta_box_nonce'], 'be_save_contact_pais_residencia_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_contact_pais_residencia_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_contact_pais_residencia_field'] );
	
	update_post_meta( $post_id, '_contact_pais_residencia_value_key', $my_data );
	
}

function be_contact_profesion_callback( $post ) {
	wp_nonce_field( 'be_save_contact_profesion_data', 'be_contact_profesion_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_contact_profesion_value_key', true );
	
	echo '<label for="be_contact_profesion_field">Profesion: </label>';
	echo '<input type="text" id="be_contact_profesion_field" name="be_contact_profesion_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_contact_profesion_data( $post_id ) {
	
	if( ! isset( $_POST['be_contact_profesion_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_contact_profesion_meta_box_nonce'], 'be_save_contact_profesion_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_contact_profesion_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_contact_profesion_field'] );
	
	update_post_meta( $post_id, '_contact_profesion_value_key', $my_data );
	
}

function be_contact_perfil_linkedin_callback( $post ) {
	wp_nonce_field( 'be_save_contact_perfil_linkedin_data', 'be_contact_perfil_linkedin_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_contact_perfil_linkedin_value_key', true );
	
	echo '<label for="be_contact_perfil_linkedin_field">Perfil Linkedin: </label>';
	echo '<input type="text" id="be_contact_perfil_linkedin_field" name="be_contact_perfil_linkedin_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_contact_perfil_linkedin_data( $post_id ) {
	
	if( ! isset( $_POST['be_contact_perfil_linkedin_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_contact_perfil_linkedin_meta_box_nonce'], 'be_save_contact_perfil_linkedin_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_contact_perfil_linkedin_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_contact_perfil_linkedin_field'] );
	
	update_post_meta( $post_id, '_contact_perfil_linkedin_value_key', $my_data );
	
}




































/*
======================================= 
FORMULARIO DE FREELANCE
======================================= 
*/

$freelance = get_option( 'activate_freelance' );
if( $freelance ){
    add_action( 'init', 'be_freelance_custom_post_type' );
    add_filter( 'manage_be-freelance_posts_columns', 'be_set_freelance_columns' );
	add_action( 'manage_be-freelance_posts_custom_column', 'be_freelance_custom_column', 10, 2 );
	
	add_action( 'add_meta_boxes', 'be_freelance_add_meta_box' );
	add_action( 'save_post', 'be_save_freelance_email_data' );
}


// Agrega campos en el administrador de Wordpress

function be_set_freelance_columns( $columns ){
	$newColumns = array();
	$newColumns['nombre'] = 'Nombre';
	$newColumns['apellido'] = 'Apellido';
	$newColumns['pais_residencia'] = 'País de Residencia';
	$newColumns['email'] = 'Email';
	$newColumns['date'] = 'Date';
	return $newColumns;
}

function be_freelance_custom_column( $column, $post_id ){

	switch( $column ){

		case 'nombre' :
			$nombre = get_post_meta( $post_id, '_freelance_nombre_value_key', true );
			echo '<p>'.$nombre.'</p>';
			break;				

		case 'apellido' :
			$apellido = get_post_meta( $post_id, '_freelance_apellido_value_key', true );
			echo '<p>'.$apellido.'</p>';
			break;	
			
		case 'email' :
			$email = get_post_meta( $post_id, '_freelance_email_value_key', true );
			echo '<a href="mailto:'.$email.'">'.$email.'</a>';
			break;

		case 'pais_residencia' :
			$pais_residencia = get_post_meta( $post_id, '_freelance_pais_residencia_value_key', true );
			echo '<p>'.$pais_residencia.'</p>';
			break;
	}
	
}

/* FREELANCE META BOXES */ //agrega el metabox a Gutemberg

function be_freelance_add_meta_box() {
	add_meta_box( 'freelance_nombre', 'Nombre', 'be_freelance_nombre_callback', 'be-freelance', 'normal' );
	add_meta_box( 'freelance_apellido', 'Apellido', 'be_freelance_apellido_callback', 'be-freelance', 'normal' );
	add_meta_box( 'freelance_profesion', 'Profesion', 'be_freelance_profesion_callback', 'be-freelance', 'normal' );
	add_meta_box( 'freelance_pais_residencia', 'País de Residencia', 'be_freelance_pais_residencia_callback', 'be-freelance', 'normal' );
	add_meta_box( 'freelance_email', 'Email', 'be_freelance_email_callback', 'be-freelance', 'normal' );
	add_meta_box( 'freelance_perfil_linkedin', 'Linkedin', 'be_freelance_perfil_linkedin_callback', 'be-freelance', 'normal' );
	add_meta_box( 'freelance_perfil_facebook', 'Facebook', 'be_freelance_perfil_facebook_callback', 'be-freelance', 'normal' );
	add_meta_box( 'freelance_perfil_experiencia1', 'Experiencia Uno', 'be_freelance_experiencia1_callback', 'be-freelance', 'normal' );
	add_meta_box( 'freelance_perfil_experiencia2', 'Experiencia Dos', 'be_freelance_experiencia2_callback', 'be-freelance', 'normal' );
	add_meta_box( 'freelance_perfil_experiencia3', 'Experiencia Tres', 'be_freelance_experiencia3_callback', 'be-freelance', 'normal' );
}

function be_freelance_email_callback( $post ) {
	wp_nonce_field( 'be_save_freelance_email_data', 'be_freelance_email_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_freelance_email_value_key', true );
	
	echo '<label for="be_freelance_email_field">Email de Usuario: </label>';
	echo '<input type="email" id="be_freelance_email_field" name="be_freelance_email_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_freelance_email_data( $post_id ) {
	
	if( ! isset( $_POST['be_freelance_email_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_freelance_email_meta_box_nonce'], 'be_save_freelance_email_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_freelance_email_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_freelance_email_field'] );
	
	update_post_meta( $post_id, '_freelance_email_value_key', $my_data );
	
}

function be_freelance_nombre_callback( $post ) {
	wp_nonce_field( 'be_save_freelance_nombre_data', 'be_freelance_nombre_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_freelance_nombre_value_key', true );
	
	echo '<label for="be_freelance_nombre_field">Nombre de Usuario: </label>';
	echo '<input type="text" id="be_freelance_nombre_field" name="be_freelance_nombre_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_freelance_nombre_data( $post_id ) {
	
	if( ! isset( $_POST['be_freelance_nombre_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_freelance_nombre_meta_box_nonce'], 'be_save_freelance_nombre_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_freelance_nombre_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_freelance_nombre_field'] );
	
	update_post_meta( $post_id, '_freelance_nombre_value_key', $my_data );
	
}

function be_freelance_apellido_callback( $post ) {
	wp_nonce_field( 'be_save_freelance_apellido_data', 'be_freelance_apellido_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_freelance_apellido_value_key', true );
	
	echo '<label for="be_freelance_apellido_field">Apellido de Usuario: </label>';
	echo '<input type="text" id="be_freelance_apellido_field" name="be_freelance_apellido_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_freelance_apellido_data( $post_id ) {
	
	if( ! isset( $_POST['be_freelance_apellido_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_freelance_apellido_meta_box_nonce'], 'be_save_freelance_apellido_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_freelance_apellido_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_freelance_apellido_field'] );
	
	update_post_meta( $post_id, '_freelance_apellido_value_key', $my_data );
	
}

function be_freelance_pais_residencia_callback( $post ) {
	wp_nonce_field( 'be_save_freelance_pais_residencia_data', 'be_freelance_pais_residencia_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_freelance_pais_residencia_value_key', true );
	
	echo '<label for="be_freelance_pais_residencia_field">Pais de Residencia: </label>';
	echo '<input type="text" id="be_freelance_pais_residencia_field" name="be_freelance_pais_residencia_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_freelance_pais_residencia_data( $post_id ) {
	
	if( ! isset( $_POST['be_freelance_pais_residencia_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_freelance_pais_residencia_meta_box_nonce'], 'be_save_freelance_pais_residencia_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_freelance_pais_residencia_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_freelance_pais_residencia_field'] );
	
	update_post_meta( $post_id, '_freelance_pais_residencia_value_key', $my_data );
	
}

function be_freelance_profesion_callback( $post ) {
	wp_nonce_field( 'be_save_freelance_profesion_data', 'be_freelance_profesion_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_freelance_profesion_value_key', true );
	
	echo '<label for="be_freelance_profesion_field">Profesion: </label>';
	echo '<input type="text" id="be_freelance_profesion_field" name="be_freelance_profesion_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_freelance_profesion_data( $post_id ) {
	
	if( ! isset( $_POST['be_freelance_profesion_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_freelance_profesion_meta_box_nonce'], 'be_save_freelance_profesion_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_freelance_profesion_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_freelance_profesion_field'] );
	
	update_post_meta( $post_id, '_freelance_profesion_value_key', $my_data );
	
}

function be_freelance_perfil_linkedin_callback( $post ) {
	wp_nonce_field( 'be_save_freelance_perfil_linkedin_data', 'be_freelance_perfil_linkedin_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_freelance_perfil_linkedin_value_key', true );
	
	echo '<label for="be_freelance_perfil_linkedin_field">Perfil Linkedin: </label>';
	echo '<input type="text" id="be_freelance_perfil_linkedin_field" name="be_freelance_perfil_linkedin_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_freelance_perfil_linkedin_data( $post_id ) {
	
	if( ! isset( $_POST['be_freelance_perfil_linkedin_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_freelance_perfil_linkedin_meta_box_nonce'], 'be_save_freelance_perfil_linkedin_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_freelance_perfil_linkedin_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_freelance_perfil_linkedin_field'] );
	
	update_post_meta( $post_id, '_freelance_perfil_linkedin_value_key', $my_data );
	
}

function be_freelance_perfil_facebook_callback( $post ) {
	wp_nonce_field( 'be_save_freelance_perfil_facebook_data', 'be_freelance_perfil_facebook_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_freelance_perfil_facebook_value_key', true );
	
	echo '<label for="be_freelance_perfil_facebook_field">Perfil Linkedin: </label>';
	echo '<input type="text" id="be_freelance_perfil_facebook_field" name="be_freelance_perfil_facebook_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_freelance_perfil_facebook_data( $post_id ) {
	
	if( ! isset( $_POST['be_freelance_perfil_facebook_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_freelance_perfil_facebook_meta_box_nonce'], 'be_save_freelance_perfil_facebook_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_freelance_perfil_facebook_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_freelance_perfil_facebook_field'] );
	
	update_post_meta( $post_id, '_freelance_perfil_facebook_value_key', $my_data );
	
}


function be_freelance_experiencia1_callback( $post ) {
	wp_nonce_field( 'be_save_freelance_experiencia1_data', 'be_freelance_experiencia1_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_freelance_experiencia1_value_key', true );
	
	echo '<label for="be_freelance_experiencia1_field">Experiencia Uno: </label>';
	echo '<input type="text" id="be_freelance_experiencia1_field" name="be_freelance_experiencia1_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_freelance_experiencia1_data( $post_id ) {
	
	if( ! isset( $_POST['be_freelance_experiencia1_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_freelance_experiencia1_meta_box_nonce'], 'be_save_freelance_experiencia1_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_freelance_experiencia1_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_freelance_experiencia1_field'] );
	
	update_post_meta( $post_id, '_freelance_experiencia1_value_key', $my_data );
	
}

function be_freelance_experiencia2_callback( $post ) {
	wp_nonce_field( 'be_save_freelance_experiencia2_data', 'be_freelance_experiencia2_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_freelance_experiencia2_value_key', true );
	
	echo '<label for="be_freelance_experiencia2_field">Experiencia Dos: </label>';
	echo '<input type="text" id="be_freelance_experiencia2_field" name="be_freelance_experiencia2_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_freelance_experiencia2_data( $post_id ) {
	
	if( ! isset( $_POST['be_freelance_experiencia2_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_freelance_experiencia2_meta_box_nonce'], 'be_save_freelance_experiencia2_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_freelance_experiencia2_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_freelance_experiencia2_field'] );
	
	update_post_meta( $post_id, '_freelance_experiencia2_value_key', $my_data );
	
}

function be_freelance_experiencia3_callback( $post ) {
	wp_nonce_field( 'be_save_freelance_experiencia3_data', 'be_freelance_experiencia3_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_freelance_experiencia3_value_key', true );
	
	echo '<label for="be_freelance_experiencia3_field">Experiencia Tres: </label>';
	echo '<input type="text" id="be_freelance_experiencia3_field" name="be_freelance_experiencia3_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_freelance_experiencia3_data( $post_id ) {
	
	if( ! isset( $_POST['be_freelance_experiencia3_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_freelance_experiencia3_meta_box_nonce'], 'be_save_freelance_experiencia3_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_freelance_experiencia3_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_freelance_experiencia3_field'] );
	
	update_post_meta( $post_id, '_freelance_experiencia3_value_key', $my_data );
	
}

/*
======================================= 
Newsletter Form
======================================= 
*/
$newsletter = get_option( 'activate_newsletter' );
if( $newsletter ){
    add_action( 'init', 'be_newsletter_custom_post_type' );
    add_filter( 'manage_be-newsletter_posts_columns', 'be_set_newsletter_columns' );
	add_action( 'manage_be-newsletter_posts_custom_column', 'be_newsletter_custom_column', 10, 2 );
	
	add_action( 'add_meta_boxes', 'be_newsletter_add_meta_box' );
	add_action( 'save_post', 'be_save_newsletter_email_data' );
}

// Agrega campos en el administrador de Wordpress

function be_set_newsletter_columns( $columns ){
	$newColumns = array();
	$newColumns['email'] = 'Email';
	$newColumns['date'] = 'Date';
	return $newColumns;
}

function be_newsletter_custom_column( $column, $post_id ){

	switch( $column ){
			
		case 'email' :
			$email = get_post_meta( $post_id, '_newsletter_email_value_key', true );
			echo '<a href="mailto:'.$email.'">'.$email.'</a>';
			break;
	}
	
}

/* NEWSLETTER META BOXES */

function be_newsletter_add_meta_box() {
	add_meta_box( 'newsletter_email', 'User Email', 'be_newsletter_email_callback', 'be-newsletter', 'side' );
}

function be_newsletter_email_callback( $post ) {
	wp_nonce_field( 'be_save_newsletter_email_data', 'be_newsletter_email_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_newsletter_email_value_key', true );
	
	echo '<label for="be_newsletter_email_field">Email de Usuario: </lable>';
	echo '<input type="email" id="be_newsletter_email_field" name="be_newsletter_email_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function be_save_newsletter_email_data( $post_id ) {
	
	if( ! isset( $_POST['be_newsletter_email_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['be_newsletter_email_meta_box_nonce'], 'be_save_newsletter_email_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['be_newsletter_email_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['be_newsletter_email_field'] );
	
	update_post_meta( $post_id, '_newsletter_email_value_key', $my_data );
	
}

/*
======================================= 
PAGINATION
======================================= 
*/

function blastingexperts_paging_nav() {

	if( is_singular() )
		return;	
	global $wp_query;
	
	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;
	
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );
	
	/** Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;
	
	/** Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}
	
	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}
	
	echo '<nav><ul class="pagination justify-content-center">' . "\n";
	
	/** Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="page-item"><a class="page-link" href="%s" aria-label="Previous"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>' . "\n", get_previous_posts_page_link() );
	
	/** Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';	
		printf( '<li%s class="page-item"><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );	
		if ( ! in_array( 2, $links ) )
			echo '<li class="page-item">…</li>';
	}	
	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s class="page-item"><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}	
	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li class="page-item">…</li>' . "\n";	
		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s class="page-item"><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}
	
	/** Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li class="page-item"><a class="page-link" href="%s" aria-label="Next"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>' . "\n", get_next_posts_page_link() );	
	echo '</ul></nav>' . "\n";
	}

	/**  Custom pagination function - Proyectos */
	
    function cq_pagination($pages = '', $range = 4)
    {
        $showitems = ($range * 2)+1;
        global $paged;
        if(empty($paged)) $paged = 1;
        if($pages == '')
        {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if(!$pages)
            {
                $pages = 1;
            }
        }
        if(1 != $pages)
        {
            // echo "<nav aria-label='Page navigation example'>  <ul class='pagination justify-content-center'><span>Page ".$paged." of ".$pages."</span></li>";
            echo "<nav aria-label='Page navigation example'>  <ul class='pagination justify-content-center'></li>";
			 /** Previous Post Link */
			if ( get_previous_posts_link() )
			printf( '<li class="page-item"><a class="page-link" href="%s" aria-label="Previous"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>' . "\n", get_previous_posts_page_link() );

			/** Link to current page, plus 2 pages in either direction if necessary */
            if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
            if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
            for ($i=1; $i <= $pages; $i++)
            {
                if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                {
                    echo ($paged == $i)? "<li class=\"page-item active\"><a class='page-link'>".$i."</a></li>":"<li class='page-item'> <a href='".get_pagenum_link($i)."' class=\"page-link\">".$i."</a></li>";
                }
            }
            if ($paged < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href=\"".get_pagenum_link($paged + 1)."\">i class='flaticon flaticon-back'></i></a></li>";
            if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href='".get_pagenum_link($pages)."'><i class='flaticon flaticon-arrow'></i></a></li>";

			/** Next Post Link */
			if ( get_next_posts_link(null, $pages) )
			printf( '<li class="page-item"><a class="page-link" href="%s" aria-label="Next"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>' . "\n", get_next_posts_page_link(null, $pages) );
			
            echo "</ul></nav>\n";
        }
  	}


/*
======================================= 
 MEGAMENU CUSTOM FIELDS SECTION
======================================= 
*/


// Create fields 
function fields_list() {
	return array(
		'be-megamenu' => 'Activar Megamenu',
		'be-column-divider' => 'Divisor Columna',
		'be-divider' => 'Divisor Fila',
		'be-featured-image' => 'Featured Image',
		'be-description' => 'Descripción',

	);
}
 
// Setup fields
function megamenu_fields( $id, $item, $depth, $args ){

	$fields = fields_list();	

	foreach ( $fields as $_key => $label ) :

		$key = sprintf( 'menu-item-%s', $_key );
		$id = sprintf( 'edit-%s-%s', $key, $item->ID );
		$name = sprintf( '%s[%s]', $key, $item->ID );
		$value = get_post_meta( $item->ID, $key, true );
		$class = sprintf( 'field-%s', $_key );

		?>

		<p class="description description-wide <?php echo esc_attr( $class ) ?>">
			<label for="<?php echo esc_attr( $id ) ?>"><input type="checkbox" id="<?php echo esc_attr( $id ) ?>" name="<?php echo esc_attr( $name ) ?>" value="1" <?php echo ( $value == 1 ) ? 'checked="checked"' : ''; ?>><?php echo esc_attr( $label ) ?></label>			
		</p>

		<?php 
		

	endforeach;

}
add_action( 'wp_nav_menu_item_custom_fields', 'megamenu_fields', 10, 4);

// Show Columns
function megamenu_columns( $columns ) {

	$fields = fields_list();

	$columns = array_merge( $columns, $fields );

	return $columns;
}

add_filter( 'manage_nav-menus_columns', 'megamenu_columns', 99);


// Save/Update fields
function megamenu_save( $menu_id, $menu_item_db_id, $menu_item_args ) {

	if( defined( 'DOING_AJAX' ) && DOING_AJAX  ) {
		return;
	}

	check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );

	$fields = fields_list();

	foreach( $fields as $_key => $label ) {

		$key = sprintf( 'menu-item-%s', $_key );

		//Sanitaze
		if( !empty( $_POST[ $key ][ $menu_item_db_id ] ) ) {

			$value = $_POST[ $key ][ $menu_item_db_id ];

		} else {

			$value = null;

		}

		// Save or Update
		if( !is_null( $value ) ){

			update_post_meta( $menu_item_db_id, $key, $value );

		} else {

			delete_post_meta( $menu_item_db_id, $key );
		}

	}

}

add_action( 'wp_update_nav_menu_item', 'megamenu_save', 10, 3 );


// Update the Walker Nav Class
function megamenu_walkernav( $walker ) {

	$walker = 'Megamenu_Walker_Edit';
	if ( ! class_exists( $walker ) ) {

		// require_once dirname( __FILE__ ) . '/inc/walkernav-menu-edit.php';
		require get_template_directory() . '/inc/walkernav-menu-edit.php';
	}
	return $walker;

}

add_filter( 'wp_edit_nav_menu_walker', 'megamenu_walkernav', 99 );


/*
======================================= 
RELATED PRODUCTS
1. Primer ciclo: Listamos cuatro posts con el mismo term de la taxonomia del post actual. 
2. Segundo ciclo: Si no se completan cuatro post con el primer ciclo, listamos posts con los terms de todas las taxonomias del post type del post actual.
3. Tercer ciclo: Si aun no se completan cuatro posts, listamos posts con terms del post type 'begranalladoras',
======================================= 
*/

function be_get_related_posts( $post_id, $related_count, $args = array() ) {
	global $post;
	$orig_post = $post;

	//Lista el Post Type del post actual
	$post_type = $post->post_type;	

	//Lista todas las taxonomias del post type del post actual
	$post_type_taxonomies = get_object_taxonomies( $post_type, 'objects' );	
	$i = 0;
	
    foreach ( $post_type_taxonomies as $taxonomy_slug => $taxonomy ){

		// Lista todas las taxonomias del post actual
        $post_taxonomies = get_the_terms( $post->ID, $taxonomy_slug );

		/*----------- PRIMER CICLO -----------*/
		
        if ( ! empty( $post_taxonomies ) ) {	
			
			foreach ( $post_taxonomies as $post_taxonomy ) {				
				
				if( $post_taxonomy->taxonomy != 'marca' && $post_taxonomy->taxonomy != 'alquiler' && $taxonomy_slug != 'condicion') {
					
					$related_args = array(
						'post_type' => $post_type,
						'posts_per_page' => $related_count,
						'post_status' => 'publish',
						'post__not_in' => array( $post_id ),
						'orderby' => 'rand',
						'tax_query' => array(
							array(
								'taxonomy' => $taxonomy->name,
								'field' => 'slug',
								'terms' => $post_taxonomy->slug,
							),
							
						),
					);	// related_args
					
					$beportafolio = new WP_Query($related_args);

					if( $i < $related_count ) {
					
						if( $beportafolio->have_posts() ):					
							
							while( $beportafolio->have_posts() ): $beportafolio->the_post();
													
								get_template_part( 'template-parts/content-portafolio' );
								$i++;
							
							endwhile;
							
						endif;	

						$post = $orig_post;
						wp_reset_query();					
						
					} // if($taxonomy->name != 'marca' && $taxonomy->name != 'alquiler') {
					
				} // if( $i < $related_count )

						
				/*----------- SEGUNDO CICLO -----------*/

				if ( $i < $related_count ) {
					// Lista todos los terms de la taxonomia del post actual
					$post_taxonomy_terms = get_terms([
						'taxonomy' => $taxonomy_slug,
						'hide_empty' => false,
					]);			
						
					foreach ( $post_taxonomy_terms as $post_taxonomy_term ) {	
						
						if( $post_taxonomy->taxonomy != 'marca' && $post_taxonomy->taxonomy != 'alquiler' && $post_taxonomy->taxonomy != 'condicion') {							

							$related_args = array(
								'post_type' => $post_type,
								'post_status' => 'publish',
								'posts_per_page' => $related_count,
								'post__not_in' => array( $post_id ),		
								'orderby' => 'rand',
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' => $post_taxonomy->taxonomy,
										'field' => 'slug',
										'terms' => $post_taxonomy_term->slug,
									),				
									array(
										'taxonomy' => $post_taxonomy->taxonomy,
										'field' => 'slug',
										'terms' => $post_taxonomy->slug,
										'operator' => 'NOT IN',
									),									
								),							
							); //related_args					
							
							$beportafolio = new WP_Query($related_args);

							if( $beportafolio->have_posts() ):
								
								while( $beportafolio->have_posts() && $i < $related_count ): $beportafolio->the_post();
			
									get_template_part( 'template-parts/content-portafolio' );
									$i++;												
								
								endwhile;								
								
							endif;
							
							$post = $orig_post;
							wp_reset_query();
							
						} // if( $post_taxonomy->taxonomy != 'marca' && $post_taxonomy->taxonomy != 'alquiler' && $post_taxonomy->taxonomy != 'condicion') {						
							
					} // foreach ( $post_taxonomy_terms as $post_taxonomy_term ) {							
							
				} // if ( $i < $related_count ) {	
		
				/*----------- TERCER CICLO -----------*/

				if ($i < $related_count) {	
					
					if( $post_taxonomy->taxonomy != 'granalladoras' && $post_taxonomy->taxonomy != 'marca' && $post_taxonomy->taxonomy != 'alquiler' && $post_taxonomy->taxonomy != 'condicion') {

						$related_args = array(
							'post_type' => 'begranalladoras',
							'post_status' => 'publish',
							'post__not_in' => array( $post_id ),
							'orderby' => 'rand',
							'tax_query' => array(
								array(
									'taxonomy' => 'granalladoras',
									'field' => 'slug',
									'terms' => $post_taxonomy->slug,
									'operator' => 'EXISTS'
								),										
							),
						);	// related_args	

						$beportafolio = new WP_Query($related_args);
						if( $beportafolio->have_posts() ):	
							
							while( $beportafolio->have_posts() && $i < $related_count ): $beportafolio->the_post();
													
								get_template_part( 'template-parts/content-portafolio' );
								$i++;			
							
							endwhile;
							
						endif;	

						$post = $orig_post;
						wp_reset_query();

					} // if( $post_taxonomy->taxonomy != 'granalladoras' && $post_taxonomy->taxonomy != 'marca' && $post_taxonomy->taxonomy != 'alquiler' && $post_taxonomy->taxonomy != 'condicion') {

				} // if ( $i < $related_count )
							
			} // foreach ( $post_taxonomies as $post_taxonomy ) {		
						
		} // if ( !empty( $post_taxonomies ) ) {						
				
	} // foreach ( $post_type_taxonomies as $taxonomy_slug => $taxonomy ){			

} // function be_get_related_posts( $post_id, $related_count, $args = array() ) {


/*
======================================= 
BOTONES COMPARTIR
======================================= 
*/

//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
        return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
    }
add_filter('language_attributes', 'add_opengraph_doctype');

function insert_fb_in_head() {
    global $post;
    if ( !is_singular()) //if it is not a post or a page
        return;
        echo '<meta property="fb:app_id" content="Your Facebook App ID" />';
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:description" content="Blasting Experts"/>';
    if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
        $default_image="https://blastingexperts.com/wp-content/uploads/be_ampp_can_min.png"; //replace this with a default image on your server or an image in your media library
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
    else{
        // $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
        $thumbnail_src = "https://blastingexperts.com/wp-content/uploads/be_ampp_can_min.png";
        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }
    echo "
";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );
	
function be_share_this(){
	
	$content = "";		
	$content .= '<div class="blastingexperts-shareThis be-image-share"><h4>Comparte en tus redes Sociales</h4>';				
	$title = get_the_title();
	$excerpt = get_the_excerpt();
	$permalink = get_permalink();
	
	$twitterHandler = ( get_option('twitter_handler') ? '&amp;via='.esc_attr( get_option('twitter_handler') ) : '' );
	
	// $twitter = 'https://twitter.com/intent/tweet?text=Hey! Lean esto: ' . $title . '&amp;url=' . $permalink . $twitterHandler .'';
	$twitter = 'https://twitter.com/intent/tweet?text=' . $title . '&amp;url=' . $permalink . $twitterHandler .'' . '&amp;hashtags=blastingexperts';
	// $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
	$facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink . '&p[summary]=' . $excerpt;
	// $facebook = 'http://www.facebook.com/share.php?u=' . $permalink;
	$linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url='. $permalink;
		
	$content .= '<ul>';
	$content .= '<li><a href="' . $twitter . '" target="_blank" rel="nofollow"><span class="be-icons icon-twitter"></span></a></li>';
	$content .= '<li><a href="' . $facebook . '" target="_blank" rel="nofollow"><span class="be-icons icon-facebook2"></span></a></li>';
	$content .= '<li><a href="' .$linkedin . '" target="_blank" rel="nofollow"><span class="be-icons icon-linkedin2"></span></a></li>';
	$content .= '</ul></div><!-- .blastingexperts-share -->';
	
	return $content;	
}

//BOTONES COMPARTIR EN the_content()
// function blastingexperts_share_this( $content ){
	
// 	if( is_single() ){
	
// 		$content .= '<div class="blastingexperts-shareThis"><h4>Compartimos en tus redes Sociales</h4>';
				
// 		$title = get_the_title();
// 		$permalink = get_permalink();
// 		$attachment = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
// 		$attachment_url = $attachment[0];
// 		$getAttachment = blastingexperts_get_attachment();
// 		print_r( $getAttachment );
		
// 		$twitterHandler = ( get_option('twitter_handler') ? '&amp;via='.esc_attr( get_option('twitter_handler') ) : '' );
		
// 		// $twitter = 'https://twitter.com/intent/tweet?text=Hey! Lean esto: ' . $title . '&amp;url=' . $permalink . $twitterHandler .'';
// 		$twitter = 'https://twitter.com/intent/tweet?text=' . $title . '&amp;url=' . $permalink . $twitterHandler .'' . '&amp;hashtags=blastingexperts';
// 		// $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
// 		$facebook = 'http://www.facebook.com/share.php?u=' . $permalink;
// 		$linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url='. $permalink;
// 		// $google = 'https://plus.google.com/share?url=' . $permalink;


			
// 		$content .= '<ul>';
// 		$content .= '<li><a href="' . $twitter . '" target="_blank" rel="nofollow"><span class="be-icons icon-twitter"></span></a></li>';
// 		$content .= '<li><a href="' . $facebook . '" target="_blank" rel="nofollow"><span class="be-icons icon-facebook2"></span></a></li>';
// 		$content .= '<li><a href="' .$linkedin . '" target="_blank" rel="nofollow"><span class="be-icons icon-linkedin2"></span></a></li>';
// 		// $content .= '<li><a href="' . $google . '" target="_blank" rel="nofollow"><span class="be-icons icon-google3"></span></a></li>';
// 		$content .= '</ul></div><!-- .blastingexperts-share -->';
		
// 		return $content;
	
// 	} else {
// 		return $content;
// 	}
	
// }
// add_filter( 'the_content', 'blastingexperts_share_this' );

/*
======================================= 
 Filter the content length.
======================================= 
*/

function no_read_more() {
    return '.';
}

function limit_title( $limit ) {
    return wp_trim_words(get_the_title(), $limit, no_read_more());
}

function limit_content( $limit ) {
    return wp_trim_words(get_the_content(), $limit, no_read_more());
}

function limit_excerpt( $limit ) {
    return wp_trim_words(get_the_excerpt(), $limit, no_read_more());
}


//Filter the excerpt "read more" string
function wpdocs_excerpt_more( $more ) {
    if ( is_admin() ) {
        return $more;
    }
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


 /* Activate Nav Menu Option */
 function be_register_nav_menu() {
	register_nav_menu( 'primary', 'Menu Principal' );
	// register_nav_menu( 'sidebar', 'Menu Principal Sidebar' );
	register_nav_menu( 'footer1', 'Menu Footer Uno' );
	register_nav_menu( 'footer2', 'Menu Footer Dos' );
	register_nav_menu( 'footer3', 'Menu Footer Tres' );
	register_nav_menu( 'footer4', 'Menu Footer Cuatro' );
}
add_action( 'after_setup_theme', 'be_register_nav_menu' );

/*
	========================
		SIDEBAR FUNCTIONS
	========================
*/
function be_sidebar_init() {
	
	register_sidebar( 
		array(
			'name' 			=> esc_html__( 'Blasting Experts Left Sidebar', 'blastingexpertstheme'),
			'id' 			=> 'blastingexperts-sidebar',
			'description' 	=> 'Dynamic Left Sidebar',
			'before_widget' => '<section id="%1$s" class="blastingexperts-widget %2$s">',
			'after_widget' 	=> '</section>',
			// 'before_title' 	=> '<h2 class="blastingexperts-widget-title portafolio-widget">',
			'before_title' 	=> '<h2 class="blastingexperts-widget-title category-widget">',
			'after_title' 	=> '</h2>'
		),
	);

	// 	register_sidebar( 
	// 	array(
	// 		'name' 			=> esc_html__( 'Blasting Experts Right Sidebar Uno', 'blastingexpertstheme'),
	// 		'id' 			=> 'be-rightsidebar-uno',
	// 		'description' 	=> 'Dynamic Right Sidebar Uno',
	// 		'before_widget' => '<section id="%1$s" class="blastingexperts-widget %2$s">',
	// 		'after_widget' 	=> '</section>',
	// 		'before_title' 	=> '<h2 class="blastingexperts-widget-title portafolio-widget">',
	// 		'after_title' 	=> '</h2>'
	// 	),
	// );
}
add_action( 'widgets_init', 'be_sidebar_init' );


/*
	================================
		BLOG LOOP CUSTOM FUNCTIONS
	================================
*/

function blastingexperts_posted_meta(){
	$posted_on = human_time_diff( get_the_time('U') , current_time('timestamp') );	
	$categories = get_the_category();
	$separator = ', ';
	$output = '';
	$i = 1;
	
	if( !empty($categories) ):
		foreach( $categories as $category ):
			if( $i > 1 ): $output .= $separator; endif;
			$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( 'Ver todos los posts en%s', $category->name ) .'">' . esc_html( $category->name ) .'</a>';
			$i++; 
		endforeach;
	endif;
	
	// return '<span class="posted-on">Publicado hace <a href="'. esc_url( get_permalink() ) .'">' . $posted_on . '</a> </span> / <span class="posted-in">' . $output . '</span>';
	return '<span class="posted-on">Publicado hace <span class="font-weight-bold">' . $posted_on . '</span> </span> / <span class="posted-in">' . $output . '</span>';
}



function blastingexperts_posted_meta_dm(){
	$posted_on_d = get_the_time('j', get_the_ID());
	$posted_on_m = get_the_time('M', get_the_ID());

	return '<span class="day">' . $posted_on_d . '</span> <span class="month">' . $posted_on_m . '</span>';
	// return '<span class="posted-on"><a href="'. esc_url( get_permalink() ) .'">' . $posted_on . '</a> </span> / <span class="posted-in">' . $output . '</span>';
}



/*
======================================= 
SHOW POSTED DATE AND FILTER BY CUSTOM TERM TAXONOMIES
======================================= 
*/

function blastingexperts_posted_portafolio_line($postID){

	$post_type = get_post_type($postID);   
	$taxonomies = get_object_taxonomies($post_type);
	$taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names")); 
	$separator = ', ';
	$output = '';
	$i = 1;
	
	foreach( $taxonomies as $taxonomy ):

		$terms_list = wp_get_post_terms( $postID,  $taxonomy );
		$separator = ', ';
		$output = '';
		$i = 1;
		
		if( !empty($terms_list) ):
			foreach( $terms_list as $term ):
				if( $i > 1 ): $output .= $separator; endif;
				$output .= '<a href="' . get_term_link( $term )  . '" alt="' . esc_attr( 'Ver todos los productos en%s', $term->name ) .'">' . esc_html( $term->name ) .'</a>';
				$i++; 
			endforeach;
			
			return '<span class="posted-in">' . $output . '</span>';
		endif;

	endforeach;
	
}

//JUST SHOW POSTED DATE 
function blastingexperts_posted_date(){
	$posted_on = human_time_diff( get_the_time('U') , current_time('timestamp') );	

	return '<span class="posted-on">Publicado hace ' .  $posted_on . '</span>';
	
}

/*
======================================= 
FILTRO POR TAXONOMIA marca
======================================= 
*/

function blastingexperts_posted_portafolio_marca($postID, $term){
	$terms_list = wp_get_post_terms($postID, $term);
	$separator = ', ';
	$output = '';
	$i = 1;
	
	if( !empty($terms_list) ):
		foreach( $terms_list as $term ):
			if( $i > 1 ): $output .= $separator; endif;
			$output .= '<a href="' . get_term_link( $term )  . '" alt="' . esc_attr( 'Ver todos los productos en%s', $term->name ) .'">' . esc_html( $term->name ) .'</a>';
			$i++; 
		endforeach;
		
		return '<span class="posted-in">' . $output . '</span>';
	endif;
}

//FILTRO POR TAXONOMIA marca SIN LINK
function be_posted_portafolio_marca_sin_link($postID, $term){
	$terms_list = wp_get_post_terms($postID, $term);
	$separator = ', ';
	$output = '';
	$i = 1;
	
	if( !empty($terms_list) ):
		foreach( $terms_list as $term ):
			if( $i > 1 ): $output .= $separator; endif;
			$output .= esc_html( $term->name );
			$i++; 
		endforeach;
		
		return '<span class="posted-in">' . $output . '</span>';
	endif;
}

//FILTRO DE CATEGORIAS EVENTOS
function be_filter_eventos_categories() {
	$terms_list =  wp_list_categories(array(
		'hierarchical' 			=> true,
		'hide_empty'			=> true,
		'hide_title_if_empty'	=> true,
		'echo' 					=> false,
		'show_count' 			=> false,
		'orderby' 				=> 'name',
		'post_type'				=> 'post',
		'taxonomy' 				=> 'latinevento',
		'title_li' 				=> '',
		'style'    				=> 'none',
		// 'exclude'  				=> array( 69, 156 ), //Son los id's de las terms promocion_news y fija_news en www.be.blastingexperts.com
		'separator'				=> '<hr />',
	));

	if( !empty($terms_list) ):		
		return '<span class="be-link">' . $terms_list . '</span>';
	endif;

}

//FILTRO DE CATEGORIAS INDUSTRIA
function be_filter_industria_categories() {
	$terms_list =  wp_list_categories(array(
		'hierarchical' 			=> true,
		'hide_empty'			=> true,
		'hide_title_if_empty'	=> true,
		'echo' 					=> false,
		'show_count' 			=> false,
		'orderby' 				=> 'name',
		'post_type'				=> 'post',
		'taxonomy' 				=> 'latinindustrias',
		'title_li' 				=> '',
		'style'    				=> 'none',
		// 'exclude'  				=> array( 69, 156 ), //Son los id's de las terms promocion_news y fija_news en www.be.blastingexperts.com
		'separator'				=> '<hr />',
	));

	if( !empty($terms_list) ):		
		return '<span class="be-link">' . $terms_list . '</span>';
	endif;

}

//FILTRO DE CATEGORIAS NOTICIAS
function be_filter_news_categories() {
	$terms_list =  wp_list_categories(array(
		'hierarchical' 			=> true,
		'hide_empty'			=> true,
		'hide_title_if_empty'	=> true,
		'echo' 					=> false,
		'show_count' 			=> false,
		'orderby' 				=> 'name',
		'post_type'				=> 'post',
		'taxonomy' 				=> 'clasificacion',
		'title_li' 				=> '',
		'style'    				=> 'none',
		'exclude'  				=> array( 62, 156 ), //Son los id's de las terms titular en www.respaldo.latincorrosion.com
		'separator'				=> '<hr />',
	));

	if( !empty($terms_list) ):		
		return '<span class="be-link">' . $terms_list . '</span>';
	endif;

}

//FILTRO DE TAGS NOTICIAS
function be_filter_news_tags() {
	$tags = get_tags(array( 'taxonomy' 	=> 'tagsnoticias' ));
	$html = '<div class="post_tags">';

	foreach ( $tags as $tag ) {
		$tag_link = get_tag_link( $tag->term_id );				
		$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
		$html .= "{$tag->name}</a>";
	}
	
	$html .= '</div>';

	return $html;
}

/*
======================================= 
FOOTER PARA archive-noticias - comments, tag list
======================================= 
*/

function blastingexperts_posted_footer(){
	$comments_num = get_comments_number();
	if( comments_open() ){
		if( $comments_num == 0 ){
			$comments = __('No Comments');
		} elseif ( $comments_num > 1 ){
			$comments= $comments_num . __(' Comments');
		} else {
			$comments = __('1 Comment');
		}
		$comments = '<a class="comments-link" href="' . get_comments_link() . '">'. $comments .' <span class="be-icons icon-bubble2"></span></a>';
	} else {
		$comments = __('Comments are closed');
	}
	
	// return '<div class="post-footer-container"><div class="row"><div class="col-12 col-sm-6">'. get_the_tag_list('<div class="tags-list"><span class="be-icons icon-price-tag"></span>', ' ', '</div>') .'</div><div class="col-xs-12 col-sm-6 text-right">'. $comments .'</div></div></div>';
	return '<div class="post-footer-container"><div class="row"><div class="col-12">'. get_the_tag_list('<div class="tags-list"><span class="be-icons icon-price-tag"></span>', ' ', '</div>') .'</div></div></div>';
}

//FOOTER PARA single-proyecto - tag list (productos)
function blastingexperts_proyectos_footer($postID, $term){	
	$terms_list = wp_get_post_terms($postID, $term);
	$separator = ' ';
	$output = '';
	$i = 1;
	
	if( !empty($terms_list) ):
		foreach( $terms_list as $term ):
			if( $i > 1 ): $output .= $separator; endif;
			$output .= '<a href="' . get_term_link( $term )  . '" alt="' . esc_attr( 'Ver todos los productos en%s', $term->name ) .'">' . esc_html( $term->name ) .'</a>';
			$i++; 
		endforeach;
		
		return '<div class="post-footer-container"><div class="row"><div class="col-12"><div class="tags-list"><span class="be-icons icon-price-tag"></span>' . $output . '</div></div></div></div>';

	endif;
	
}

/*
======================================= 
SHOW NEW POSTED AND FILTRO POR TAXONOMIA NOTICIAS clasificacion
======================================= 
*/

function blastingexperts_noticias_clasificacion($postID, $taxonomy){
	$posted_on = human_time_diff( get_the_time('U') , current_time('timestamp') );		
	$taxonomy_list = wp_get_post_terms($postID, $taxonomy);
	$separator = ', ';
	$output = '';
	$i = 1;
	
	if( !empty($taxonomy_list) ):
		foreach( $taxonomy_list as $taxonomy ):
			if( $i > 1 ): $output .= $separator; endif;
			$output .= '<a href="' . get_term_link( $taxonomy )  . '" alt="' . esc_attr( 'Ver todos los productos en%s', $taxonomy->name ) .'">' . esc_html( $taxonomy->name ) .'</a>';
			$i++; 
		endforeach;
		
		// return '<div class="row"><div class="col-12">' . $output . '</div></div>';
		return '<time class="posted-on">Publicado hace ' . $posted_on . '</time> / <span class="posted-in">' . $output . '</span>';

	endif;
	
}

//FILTRO POR TAXONOMIA PROYECTOS lugar
function blastingexperts_proyectos_lugar($postID, $term){	
	$terms_list = wp_get_post_terms($postID, $term);
	$separator = ', ';
	$output = '';
	$i = 1;
	
	if( !empty($terms_list) ):
		foreach( $terms_list as $term ):
			if( $i > 1 ): $output .= $separator; endif;
			$output .= '<a href="' . get_term_link( $term )  . '" alt="' . esc_attr( 'Ver todos los productos en%s', $term->name ) .'">' . esc_html( $term->name ) .'</a>';
			$i++; 
		endforeach;		

		return $output;		
	endif;
	
}

// lo mismo que la anterior pero el resultado sin html
function be_proyectos_lugar($postID, $term){	
	$terms_list = wp_get_post_terms($postID, $term);
	$separator = ', ';
	$output = '';
	$i = 1;
	
	if( !empty($terms_list) ):
		foreach( $terms_list as $term ):
			if( $i > 1 ): $output .= $separator; endif;
			$output .= '<a href="' . get_term_link( $term )  . '" alt="' . esc_attr( 'Ver todos los productos en%s', $term->name ) .'">' . esc_html( $term->name ) .'</a>';
			$i++; 
		endforeach;
		
		return  $output;

	endif;
	
}

/*
======================================= 
GET VIDEO OR AUDIO FROM CONTENT
======================================= 
*/

function blastingexperts_get_embedded_media( $type = array() ){
	$content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
	$embed = get_media_embedded_in_content( $content, $type );
	if( in_array( 'audio' , $type) ):
		$output = str_replace( '?visual=true', '?visual=false', $embed[0] );		
	else:
		$output = $embed[0];
	endif;
	
	return $output;
}






// function blastingexperts_get_embedded_media( $type = array() ){
// 	$content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
// 	$embed = get_media_embedded_in_content( $content, $type );
// 	$new_content = wp_strip_all_tags( $content );

// $new_content = substr( $new_content, 0, 200 );

// preg_match( '/(<iframe.*?src="(.*?youtube.*?)".*?<\/iframe>)/', $html, $matches );
// if ( $matches ) {
//   $iframe = $matches[1];
//   var_dump( $iframe);
//   $url = $matches[2];
// }
	
// if( in_array( 'audio' , $type) ):
// 		$output = str_replace( '?visual=true', '?visual=false', $embed[0] );		
// 	else:
// 		$output = $embed[0];
// 	endif;
	
// 	return $output;
// }




// function blastingexperts_get_embedded_media( $type = array() ){
// 	$content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
// 	$iframe = get_media_embedded_in_content( $content, $type );
// 	if( in_array( 'audio' , $type) ):
// 		$iframe = str_replace( '?visual=true', '?visual=false', $iframe[0] );		
// 	else:

// // use preg_match to find iframe src
// preg_match('/src="(.+?)"/', $iframe, $matches);
// $src = $matches[1];

// // add extra params to iframe src
// $params = array(
//     'controls'    => 0,
//     'hd'        => 1,
//     'autohide'    => 1
// );

// $new_src = add_query_arg($params, $src);

// $iframe = str_replace($src, $new_src, $iframe);

// // add extra attributes to iframe html
// $attributes = 'frameborder="0" class="lazyload"';
// // use preg_replace to change iframe src to data-src
// $iframe = preg_replace('~<iframe[^>]*\K(?=src)~i','data-',$iframe);
// $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
		

// 	endif;
	
// 	return $iframe;
// }






















/*
======================================= 
GET THE POST THUMBNAIL
======================================= 
*/

// function blastingexperts_get_attachment( $num = 1 ){
// 	$output = '';
// 	if( has_post_thumbnail() && $num == 1 ): 
// 		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );		
// 	else:
// 		$attachments = get_posts( array( 
// 			'post_type' => 'attachment',
// 			'posts_per_page' => $num, 
// 			'post_parent' => get_the_ID()
// 		) );
// 		if( $attachments && $num == 1 ):
// 			foreach ( $attachments as $attachment ):
// 				$output = wp_get_attachment_url( $attachment->ID );
// 			endforeach;
// 		elseif( $attachments && $num > 1 ):
// 			$output = $attachments;
// 		endif;
		
// 		wp_reset_postdata();
		
// 	endif;
	
// 	return $output;
// }


function blastingexperts_get_attachment(){	
	$output = '';
	if (has_post_thumbnail()): 
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );				
	endif;	
	return $output;
}


/*
======================================= 
SLIDES
======================================= 
*/

function blastingexperts_get_bs_slides( $attachments ){
	
	$output = array();
	$count = count($attachments)-1;
	
	for( $i = 0; $i <= $count; $i++ ): 
	
		$active = ( $i == 0 ? ' active' : '' );
		
		$n = ( $i == $count ? 0 : $i+1 );
		$nextImg = wp_get_attachment_thumb_url( $attachments[$n]->ID );
		$p = ( $i == 0 ? $count : $i-1 );
		$prevImg = wp_get_attachment_thumb_url( $attachments[$p]->ID );
		
		$output[$i] = array( 
			'class'		=> $active, 
			'url'		=> wp_get_attachment_url( $attachments[$i]->ID ),
			'next_img'	=> $nextImg,
			'prev_img'	=> $prevImg,
			'caption'	=> $attachments[$i]->post_excerpt
		);
		
	endfor;
	
	return $output;
	
}

function blastingexperts_grab_url() {
	if( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links ) ){
		return false;
	}
	return esc_url_raw( $links[1] );
}

function blastingexperts_grab_current_uri() {
	$http = ( isset( $_SERVER["HTTPS"] ) ? 'https://' : 'http://' );
	$referer = $http . $_SERVER["HTTP_HOST"];
	$archive_url = $referer . $_SERVER["REQUEST_URI"];
	
	return $archive_url;
}

/*
	================================================
		SINGLE POST CUSTOM FUNCTIONS
	================================================
*/
// function blastingexperts_post_navigation(){
	
// 	$nav = '<div class="row">';
	
// 	$prev = get_previous_post_link( '<div class="post-link-nav"><span class="blastingexperts-icon blastingexperts-chevron-left" aria-hidden="true"></span> %link</div>', '%title' );
// 	$nav .= '<div class="col-12 col-sm-6">' . $prev . '</div>';
	
// 	$next = get_next_post_link( '<div class="post-link-nav">%link <span class="blastingexperts-icon blastingexperts-chevron-right" aria-hidden="true"></span></div>', '%title' );
// 	$nav .= '<div class="col-12 col-sm-6 text-right">' . $next . '</div>';
	
// 	$nav .= '</div>';
	
// 	return $nav;
	
// }

// Esta funcion es lo mismo que la anterior pero en lugar del titulo del post dice: anterior, siguiente

function be_post_navigation_without_title(){
	
	$nav = '<div class="row">';
	
	$prev = get_previous_post_link( '<div class="post-link-nav"><span class="blastingexperts-icon blastingexperts-chevron-left" aria-hidden="true"></span> %link</div>', 'Anterior' );
	$nav .= '<div class="col-12 col-sm-6">' . $prev . '</div>';
	
	$next = get_next_post_link( '<div class="post-link-nav">%link <span class="blastingexperts-icon blastingexperts-chevron-right" aria-hidden="true"></span></div>', 'Siguiente' );
	$nav .= '<div class="col-12 col-sm-6 text-right">' . $next . '</div>';
	
	$nav .= '</div>';
	
	return $nav;
	
}

// Muestra los comentarios
// function blastingexperts_get_post_navigation(){
	
// 	if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ):
	
// 		require( get_template_directory() . '/inc/templates/blastingexperts-comment-nav.php' );
	
// 	endif;
	
// }





/*
======================================= 
Remove default Posts type (Entradas y Comentarios)
======================================= 
*/


// Remove side menu
add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit-comments.php' );
}

// Remove +New post in top Admin Menu Bar
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
    $wp_admin_bar->remove_node( 'comments' );

}

// Remove Quick Draft Dashboard Widget
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

// End remove post type


/*
======================================= 
	Catalogo
======================================= 
*/

//Funcion para Un Producto por hoja
function totalPrimaryCatalogo() {
  	$args = array(
		'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
		'posts_per_page'  => 1,
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'catalogo',
				'field' => 'slug',
				'terms' => 'primary-catalogo',
			),
		),
	);

  $beProductosPrimary = new WP_Query($args); 
  $totalPages = $beProductosPrimary->found_posts;

  return $totalPages;
}


function primaryCatalogo() {
$offset = 0;
 $args = array(
		'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'bewaterjetting'],
		'posts_per_page'  => 1,
		'post_status' => 'publish',
		'paged' => get_query_var( 'paged' ),
		'offset'=> $offset,
		'tax_query' => array(
			array(
				'taxonomy' => 'catalogo',
				'field' => 'slug',
				'terms' => 'primary-catalogo',
			),
		),
	);

	$beProductosPrimary = new WP_Query($args); 
	$totalPages = totalPrimaryCatalogo();
	$i = 0;

	if( $beProductosPrimary->have_posts() ):
		while( $i < $totalPages) {    
			$args = array(
			'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
			'posts_per_page'  => 1,
			'post_status' => 'publish',
			'paged' => get_query_var( 'paged' ),
			'offset'=> $offset,
			'tax_query' => array(
				array(
					'taxonomy' => 'catalogo',
					'field' => 'slug',
					'terms' => 'primary-catalogo',
				),
			),
		);
		$beProductosPrimary = new WP_Query($args); 
		$total = totalPrimaryCatalogo();			
		?><div class="page page-inside"><?php 
				while( $beProductosPrimary->have_posts() ): $beProductosPrimary->the_post();                        
					get_template_part( 'template-parts/content-catalogo-primary' );	              
				endwhile; 
				wp_reset_query();  
		?></div><?php 

		$offset+=1;
		$i++;
	}
	endif; 	
}    

//funcion para dos productos por hoja
function totalSecondaryCatalogo() {
  	$args = array(
		'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
		'posts_per_page'  => 2,
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'catalogo',
				'field' => 'slug',
				'terms' => 'secondary-catalogo',
			),
		),
	);

  $beProductosSecondary = new WP_Query($args); 
  $total = $beProductosSecondary->found_posts;
  $totalPages = ceil($total / 2);

  return $totalPages;
}

function secondaryCatalogo() {
 $offset = 0;
 $args = array(
		'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
		'posts_per_page'  => 2,
		'post_status' => 'publish',
		'paged' => get_query_var( 'paged' ),
		'offset'=> $offset,
		'tax_query' => array(
			array(
				'taxonomy' => 'catalogo',
				'field' => 'slug',
				'terms' => 'secondary-catalogo',
			),
		),
	);

	$beProductosSecondary = new WP_Query($args); 
	$totalPages = totalSecondaryCatalogo();
	$i = 0;

	if( $beProductosSecondary->have_posts() ):
		while( $i < $totalPages) {
			$args = array(
				'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
				'posts_per_page'  => 2,
				'post_status' => 'publish',
				'paged' => get_query_var( 'paged' ),
				'offset'=> $offset,
				'tax_query' => array(
					array(
						'taxonomy' => 'catalogo',
						'field' => 'slug',
						'terms' => 'secondary-catalogo',
					),
				),
			);

			$beProductosSecondary = new WP_Query($args); 
			$total = totalSecondaryCatalogo();
				
			?><div class="page page-inside"><?php 
				while( $beProductosSecondary->have_posts() ): $beProductosSecondary->the_post();                        
					get_template_part( 'template-parts/content-catalogo-secondary' );	              
				endwhile; 
				wp_reset_query();  
			?></div><?php 
			$offset+=2;
			$i++;
		}
	endif; 
}  

//funcion para tres productos por hoja
function totalTertiaryCatalogo() {
  	$args = array(
		'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
		'posts_per_page'  => 3,
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'catalogo',
				'field' => 'slug',
				'terms' => 'tertiary-catalogo',
			),
		),
	);

	$beProductosTertiary = new WP_Query($args); 
	$total = $beProductosTertiary->found_posts;
	$totalPages = ceil($total / 3);

	return $totalPages;
}

function tertiaryCatalogo() {
	$offset = 0;
	$args = array(
			'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
			'posts_per_page'  => 3,
			'post_status' => 'publish',
			'paged' => get_query_var( 'paged' ),
			'offset'=> $offset,
			'tax_query' => array(
				array(
					'taxonomy' => 'catalogo',
					'field' => 'slug',
					'terms' => 'tertiary-catalogo',
				),
			),
		);

	$beProductosTertiary = new WP_Query($args); 
	$totalPages = totalTertiaryCatalogo();
	$i = 0;

	if( $beProductosTertiary->have_posts() ):
		while( $i < $totalPages) {
			$args = array(
				'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
				'posts_per_page'  => 3,
				'post_status' => 'publish',
				'paged' => get_query_var( 'paged' ),
				'offset'=> $offset,
				'tax_query' => array(
					array(
						'taxonomy' => 'catalogo',
						'field' => 'slug',
						'terms' => 'tertiary-catalogo',
					),
				),
			);

			$beProductosTertiary = new WP_Query($args); 
			$total = totalTertiaryCatalogo();
			
		?><div class="page page-inside"><?php 
			while( $beProductosTertiary->have_posts() ): $beProductosTertiary->the_post();                        
				get_template_part( 'template-parts/content-catalogo-tertiary' );	              
			endwhile; 
			wp_reset_query();  
		?></div><?php 

		$offset+=3;
		$i++;
	}
	endif; 
}    

//funcion para cuatro productos por hoja
function totalQuaternaryCatalogo() {
  	$args = array(
		'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
		'posts_per_page'  => 4,
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'catalogo',
				'field' => 'slug',
				'terms' => 'quaternary-catalogo',
			),
		),
	);

	$beProductosQuaternary = new WP_Query($args); 
	$total = $beProductosQuaternary->found_posts;
	$totalPages = ceil($total / 4);

	return $totalPages;
}

function quaternaryCatalogo() {
	$offset = 0;
	$args = array(
			'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
			'posts_per_page'  => 4,
			'post_status' => 'publish',
			'paged' => get_query_var( 'paged' ),
			'offset'=> $offset,
			'tax_query' => array(
				array(
					'taxonomy' => 'catalogo',
					'field' => 'slug',
					'terms' => 'quaternary-catalogo',
				),
			),
		);

	$beProductosQuaternary = new WP_Query($args); 
	$totalPages = totalQuaternaryCatalogo();
	$i = 0;

	if( $beProductosQuaternary->have_posts() ):
		while( $i < $totalPages) {
			$args = array(
				'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
				'posts_per_page'  => 4,
				'post_status' => 'publish',
				'paged' => get_query_var( 'paged' ),
				'offset'=> $offset,
				'tax_query' => array(
					array(
						'taxonomy' => 'catalogo',
						'field' => 'slug',
						'terms' => 'quaternary-catalogo',
					),
				),
			);

			$beProductosQuaternary = new WP_Query($args); 
			$total = totalQuaternaryCatalogo();
			
		?><div class="page page-inside"><?php 
			while( $beProductosQuaternary->have_posts() ): $beProductosQuaternary->the_post();                        
				get_template_part( 'template-parts/content-catalogo-quaternary' );	              
			endwhile; 
			wp_reset_query();  
		?></div><?php 

		$offset+=4;
		$i++;
	}
	endif; 
} 

//funcion para cinco productos por hoja
function totalQuinaryCatalogo() {
  	$args = array(
		'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
		'posts_per_page'  => 5,
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'catalogo',
				'field' => 'slug',
				'terms' => 'quinary-catalogo',
			),
		),
	);

	$beProductosQuinary = new WP_Query($args); 
	$total = $beProductosQuinary->found_posts;
	$totalPages = ceil($total / 5);

	return $totalPages;
}

function quinaryCatalogo() {
	$offset = 0;
	$args = array(
			'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
			'posts_per_page'  => 5,
			'post_status' => 'publish',
			'paged' => get_query_var( 'paged' ),
			'offset'=> $offset,
			'tax_query' => array(
				array(
					'taxonomy' => 'catalogo',
					'field' => 'slug',
					'terms' => 'quinary-catalogo',
				),
			),
		);

	$beProductosQuinary = new WP_Query($args); 
	$totalPages = totalQuinaryCatalogo();
	$i = 0;

	if( $beProductosQuinary->have_posts() ):
		while( $i < $totalPages) {
			$args = array(
				'post_type' => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
				'posts_per_page'  => 5,
				'post_status' => 'publish',
				'paged' => get_query_var( 'paged' ),
				'offset'=> $offset,
				'tax_query' => array(
					array(
						'taxonomy' => 'catalogo',
						'field' => 'slug',
						'terms' => 'quinary-catalogo',
					),
				),
			);

			$beProductosQuinary = new WP_Query($args); 
			$total = totalQuinaryCatalogo();
			
		?><div class="page page-inside"><?php 
			while( $beProductosQuinary->have_posts() ): $beProductosQuinary->the_post();                        
				get_template_part( 'template-parts/content-catalogo-quinary' );	              
			endwhile; 
			wp_reset_query();  
		?></div><?php 

		$offset+=5;
		$i++;
	}
	endif; 
} 

function totalCatalogoPages() { 
	$totalPages = totalPrimaryCatalogo() + totalSecondaryCatalogo() + totalTertiaryCatalogo() + totalQuaternaryCatalogo() + totalQuinaryCatalogo();
	print_r($totalPages);
	return $totalPages;	
}

/*
======================================= 
	Initialize global Mobile Detect
======================================= 
*/

function mobileDetectGlobal() {
    global $detect;
    $detect = new Mobile_Detect;
}

add_action('after_setup_theme', 'mobileDetectGlobal');








/*
======================================= 
	DE LATINCORROSION
======================================= 
*/

function latincorrosion_posted_portafolio_marca($postID, $term){
	$terms_list = wp_get_post_terms($postID, $term);
	$separator = ', ';
	$output = '';
	$i = 1;
	
	if( !empty($terms_list) ):
		foreach( $terms_list as $term ):
			if( $i > 1 ): $output .= $separator; endif;
			$output .= '<a href="' . get_term_link( $term )  . '" alt="' . esc_attr( 'Ver todos los productos en%s', $term->name ) .'">' . esc_html( $term->name ) .'</a>';
			$i++; 
		endforeach;
		
		return '<span class="posted-in">' . $output . '</span>';
	endif;
}

function latincorrosion_industrias_titular_category($postID, $term){
	$terms_list = wp_get_post_terms($postID, $term);
	$separator = ', ';
	$output = '';
	$i = 1;
	
	if( !empty($terms_list) ):
		foreach( $terms_list as $term ):
			if( $i > 1 ): $output .= $separator; endif;
			$output .= '<a href="' . get_term_link( $term )  . '" alt="' . esc_attr( 'Ver todos los productos en%s', $term->name ) .'">' . esc_html( $term->name ) .'</a>';
			$i++; 
		endforeach;
		
		// return '<span class="posted-in">' . $output . '</span>';
		return $output;
	endif;
}


/*
===================================================================================
SHOW NEW POSTED ON and POSTED IN AND FILTRO POR TAXONOMIA NOTICIAS clasificacion
=================================================================================== 
*/



function latincorrosion_noticias_clasificacion($postID, $term){
	$posted_on = human_time_diff( get_the_time('U') , current_time('timestamp') );		
	$terms_list = wp_get_post_terms($postID, $term);
	$separator = ', ';
	$output = '';
	$i = 1;	
	if( !empty($terms_list) ):
		foreach( $terms_list as $term ):
			if($term->name != 'Titular') {
				if( $i > 1 ): $output .= $separator; endif;
				$output .= '<a href="' . get_term_link( $term )  . '" alt="' . esc_attr( 'Ver todos los productos en%s', $term->name ) .'">' . esc_html( $term->name ) .'</a>';
			}
			$i++; 
		endforeach;		
		// return '<div class="row"><div class="col-12">' . $output . '</div></div>';
		return '<span class="posted-on">Publicado hace ' . $posted_on . '</span> / <span class="posted-in">' . $output . '</span>';
	endif;	
}

/*
======================================= 
GET THE POST THUMBNAIL
======================================= 
*/

// Imagen Feature Image del post

function latincorrosion_get_attachment( $num = 1 ){
	$output = '';
	if( has_post_thumbnail() && $num == 1 ): 
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );		
	else:
		$attachments = get_posts( array( 
			'post_type' => 'attachment',
			'posts_per_page' => $num, 
			'post_parent' => get_the_ID()
		) );
		if( $attachments && $num == 1 ):
			foreach ( $attachments as $attachment ):
				$output = wp_get_attachment_url( $attachment->ID );
			endforeach;
		elseif( $attachments && $num > 1 ):
			$output = $attachments;
		endif;		
		wp_reset_postdata();		
	endif;	
	return $output;
}


/*
======================================= 
	Post Most Viewed
======================================= 
*/
// function custom_post_views() {
//     add_post_meta(get_the_ID(), 'post_views_count', 0, true);
// }
// add_action('wp_head', 'custom_post_views');

// function increment_post_views() {
//     if (is_single()) {
//         $post_id = get_the_ID();
//         $views = get_post_meta($post_id, 'post_views_count', true);
//         $new_views = $views + 1;
//         update_post_meta($post_id, 'post_views_count', $new_views);
//     }
// }
// add_action('wp_head', 'increment_post_views');


function wpb_track_post_views( $post_id ) {
    if ( ! is_single() ) return;
    if ( empty( $post_id ) ) {
        global $post;
        $post_id = $post->ID;
    }
    $count_key = 'post_views_count';
    $count = get_post_meta( $post_id, $count_key, true );
    if ( $count == '' ) {
        $count = 0;
        delete_post_meta( $post_id, $count_key );
        add_post_meta( $post_id, $count_key, '0' );
    } else {
        $count++;
        update_post_meta( $post_id, $count_key, $count );
    }
}
add_action( 'wp_head', 'wpb_track_post_views');

