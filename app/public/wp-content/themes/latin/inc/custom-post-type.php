<?php

/*
	
@package latincorrosionheme
	
	========================
		Contact Form
	========================
*/

/* CONTACT CPT */
function blastingexperts_contact_custom_post_type() {
    $labels = array(
        	'name' 				=> 'Mensajes',
        	'singular_name' 	=> 'Mensaje',
        	'menu_name'			=> 'Mensajes',
        	'name_admin_bar'	=> 'Mensaje'
        );
        
	$args = array(
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_in_menu'		=> true, //para que no se vea en el menu del administrador porque no se esta usando
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'menu_position'		=> null,
			'menu_icon'			=> 'dashicons-email-alt',
			'supports'			=> array( 'nombre', 'apellido', 'pais_residencia', 'profesion', 'perfil_linkedin', 'editor', 'author' )
		);
		
register_post_type( 'be-contact', $args );
	
}

/*		
	========================
		Freelance Form
	========================
*/


/* FREELANCE CPT */
function be_freelance_custom_post_type() {
    $labels = array(
			"name" 				=> __( "Freelancers", "blastingexpertstheme" ),
			"singular_name" 	=> __( "Freelance", "blastingexpertstheme" ),
			"all_items" 		=> __( "Ver Todos", "blastingexpertstheme" ),
			"add_new" 			=> __( "Agregar Nuevo", "blastingexpertstheme" ),
        );
        
	$args = array(
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_in_menu'		=> true,
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'menu_position'		=> 12,
			'menu_icon'			=> 'dashicons-email-alt',
			'supports'			=> array( 'nombre', 'apellido', 'pais_residencia', 'profesion', 'perfil_linkedin', 'perfil_facebook', 'experiencia1', 'experiencia2', 'experiencia3', 'editor', 'author' )
		);
		
register_post_type( 'be-freelance', $args );
	
}


/*
======================================= 
Newsletter Form
======================================= 
*/


/* NEWSLETTER CPT */
function be_newsletter_custom_post_type() {
    $labels = array(
			"name" 				=> __( "Suscritos al Newsletter", "latincorrosiontheme" ),
			"singular_name" 	=> __( "Suscrito al Newsletter", "latincorrosiontheme" ),
			"all_items" 		=> __( "Ver Todos", "latincorrosiontheme" ),
			"add_new" 			=> __( "Agregar Nuevo", "latincorrosiontheme" ),
        );
        
	$args = array(
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_in_menu'		=> true,
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'menu_position'		=> 11,
			'menu_icon'			=> 'dashicons-email-alt',
			'supports'			=> array( 'author' )
		);
		
register_post_type( 'be-newsletter', $args );
	
}


/*
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
	 Custom Post Types                    
¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬
*/

