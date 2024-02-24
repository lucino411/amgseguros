<?php

/*
	
@package latincorrosionheme	
	========================
		ADMIN PAGE
	========================
*/

function blastingexperts_add_admin_page() {
	
	//Generate Blasting Experts Admin Page
    add_menu_page( 'Blasting Experts Theme Options', 'BlastingExperts', 'manage_options', 'blastingexperts', 'blastingexperts_theme_create_page', 'dashicons-admin-customizer', 110 );
    
    	//Generate Blasting Experts Admin Sub Pages
	add_submenu_page( 'blastingexperts', 'Blasting Experts opciones de configuración', 'Sidebar', 'manage_options', 'blastingexperts', 'blastingexperts_theme_create_page' );
	add_submenu_page( 'blastingexperts', 'Blasting Experts Opciones del Tema', 'Theme Options', 'manage_options', 'blastingexperts_theme', 'blastingexperts_theme_support_page' );
	add_submenu_page( 'blastingexperts', 'Blasting Experts Formulario de Contacto', 'Contact Form', 'manage_options', 'blastingexperts_theme_contact', 'blastingexperts_contact_form_page' );
	add_submenu_page( 'blastingexperts', 'Blasting Experts Formulario de Newsletter', 'Newsletter Form', 'manage_options', 'blastingexperts_theme_newsletter', 'blastingexperts_newsletter_form_page' );
	add_submenu_page( 'blastingexperts', 'Blasting Experts Formulario de Freelance', 'Freelance Form', 'manage_options', 'blastingexperts_theme_freelance', 'blastingexperts_freelance_form_page' );

	// add_submenu_page( 'blastingexperts', 'Blasting Experts CSS Options', 'Custom CSS', 'manage_options', 'blastingexperts_css', 'blastingexperts_theme_settings_page');	   
}
add_action( 'admin_menu', 'blastingexperts_add_admin_page' );

//Activate custom settings
add_action( 'admin_init', 'blastingexperts_custom_settings' );

function blastingexperts_custom_settings() {
	//Sidebar Options
	register_setting( 'blastingexperts-settings-group', 'profile_picture' );
	register_setting( 'blastingexperts-settings-group', 'first_name' );
	register_setting( 'blastingexperts-settings-group', 'last_name' );
	register_setting( 'blastingexperts-settings-group', 'user_description' );
	register_setting( 'blastingexperts-settings-group', 'twitter_handler', 'blastingexperts_sanitize_twitter_handler' );
	register_setting( 'blastingexperts-settings-group', 'facebook_handler' );
	register_setting( 'blastingexperts-settings-group', 'gplus_handler' );
	
	add_settings_section( 'blastingexperts-sidebar-options', 'Sidebar Opciones', 'blastingexperts_sidebar_options', 'blastingexperts');
	
	add_settings_field( 'sidebar-profile-picture', 'Foto de Perfil', 'blastingexperts_sidebar_profile', 'blastingexperts', 'blastingexperts-sidebar-options');
	add_settings_field( 'sidebar-name', 'Nombre y Apellido', 'blastingexperts_sidebar_name', 'blastingexperts', 'blastingexperts-sidebar-options');
	add_settings_field( 'sidebar-description', 'Descripción', 'blastingexperts_sidebar_description', 'blastingexperts', 'blastingexperts-sidebar-options');
	add_settings_field( 'sidebar-twitter', 'Twitter', 'blastingexperts_sidebar_twitter', 'blastingexperts', 'blastingexperts-sidebar-options');
	add_settings_field( 'sidebar-facebook', 'Facebook', 'blastingexperts_sidebar_facebook', 'blastingexperts', 'blastingexperts-sidebar-options');
	add_settings_field( 'sidebar-gplus', 'Google', 'blastingexperts_sidebar_gplus', 'blastingexperts', 'blastingexperts-sidebar-options');
	
	//Theme Support Options
	register_setting( 'blastingexperts-theme-support', 'post_formats' );
	register_setting( 'blastingexperts-theme-support', 'custom_header' );
	register_setting( 'blastingexperts-theme-support', 'custom_background' );
	
	add_settings_section( 'blastingexperts-theme-options', 'Opciones del Tema', 'blastingexperts_theme_options', 'blastingexperts_theme' );
	
	add_settings_field( 'post-formats', 'Formatos de Noticias', 'blastingexperts_post_formats', 'blastingexperts_theme', 'blastingexperts-theme-options' );
	add_settings_field( 'custom-header', 'Configurar Encabezado', 'blastingexperts_custom_header', 'blastingexperts_theme', 'blastingexperts-theme-options' );
	add_settings_field( 'custom-background', 'Configurar Fondo de Página', 'blastingexperts_custom_background', 'blastingexperts_theme', 'blastingexperts-theme-options' );
	
	//Contact Form Options
	register_setting( 'blastingexperts-contact-options', 'activate_contact' );
	
	add_settings_section( 'blastingexperts-contact-section', 'Formulario de Contacto', 'blastingexperts_contact_section', 'blastingexperts_theme_contact');

	add_settings_field( 'activate-form', 'Activar Formulario de Contacto', 'blastingexperts_activate_contact', 'blastingexperts_theme_contact', 'blastingexperts-contact-section' );

	//Newsletter Form Options
	register_setting( 'blastingexperts-newsletter-options', 'activate_newsletter' );
	
	add_settings_section( 'blastingexperts-newsletter-section', 'Formulario de Newsletter', 'blastingexperts_newsletter_section', 'blastingexperts_theme_newsletter');

	add_settings_field( 'activate-form', 'Activar Formulario de Newsletter', 'blastingexperts_activate_newsletter', 'blastingexperts_theme_newsletter', 'blastingexperts-newsletter-section' );

	//Freelance Form Options
	register_setting( 'blastingexperts-freelance-options', 'activate_freelance' );
	
	add_settings_section( 'blastingexperts-freelance-section', 'Formulario de Freelance', 'blastingexperts_freelance_section', 'blastingexperts_theme_freelance');

	add_settings_field( 'activate-form', 'Activar Formulario de Freelance', 'blastingexperts_activate_freelance', 'blastingexperts_theme_freelance', 'blastingexperts-freelance-section' );
	
}

function blastingexperts_theme_options() {
	echo 'Active y Desactive una configuración específica del Tema';
}
 
function blastingexperts_contact_section() {
	echo 'Active y Desactive el Formulario de Contacto';
}

function blastingexperts_newsletter_section() {
	echo 'Active y Desactive el Formulario de Newsletter';
}

function blastingexperts_freelance_section() {
	echo 'Active y Desactive el Formulario de Freelance';
}

function blastingexperts_activate_contact() {
	$options = get_option( 'activate_contact' );
	$checked = ( $options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.' /></label>';
}

function blastingexperts_activate_newsletter() {
	$options = get_option( 'activate_newsletter' );
	$checked = ( $options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="activate_newsletter" name="activate_newsletter" value="1" '.$checked.' /></label>';
}

function blastingexperts_activate_freelance() {
	$options = get_option( 'activate_freelance' );
	$checked = ( $options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="activate_freelance" name="activate_freelance" value="1" '.$checked.' /></label>';
}

function blastingexperts_post_formats() {
	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ){
		$checked = (isset($options[$format]) && $options[$format] == 1 ? "checked" : ''); /*-- ----- isset is a php function that determine if a variable is declared and is different than NULL  ----- --*/

		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="$format" '.$checked.' /> '.$format.'</label><br>';
	}

	echo $output;
}

function blastingexperts_custom_header() {
	$options = get_option( 'custom_header' );
	$checked = ($options == 1 ? "checked" : '');
	
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Active la configuración de encabezado</label>';
}

function blastingexperts_custom_background() {
	$options = get_option( 'custom_background' );
	$checked = ($options == 1 ? "checked" : '');
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Active la configuración de Fondo de Escritorio</label>';
}

// Sidebar Options Functions
function blastingexperts_sidebar_options() {
	echo 'Configure su información de Sidebar';
}

function blastingexperts_sidebar_profile() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<input type="button" class="button button-secondary" value="Cargue su Foto de Perfil" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<input type="button" class="button button-secondary" value="Reemplace su foto de Perfil" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Quitar" id="remove-picture">';
	}
	
}
function blastingexperts_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="Nombre" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Apellido" />';
}
function blastingexperts_sidebar_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Descripción" /><p class="description">Escriba un mensaje.</p>';
}
function blastingexperts_sidebar_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter" /><p class="description">Introduzca su cuenta de Twitter sin la @</p>';
}
function blastingexperts_sidebar_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook" />';
}
function blastingexperts_sidebar_gplus() {
	$gplus = esc_attr( get_option( 'gplus_handler' ) );
	echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google" />';
}

//Sanitization settings
function blastingexperts_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

//Template submenu functions
function blastingexperts_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/blastingexperts-admin.php' );
}

function blastingexperts_theme_support_page() {
	require_once( get_template_directory() . '/inc/templates/blastingexperts-theme-support.php' );
}

function blastingexperts_contact_form_page() {
	require_once( get_template_directory() . '/inc/templates/blastingexperts-contact-form.php' );
}

function blastingexperts_newsletter_form_page() {
	require_once( get_template_directory() . '/inc/templates/blastingexperts-newsletter-form.php' );
}

function blastingexperts_freelance_form_page() {
	require_once( get_template_directory() . '/inc/templates/blastingexperts-freelance-form.php' );
}

// function blastingexperts_theme_settings_page() {
	
// 	echo '<h1>Blasting Experts Custom CSS</h1>';
	
// }