function be_register_my_cpts() {

	
	/**
	 * Post Type: Portfolio - Granalladoras.
	*/

	// $labels = [
	// 	"name" 				=> __( "Granalladoras", "blastingexpertstheme" ),
	// 	"singular_name" 	=> __( "Granalladora", "blastingexpertstheme" ),
	// 	"all_items" 		=> __( "Ver Todo", "blastingexpertstheme" ),
	// 	"add_new" 			=> __( "Agregar Granalladora", "blastingexpertstheme" ),
	// ];

	// $args = [
	// 	"label" 		  		=> __( "Granalladoras", "blastingexpertstheme" ),
	// 	"labels" 				=> $labels,
	// 	"exclude_from_search" 	=> false,
	// 	'feeds'               	=> true,
	// 	"has_archive" 			=> true,
	// 	"hierarchical" 			=> false,
	// 	"public" 				=> true,
	// 	"publicly_queryable" 	=> true,
	// 	'delete_with_user'		=> false,
	// 	'query_var' 			=> true,
	// 	"rewrite" 				=> true,
	// 	'show_in_rest' 			=> true,
	// 	"show_ui" 				=> true,
	// 	'show_in_nav_menus'		=> true,
	// 	'with_front'          	=> true,
	// 	"menu_position" 		=> null,
	// 	"capability_type" 		=> "post",
	// 	'slug'                	=> 'begranalladoras',
	// 	"menu_icon" 			=> "dashicons-sos", // https://developer.wordpress.org/resource/dashicons/#sos
	// 	"supports" 				=> [ "title", "editor", "custom-fields", "revisions", "author"],
	// 	"taxonomies" 			=> ["granalladoras", "alquiler", "marca", "condicion", 'archivo']
	// ];

	// register_post_type( "begranalladoras", $args );


	/**
	 * Post Type: Portfolio - Hidrolavadoras.
	*/

	// ----------------------------------------------------------------------- DE LATINCORROSION

	/**
	 * Post Type: Eventos
	*/

	$labels = [
		"name" 				=> __( "Eventos", "latincorrosiontheme" ),
		"singular_name" 	=> __( "Evento", "latincorrosiontheme" ),
		"all_items" 		=> __( "Ver Todo", "latincorrosiontheme" ),
		"add_new" 			=> __( "Agregar Nuevo", "latincorrosiontheme" ),
		'not_found' 		=> 'Ningún evento econtrado',
        'not_found_in_trash' => 'Ningún evento encontrado en la papelera',
	];

	$args = [
		"label" 		  		=> __( "Eventos", "latincorrosiontheme" ),
		"labels" 				=> $labels,
		"exclude_from_search" 	=> false,
		'feeds'               	=> true,
		"has_archive" 			=> true,
		"hierarchical" 			=> false,
		"public" 				=> true,
		"publicly_queryable" 	=> true,
		'query_var' 			=> true,
		"rewrite" 				=> true,
		'show_in_rest' 			=> true,
		"show_ui" 				=> true,
		'with_front'          	=> true,
		"menu_position" 		=> 4,
		"capability_type" 		=> "post",
		'slug'                	=> 'evento',
		"menu_icon" 			=> "dashicons-buddicons-community", // https://developer.wordpress.org/resource/dashicons/#buddicons-buddypress-logo
		"supports" 				=> ["title", "editor", "thumbnail", "custom-fields", "revisions", "author", "post-formats"],
		"taxonomies" 			=> ["latineventos"]
	];

	register_post_type( "evento", $args );


/**
	 * Post Type: Formatos. 
	 */

	$labels = [
		"name" 				=> __( "Formatos", "latincorrosiontheme" ),
		"singular_name" 	=> __( "Formato", "latincorrosiontheme" ),
		"all_items" 		=> __( "Todos los Formatos", "latincorrosiontheme" ),
		"add_new" 			=> __( "Agregar Nuevo", "latincorrosiontheme" ),
		'not_found' 		=> 'Ningún formato econtrado',
        'not_found_in_trash' => 'Ningún formato encontrado en la papelera',
	];

	$args = [
		"label" 				=> __( "Formatos", "latincorrosiontheme" ),
		"labels" 				=> $labels,
		"exclude_from_search" 	=> false,
		'feeds'               	=> true,
		"has_archive" 			=> true,
		"hierarchical" 			=> false,
		"public" 				=> true,
		"publicly_queryable" 	=> true,
		'query_var' 			=> true,
		"rewrite" 				=> true,
		'show_in_rest' 			=> true,
		"show_ui" 				=> true,
		'with_front'          	=> true,
		"menu_position" 		=> 5,
		"capability_type" 		=> "post",
		'slug'                	=> 'formato',
		"menu_icon" 			=> "dashicons-welcome-view-site", // https://developer.wordpress.org/resource/dashicons/#welcome-write-blog	b		
		"supports" 				=> ["title", "editor", "thumbnail", "custom-fields", "revisions", "author"],
		"taxonomies" 			=> ["referencia"]
	];

	register_post_type( "formato", $args );


	/**
	 * Post Type: Industrias
	*/

	$labels = [
		"name" 				=> __( "Industrias", "latincorrosiontheme" ),
		"singular_name" 	=> __( "Industrias", "latincorrosiontheme" ),
		"all_items" 		=> __( "Ver Todo", "latincorrosiontheme" ),
		"add_new" 			=> __( "Agregar Nuevo", "latincorrosiontheme" ),
		'not_found' 		=> 'Ninguna industria econtrada',
        'not_found_in_trash' => 'Ninguna industria encontrada en la papelera',
	];

	$args = [
		"label" 		  		=> __( "Industrias", "latincorrosiontheme" ),
		"labels" 				=> $labels,
		"exclude_from_search" 	=> false,
		'feeds'               	=> true,
		"has_archive" 			=> true,
		"hierarchical" 			=> false,
		"public" 				=> true,
		"publicly_queryable" 	=> true,
		'query_var' 			=> true,
		"rewrite" 				=> true,
		'show_in_rest' 			=> true,
		"show_ui" 				=> true,
		'with_front'          	=> true,
		"menu_position" 		=> 6,
		"capability_type" 		=> "post",
		'slug'                	=> 'industria',
		"menu_icon" 			=> "dashicons-hammer", // https://developer.wordpress.org/resource/dashicons/#buddicons-buddypress-logo
		"supports" 				=> ["title", "editor", "thumbnail", "custom-fields", "revisions", "author", "post-formats"],
		"taxonomies" 			=> ["latinindustrias"]
	];

	register_post_type( "industria", $args );


		/**
	 * Post Type: Nosotros
	*/

	$labels = [
		"name" 				=> __( "Nosotros", "latincorrosiontheme" ),
		"singular_name" 	=> __( "Nosotros", "latincorrosiontheme" ),
		"all_items" 		=> __( "Ver Todo", "latincorrosiontheme" ),
		"add_new" 			=> __( "Agregar Nuevo", "latincorrosiontheme" ),
		'not_found' 		=> 'Ningún nosotros econtrado',
        'not_found_in_trash' => 'Ningún nosotros encontrado en la papelera',
	];

	$args = [
		"label" 		  		=> __( "Nosotros", "latincorrosiontheme" ),
		"labels" 				=> $labels,
		"exclude_from_search" 	=> false,
		'feeds'               	=> true,
		"has_archive" 			=> true,
		"hierarchical" 			=> false,
		"public" 				=> true,
		"publicly_queryable" 	=> true,
		'query_var' 			=> true,
		"rewrite" 				=> true,
		'show_in_rest' 			=> true,
		"show_ui" 				=> true,
		'with_front'          	=> true,
		"menu_position" 		=> 7,
		"capability_type" 		=> "post",
		'slug'                	=> 'nosotros',
		"menu_icon" 			=> "dashicons-buddicons-buddypress-logo", // https://developer.wordpress.org/resource/dashicons/#buddicons-buddypress-logo
		"supports" 				=> ["title", "editor", "thumbnail", "custom-fields", "revisions", "author", "post-formats"],
		"taxonomies" 			=> ["latinnosotros"]
	];

	register_post_type( "nosotros", $args );


	/**
	 * Post Type: Noticias.
	*/

	$labels = [
		"name" 				=> __( "Noticias", "blastingexpertstheme" ),
		"singular_name" 	=> __( "Noticia", "blastingexpertstheme" ),
		"all_items" 		=> __( "Todas las Noticias", "blastingexpertstheme" ),
		"add_new" 			=> __( "Agregar Noticia", "blastingexpertstheme" ),
	];

	$args = [
		"label" 		  		=> __( "Noticias", "blastingexpertstheme" ),
		"labels" 				=> $labels,
		"exclude_from_search" 	=> false,
		'feeds'               	=> true,
		"has_archive" 			=> true,
		"hierarchical" 			=> false,
		"public" 				=> true,
		"publicly_queryable" 	=> true,
		'query_var' 			=> true,
		"rewrite" 				=> true,
		'show_in_rest' 			=> true,
		"show_ui" 				=> true,
		'with_front'          	=> true,
		"menu_position" 		=> 8,
		"capability_type" 		=> "post",
		'slug'                	=> 'noticias',
		"menu_icon" 			=> "dashicons-megaphone", // https://developer.wordpress.org/resource/dashicons/#welcome-write-blog	
		"supports" 				=> ["title", "editor", "thumbnail", "custom-fields", "revisions", "author", "post-formats"],
		"taxonomies" 			=> ["clasificacion, tagsnoticias"]
	];

	register_post_type( "noticias", $args );


	/**
	 * Post Type: Proyectos.
	*/

	$labels = [
		"name" 				=> __( "Proyectos", "blastingexpertstheme" ),
		"singular_name" 	=> __( "Proyecto", "blastingexpertstheme" ),
		"all_items" 		=> __( "Ver Todo", "blastingexpertstheme" ),
		"add_new" 			=> __( "Agregar Proyecto", "blastingexpertstheme" ),
	];

	$args = [
		"label" 				=> __( "Proyecto", "blastingexpertstheme" ),
		"labels" 				=> $labels,
		"exclude_from_search" 	=> false,
		'feeds'               	=> true,
		"has_archive" 			=> true,
		"hierarchical" 			=> false,
		"public" 				=> true,
		"publicly_queryable" 	=> true,
		'query_var' 			=> true,
		"rewrite" 				=> true,
		'show_in_rest' 			=> true,
		"show_ui" 				=> true,
		'with_front'          	=> true,
		"menu_position" 		=> 9,
		"capability_type" 		=> "post",
		'slug'                	=> 'proyectos',
		"menu_icon" 			=> "dashicons-hammer", // https://developer.wordpress.org/resource/dashicons/#welcome-write-blog
		"supports" 				=> [ "title", "editor", "custom-fields", "revisions", "author"],
		"taxonomies" 			=> ["lugar", "latinproyecto"]
	];

	register_post_type( "proyecto", $args );

	/**
	 * Post Type: Publicaciones.
	*/

	$labels = [
		"name" 				=> __( "Publicaciones", "latincorrosiontheme" ),
		"singular_name" 	=> __( "Publicación", "latincorrosiontheme" ),
		"all_items" 		=> __( "Todas las publicaciones", "latincorrosiontheme" ),
		"add_new" 			=> __( "Agregar Nuevo", "latincorrosiontheme" ),
		'not_found' 		=> 'Ninguna publicación encontrada',
        'not_found_in_trash' => 'Ninguna publicación encontrada en la papelera',
	];	
	
	$args = [
		"label" 				=> __( "Publicaciones", "latincorrosiontheme" ),
		"labels" 				=> $labels,
		"exclude_from_search" 	=> false,
		'feeds'               	=> true,
		"has_archive" 			=> true,
		"hierarchical" 			=> false,
		"public" 				=> true,
		"publicly_queryable" 	=> true,
		'query_var' 			=> true,
		"rewrite" 				=> true,
		'show_in_rest' 			=> true,
		"show_ui" 				=> true,
		'with_front'          	=> true,
		"menu_position" 		=> 10,
		"capability_type" 		=> "post",
		'slug'                	=> 'publicacion',
		"menu_icon" 			=> "dashicons-welcome-write-blog",	// https://developer.wordpress.org/resource/dashicons/#welcome-write-blog	
		"supports" 				=> [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "author"],
		"taxonomies" 			=> ["documento"]

	];

	register_post_type( "publicacion", $args );

	/**
	 * Post Type: Sponsors
	*/

	$labels = [
		"name" 				=> __( "Sponsors", "latincorrosiontheme" ),
		"singular_name" 	=> __( "Sponsor", "latincorrosiontheme" ),
		"all_items" 		=> __( "Ver Todo", "latincorrosiontheme" ),
		"add_new" 			=> __( "Agregar Nuevo", "latincorrosiontheme" ),
		'not_found' 		=> 'Ningún Sponsor enontrado',
        'not_found_in_trash' => 'Ningún Sponsor encontrado en la papelera',
	];

	$args = [
		"label" 		  		=> __( "Sponsors", "latincorrosiontheme" ),
		"labels" 				=> $labels,
		"exclude_from_search" 	=> false,
		'feeds'               	=> true,
		"has_archive" 			=> true,
		"hierarchical" 			=> false,
		"public" 				=> true,
		"publicly_queryable" 	=> true,
		'query_var' 			=> true,
		"rewrite" 				=> true,
		'show_in_rest' 			=> true,
		"show_ui" 				=> true,
		'with_front'          	=> true,
		"menu_position" 		=> 11,
		"capability_type" 		=> "post",
		'slug'                	=> 'sponsor',
		"menu_icon" 			=> "dashicons-money-alt", // https://developer.wordpress.org/resource/dashicons/#buddicons-buddypress-logo
		"supports" 				=> ["title", "editor", "thumbnail", "custom-fields", "revisions", "author", "post-formats"],
		"taxonomies" 			=> ["latinsponsors"]
	];

	register_post_type( "sponsor", $args );


}

add_action( 'init', 'be_register_my_cpts' );