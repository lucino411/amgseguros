<?php

/*
	
@package latincorrosionheme
	
	========================
		CUSTOM TAXONOMIES
	========================
*/


// Register Taxonomy
// function be_custom_taxonomies() {

// 	$labels = array(
// 		'name'              => _x( 'Granalladoras', 'taxonomy general name', 'taxonomy-widget' ),
// 		'singular_name'     => _x( 'Granalladora', 'taxonomy singular name', 'taxonomy-widget' ),
// 		'search_items'      => __( 'Search Granalladoras', 'taxonomy-widget' ),
// 		'all_items'         => __( 'All Granalladoras', 'taxonomy-widget' ),
// 		'parent_item'       => __( 'Parent Granalladora', 'taxonomy-widget' ),
// 		'parent_item_colon' => __( 'Parent Granalladora:', 'taxonomy-widget' ),
// 		'edit_item'         => __( 'Edit Granalladora', 'taxonomy-widget' ),
// 		'update_item'       => __( 'Update Granalladora', 'taxonomy-widget' ),
// 		'add_new_item'      => __( 'Add New Granalladora', 'taxonomy-widget' ),
// 		'new_item_name'     => __( 'New Granalladora Name', 'taxonomy-widget' ),
// 		'menu_name'         => __( 'Granalladora', 'taxonomy-widget' ),
// 	);
// 	$args = array(
// 		'labels' => $labels,
// 		'description' => __( 'Tipos de Granalladoras', 'taxonomy-widget' ),
// 		'hierarchical' => true,
// 		'public' => true,
// 		'publicly_queryable' => true,
// 		'show_ui' => true,
// 		'show_in_menu' => true,
// 		'show_in_nav_menus' => true,
// 		'show_tagcloud' => true,
// 		'show_in_quick_edit' => true,
// 		'show_admin_column' => true,
// 		'show_in_rest' => true,
// 	);
// 	register_taxonomy( 'granalladora', array('portafolio'), $args );

// }
// add_action( 'init', 'be_custom_taxonomies' );


function be_custom_taxonomies() {
	
	/******************************** 
	 * No Cloud Taxonomies *
	 ********************************/
	// Register Hierarchichal Taxonomy - Proyectos
	// $labels = array(
	// 	'name'              => 'Lugares Proyectos',
	// 	'singular_name'     => 'Lugar',
	// 	'search_items'      => 'Buscar Lugar',
	// 	'all_items'         => 'Todos los Lugares',		
	// 	'parent_item'       => 'Parent Lugar',
	// 	'parent_item_colon' => 'Parent Lugar:',
	// 	'edit_item'         => 'Editar Lugar',
	// 	'update_item'       => 'Actualizar Lugar',
	// 	'add_new_item'      => 'Agregar Nuevo Lugar',		
	// 	'new_item_name'     => 'Nuevo Nombre de Lugar',
	// 	'menu_name'         => 'Lugares'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'lugar')
	// );
	// register_taxonomy( 'lugar', 'proyecto', $args );


	// Register Hierarchichal Taxonomy - Productos
	// $labels = array(
	// 	'name'              => 'Categorías Abrasivos',
	// 	'singular_name'     => 'Categoría',
	// 	'search_items'      => 'Buscar Categorías',
	// 	'all_items'         => 'Todas las Categoríass',		
	// 	'parent_item'       => 'Parent Categoría',
	// 	'parent_item_colon' => 'Parent Categoría:',
	// 	'edit_item'         => 'Editar Categoría',
	// 	'update_item'       => 'Actualizar Categoría',
	// 	'add_new_item'      => 'Agregar Nueva Categoría',		
	// 	'new_item_name'     => 'Nuevo nombre para Categoría',
	// 	'menu_name'         => 'Categorías'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'abrasivos')
	// );
	// register_taxonomy( 'abrasivos', ['portafolio', 'beabrasivo'], $args );

	// Register Hierarchichal Taxonomy - Productos
	// $labels = array(
	// 	'name'              => 'Categorías BMyA',
	// 	'singular_name'     => 'Categoría',
	// 	'search_items'      => 'Buscar Categorías',
	// 	'all_items'         => 'Todas las Categoríass',		
	// 	'parent_item'       => 'Parent Categoría',
	// 	'parent_item_colon' => 'Parent Categoría:',
	// 	'edit_item'         => 'Editar Categoría',
	// 	'update_item'       => 'Actualizar Categoría',
	// 	'add_new_item'      => 'Agregar Nueva Categoría',		
	// 	'new_item_name'     => 'Nuevo nombre para Categoría',
	// 	'menu_name'         => 'Categorías'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'bmya')
	// );
	// register_taxonomy( 'bmya', ['portafolio', 'bebmya'], $args );

		/*** Register Hierarchichal Taxonomy - Productos ***/
		$labels = array(
			'name'              => 'Categorías Granalladoras',
			'singular_name'     => 'Categoría',
			'search_items'      => 'Buscar Categorías',
			'all_items'         => 'Todas las Categoríass',		
			'parent_item'       => 'Parent Categoría',
			'parent_item_colon' => 'Parent Categoría:',
			'edit_item'         => 'Editar Categoría',
			'update_item'       => 'Actualizar Categoría',
			'add_new_item'      => 'Agregar Nueva Categoría',		
			'new_item_name'     => 'Nuevo nombre para Categoría',
			'menu_name'         => 'Categorías'
		);
		$args = array(
			'labels' 			=> $labels,
			'hierarchical'      => true,
			'public' 			=> true,
			'show_admin_column' => true,
			'show_in_rest' 		=> true,
			'show_tagcloud' 	=> false,
			'show_ui' 			=> true,
			'show_in_menu' 		=> true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var' 		=> true,
			'rewrite' 			=> array('slug' => 'granalladoras')
		);
		register_taxonomy( 'granalladoras', ['portafolio', 'begranalladoras'], $args );

	// Register Hierarchichal Taxonomy - Productos
	// $labels = array(
	// 	'name'              => 'Categorías Hidrolavadoras',
	// 	'singular_name'     => 'Categoría',
	// 	'search_items'      => 'Buscar Categorías',
	// 	'all_items'         => 'Todas las Categoríass',		
	// 	'parent_item'       => 'Parent Categoría',
	// 	'parent_item_colon' => 'Parent Categoría:',
	// 	'edit_item'         => 'Editar Categoría',
	// 	'update_item'       => 'Actualizar Categoría',
	// 	'add_new_item'      => 'Agregar Nueva Categoría',		
	// 	'new_item_name'     => 'Nuevo nombre para Categoría',
	// 	'menu_name'         => 'Categorías'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'hidrolavadoras')
	// );
	// register_taxonomy( 'hidrolavadoras', ['portafolio', 'behidrolavadoras'], $args );


	// Register Hierarchichal Taxonomy - Productos
	// $labels = array(
	// 	'name'              => 'Categorías IMyC',
	// 	'singular_name'     => 'Categoría',
	// 	'search_items'      => 'Buscar Categorías',
	// 	'all_items'         => 'Todas las Categoríass',		
	// 	'parent_item'       => 'Parent Categoría',
	// 	'parent_item_colon' => 'Parent Categoría:',
	// 	'edit_item'         => 'Editar Categoría',
	// 	'update_item'       => 'Actualizar Categoría',
	// 	'add_new_item'      => 'Agregar Nueva Categoría',		
	// 	'new_item_name'     => 'Nuevo nombre para Categoría',
	// 	'menu_name'         => 'Categorías'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'imyc')
	// );
	// register_taxonomy( 'imyc', ['portafolio', 'beimyc'], $args );


	// Register Hierarchichal Taxonomy - Productos
	// $labels = array(
	// 	'name'              => 'Categorías Láser',
	// 	'singular_name'     => 'Categoría',
	// 	'search_items'      => 'Buscar Categorías',
	// 	'all_items'         => 'Todas las Categoríass',		
	// 	'parent_item'       => 'Parent Categoría',
	// 	'parent_item_colon' => 'Parent Categoría:',
	// 	'edit_item'         => 'Editar Categoría',
	// 	'update_item'       => 'Actualizar Categoría',
	// 	'add_new_item'      => 'Agregar Nueva Categoría',		
	// 	'new_item_name'     => 'Nuevo nombre para Categoría',
	// 	'menu_name'         => 'Categorías'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'laser')
	// );
	// register_taxonomy( 'laser', ['portafolio', 'belaser'], $args );


	// Register Hierarchichal Taxonomy - Productos
	// $labels = array(
	// 	'name'              => 'Categorías PPE',
	// 	'singular_name'     => 'Categoría',
	// 	'search_items'      => 'Buscar Categorías',
	// 	'all_items'         => 'Todas las Categoríass',		
	// 	'parent_item'       => 'Parent Categoría',
	// 	'parent_item_colon' => 'Parent Categoría:',
	// 	'edit_item'         => 'Editar Categoría',
	// 	'update_item'       => 'Actualizar Categoría',
	// 	'add_new_item'      => 'Agregar Nueva Categoría',		
	// 	'new_item_name'     => 'Nuevo nombre para Categoría',
	// 	'menu_name'         => 'Categorías'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'ppe')
	// );
	// register_taxonomy( 'ppe', ['portafolio', 'beppe'], $args );


	// Register Hierarchichal Taxonomy - Productos
	// $labels = array(
	// 	'name'              => 'Categorías Sec y Deshum',
	// 	'singular_name'     => 'Categoría',
	// 	'search_items'      => 'Buscar Categorías',
	// 	'all_items'         => 'Todas las Categoríass',		
	// 	'parent_item'       => 'Parent Categoría',
	// 	'parent_item_colon' => 'Parent Categoría:',
	// 	'edit_item'         => 'Editar Categoría',
	// 	'update_item'       => 'Actualizar Categoría',
	// 	'add_new_item'      => 'Agregar Nueva Categoría',		
	// 	'new_item_name'     => 'Nuevo nombre para Categoría',
	// 	'menu_name'         => 'Categorías'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'secydeshum')
	// );
	// register_taxonomy( 'secydeshum', ['portafolio', 'besecydeshum'], $args );

	// Register Hierarchichal Taxonomy - Productos
	// $labels = array(
	// 	'name'              => 'Categorías Shot Peening ',
	// 	'singular_name'     => 'Categoría',
	// 	'search_items'      => 'Buscar Categorías',
	// 	'all_items'         => 'Todas las Categoríass',		
	// 	'parent_item'       => 'Parent Categoría',
	// 	'parent_item_colon' => 'Parent Categoría:',
	// 	'edit_item'         => 'Editar Categoría',
	// 	'update_item'       => 'Actualizar Categoría',
	// 	'add_new_item'      => 'Agregar Nueva Categoría',		
	// 	'new_item_name'     => 'Nuevo nombre para Categoría',
	// 	'menu_name'         => 'Categorías'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'shotpeening')
	// );
	// register_taxonomy( 'shotpeening', ['portafolio', 'beshotpeening'], $args );



	// Register Hierarchichal Taxonomy - Productos
	// $labels = array(
	// 	'name'              => 'Categorías Waterjetting',
	// 	'singular_name'     => 'Categoría',
	// 	'search_items'      => 'Buscar Categorías',
	// 	'all_items'         => 'Todas las Categoríass',		
	// 	'parent_item'       => 'Parent Categoría',
	// 	'parent_item_colon' => 'Parent Categoría:',
	// 	'edit_item'         => 'Editar Categoría',
	// 	'update_item'       => 'Actualizar Categoría',
	// 	'add_new_item'      => 'Agregar Nueva Categoría',		
	// 	'new_item_name'     => 'Nuevo nombre para Categoría',
	// 	'menu_name'         => 'Categorías'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'waterjetting')
	// );
	// register_taxonomy( 'waterjetting', ['portafolio', 'bewaterjetting'], $args );


	/*** End Register Hierarchichal Taxonomy - Productos ***/

	// Register Hierarchichal Taxonomy - Productos
	// $labels = array(
	// 	'name'              => 'Alquiler',
	// 	'singular_name'     => 'Alquiler',
	// 	'search_items'      => 'Buscar Alquiler',
	// 	'all_items'         => 'Todos los Alquileres',		
	// 	'parent_item'       => 'Parent Alquiler',
	// 	'parent_item_colon' => 'Parent Alquiler:',
	// 	'edit_item'         => 'Editar Alquiler',
	// 	'update_item'       => 'Actualizar Alquiler',
	// 	'add_new_item'      => 'Agregar Nuevo Alquiler',		
	// 	'new_item_name'     => 'Nuevo Nombre para Alquiler',
	// 	'menu_name'         => 'Alquiler'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'alquiler')
	// );
	// register_taxonomy( 'alquiler', ['portafolio', 'beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'], $args );

	// Register Hierarchichal Taxonomy - Productos
	// $labels = array(
	// 	'name'              => 'Cátedra',
	// 	'singular_name'     => 'Cátedra',
	// 	'search_items'      => 'Buscar Cátedra',
	// 	'all_items'         => 'Todas las Cátedras',		
	// 	'parent_item'       => 'Parent Cátedra',
	// 	'parent_item_colon' => 'Parent Cátedra:',
	// 	'edit_item'         => 'Editar Cátedra',
	// 	'update_item'       => 'Actualizar Cátedra',
	// 	'add_new_item'      => 'Agregar Nuevo Cátedra',		
	// 	'new_item_name'     => 'Nuevo Nombre para Cátedra',
	// 	'menu_name'         => 'Cátedras'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'catedra')
	// );
	// register_taxonomy( 'catedra', 'universidad', $args );


			// Register Hierarchichal Taxonomy - Noticias
		// $labels = array(
		// 	'name'              => 'Categorías Noticias',
		// 	'singular_name'     => 'Categoría',
		// 	'search_items'      => 'Buscar Categoría',
		// 	'all_items'         => 'Todas las Categorías',		
		// 	'parent_item'       => 'Parent Categoría',
		// 	'parent_item_colon' => 'Parent Categoría:',
		// 	'edit_item'         => 'Editar Categoría',
		// 	'update_item'       => 'Actualizar Categoría',
		// 	'add_new_item'      => 'Agregar Nueva Categoría',		
		// 	'new_item_name'     => 'Nuevo Nombre de Categoría',
		// 	'menu_name'         => 'Categorías'
		// );

		// $args = array(
		// 	'labels' 			=> $labels,
		// 	'hierarchical'      => true,
		// 	'public' 			=> true,
		// 	'show_admin_column' => true,
		// 	'show_in_rest' 		=> true,
		// 	'show_tagcloud' 	=> false,
		// 	'show_ui' 			=> true,
		// 	'query_var' 		=> true,
		// 	'rewrite' 			=> array('slug' => 'clasificacion')
		// );
		// register_taxonomy( 'clasificacion', 'noticias', $args );

		// Register Hierarchichal Taxonomy - Nosotros
		// $labels = array(
		// 	'name'              => 'Categorías Nosotros',
		// 	'singular_name'     => 'Categoría',
		// 	'search_items'      => 'Buscar Categoría',
		// 	'all_items'         => 'Todas las Categorías',		
		// 	'parent_item'       => 'Parent Categoría',
		// 	'parent_item_colon' => 'Parent Categoría:',
		// 	'edit_item'         => 'Editar Categoría',
		// 	'update_item'       => 'Actualizar Categoría',
		// 	'add_new_item'      => 'Agregar Nueva Categoría',		
		// 	'new_item_name'     => 'Nuevo Nombre de Categoría',
		// 	'menu_name'         => 'Categorías'
		// );

		// $args = array(
		// 	'labels' 			=> $labels,
		// 	'hierarchical'      => true,
		// 	'public' 			=> true,
		// 	'show_admin_column' => true,
		// 	'show_in_rest' 		=> true,
		// 	'show_tagcloud' 	=> false,
		// 	'show_ui' 			=> true,
		// 	'query_var' 		=> true,
		// 	'rewrite' 			=> array('slug' => 'benosotros')
		// );
		// register_taxonomy( 'benosotros', 'nosotros', $args );

	// Register Hierarchichal Taxonomy - Publicaciones
	// $labels = array(
	// 	'name'              => 'Documentos',
	// 	'singular_name'     => 'Documento',
	// 	'search_items'      => 'Buscar Documento',
	// 	'all_items'         => 'Todo los Documentos',		
	// 	'parent_item'       => 'Parent Documento',
	// 	'parent_item_colon' => 'Parent Documento:',
	// 	'edit_item'         => 'Editar Documento',
	// 	'update_item'       => 'Actualizar Documento',
	// 	'add_new_item'      => 'Agregar Nuevo Documento',		
	// 	'new_item_name'     => 'Nuevo Nombre de Documento',
	// 	'menu_name'         => 'Tipos de Documento'
	// );

	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'documento')
	// );
	// register_taxonomy( 'documento', 'publicacion', $args );

	// Register HierarchichalTaxonomy - Formatos
	// $labels = array(
	// 	'name'              => 'Referencias',
	// 	'singular_name'     => 'Referencia',
	// 	'search_items'      => 'Buscar Referencia',
	// 	'all_items'         => 'Todas las Referencias',		
	// 	'parent_item'       => 'Parent Referencia',
	// 	'parent_item_colon' => 'Parent Referencia:',
	// 	'edit_item'         => 'Editar Referencia',
	// 	'update_item'       => 'Actualizar Referencia',
	// 	'add_new_item'      => 'Agregar Nueva Referencia',		
	// 	'new_item_name'     => 'Nuevo Nombre de Referencia',
	// 	'menu_name'         => 'Referencias'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'referencia')
	// );
	// register_taxonomy( 'referencia', 'formato', $args );




	// Register Hierarchichal Taxonomy - Productos
	// $labels = array(
	// 	'name'              => 'Condición Productos',
	// 	'singular_name'     => 'Condición',
	// 	'search_items'      => 'Buscar Condición',
	// 	'all_items'         => 'Todas las Condiciones',		
	// 	'parent_item'       => 'Parent Condición',
	// 	'parent_item_colon' => 'Parent Condición:',
	// 	'edit_item'         => 'Editar Condición',
	// 	'update_item'       => 'Actualizar Condición',
	// 	'add_new_item'      => 'Agregar Nueva Condición',		
	// 	'new_item_name'     => 'Nuevo Nombre para Condición',
	// 	'menu_name'         => 'Condición'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'condicion')
	// );
	// register_taxonomy( 'condicion', ['portafolio', 'beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'], $args );

	// Register Hierarchichal Taxonomy - Publicaciones
	// $labels = array(
	// 	'name'              => 'Archivos',
	// 	'singular_name'     => 'Archivo',
	// 	'search_items'      => 'Buscar Archivo',
	// 	'all_items'         => 'Todo los Archivos',		
	// 	'parent_item'       => 'Parent Archivo',
	// 	'parent_item_colon' => 'Parent Archivo:',
	// 	'edit_item'         => 'Editar Archivo',
	// 	'update_item'       => 'Actualizar Archivo',
	// 	'add_new_item'      => 'Agregar Nuevo Archivo',		
	// 	'new_item_name'     => 'Nuevo Nombre de Archivo',
	// 	'menu_name'         => 'Tipo de Archivo'
	// );

	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical'      => true,
	// 	'public' 			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array('slug' => 'archivo')
	// );
	// register_taxonomy( 'archivo', ['portafolio', 'beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'], $args );






//--------------------------------------- DE LATINCORROSION

/******************************** 
	 * No Cloud Taxonomies *
	 ********************************/

	// Register Hierarchichal Taxonomy - Noticias
	$labels = array(
		'name'              => 'Categorías',
		'singular_name'     => 'Categoría',
		'search_items'      => 'Buscar Categoría',
		'all_items'         => 'Todas las Categorías',		
		'parent_item'       => 'Parent Categoría',
		'parent_item_colon' => 'Parent Categoría:',
		'edit_item'         => 'Editar Categoría',
		'update_item'       => 'Actualizar Categoría',
		'add_new_item'      => 'Agregar Nueva Categoría',		
		'new_item_name'     => 'Nuevo Nombre de Categoría',
		'menu_name'         => 'Categorías'
	);

	$args = array(
		'labels' 			=> $labels,
		'hierarchical'      => true,
		'public' 			=> true,
		'show_admin_column' => true,
		'show_in_rest' 		=> true,
		'show_tagcloud' 	=> false,
		'show_ui' 			=> true,
		'query_var' 		=> true,
		'rewrite' 			=> array('slug' => 'clasificacion')
	);
	register_taxonomy( 'clasificacion', 'noticias', $args );

	// Register Hierarchichal Taxonomy - Publicaciones
	$labels = array(
		'name'              => 'Documentos',
		'singular_name'     => 'Documento',
		'search_items'      => 'Buscar Documento',
		'all_items'         => 'Todo los Documentos',		
		'parent_item'       => 'Parent Documento',
		'parent_item_colon' => 'Parent Documento:',
		'edit_item'         => 'Editar Documento',
		'update_item'       => 'Actualizar Documento',
		'add_new_item'      => 'Agregar Nuevo Documento',		
		'new_item_name'     => 'Nuevo Nombre de Documento',
		'menu_name'         => 'Tipos de Documento'
	);

	$args = array(
		'labels' 			=> $labels,
		'hierarchical'      => true,
		'public' 			=> true,
		'show_admin_column' => true,
		'show_in_rest' 		=> true,
		'show_tagcloud' 	=> false,
		'show_ui' 			=> true,
		'query_var' 		=> true,
		'rewrite' 			=> array('slug' => 'documento')
	);
	register_taxonomy( 'documento', 'publicacion', $args );

	// Register Hierarchichal Taxonomy - Eventos
	$labels = array(
		'name'              => 'Categoría Eventos',
		'singular_name'     => 'Categoría',
		'search_items'      => 'Buscar Evento',
		'all_items'         => 'Todos las Eventos',		
		'parent_item'       => 'Parent Evento',
		'parent_item_colon' => 'Parent Evento:',
		'edit_item'         => 'Editar Evento',
		'update_item'       => 'Actualizar Evento',
		'add_new_item'      => 'Agregar Nueva Evento',		
		'new_item_name'     => 'Nuevo Nombre de Evento',
		'menu_name'         => 'Categorías'
	);

	$args = array(
		'labels' 			=> $labels,
		'hierarchical'      => true,
		'public' 			=> true,
		'show_admin_column' => true,
		'show_in_rest' 		=> true,
		'show_tagcloud' 	=> false,
		'show_ui' 			=> true,
		'query_var' 		=> true,
		'rewrite' 			=> array('slug' => 'latinevento')
	);
	register_taxonomy( 'latinevento', 'evento', $args );


	// Register Hierarchichal Taxonomy - Industrias
	$labels = array(
		'name'              => 'Categoría Industrias',
		'singular_name'     => 'Categoría',
		'search_items'      => 'Buscar Industria',
		'all_items'         => 'Todos las Industrias',		
		'parent_item'       => 'Parent Industria',
		'parent_item_colon' => 'Parent Industria:',
		'edit_item'         => 'Editar Industria',
		'update_item'       => 'Actualizar Industria',
		'add_new_item'      => 'Agregar Nueva Industria',		
		'new_item_name'     => 'Nuevo Nombre de Industria',
		'menu_name'         => 'Categorías'
	);

	$args = array(
		'labels' 			=> $labels,
		'hierarchical'      => true,
		'public' 			=> true,
		'show_admin_column' => true,
		'show_in_rest' 		=> true,
		'show_tagcloud' 	=> false,
		'show_ui' 			=> true,
		'query_var' 		=> true,
		'rewrite' 			=> array('slug' => 'latinindustrias')
	);
	register_taxonomy( 'latinindustrias', 'industria', $args );

	// Register Hierarchichal Taxonomy - Nosotros
	$labels = array(
		'name'              => 'Categorías Nosotros',
		'singular_name'     => 'Categoría',
		'search_items'      => 'Buscar Categoría',
		'all_items'         => 'Todas las Categorías',		
		'parent_item'       => 'Parent Categoría',
		'parent_item_colon' => 'Parent Categoría:',
		'edit_item'         => 'Editar Categoría',
		'update_item'       => 'Actualizar Categoría',
		'add_new_item'      => 'Agregar Nueva Categoría',		
		'new_item_name'     => 'Nuevo Nombre de Categoría',
		'menu_name'         => 'Categorías'
	);

	$args = array(
		'labels' 			=> $labels,
		'hierarchical'      => true,
		'public' 			=> true,
		'show_admin_column' => true,
		'show_in_rest' 		=> true,
		'show_tagcloud' 	=> false,
		'show_ui' 			=> true,
		'query_var' 		=> true,
		'rewrite' 			=> array('slug' => 'latinnosotros')
	);
	register_taxonomy( 'latinnosotros', 'nosotros', $args );


	// Register Hierarchichal Taxonomy - Sponsors
	$labels = array(
		'name'              => 'Categorías',
		'singular_name'     => 'Categoría',
		'search_items'      => 'Buscar Sponsor',
		'all_items'         => 'Todos los Sponsors',		
		'parent_item'       => 'Parent Sponsor',
		'parent_item_colon' => 'Parent Sponsor:',
		'edit_item'         => 'Editar Sponsor',
		'update_item'       => 'Actualizar Sponsor',
		'add_new_item'      => 'Agregar Nuevo Sponsor',		
		'new_item_name'     => 'Nuevo Nombre de Sponsor',
		'menu_name'         => 'Categorías'
	);

	$args = array(
		'labels' 			=> $labels,
		'hierarchical'      => true,
		'public' 			=> true,
		'show_admin_column' => true,
		'show_in_rest' 		=> true,
		'show_tagcloud' 	=> false,
		'show_ui' 			=> true,
		'query_var' 		=> true,
		'rewrite' 			=> array('slug' => 'latinsponsor')
	);
	register_taxonomy( 'latinsponsor', 'sponsor', $args );

	// Register Hierarchichal Taxonomy - Proyectos
	$labels = array(
		'name'              => 'Lugares Proyectos',
		'singular_name'     => 'Lugar',
		'search_items'      => 'Buscar Lugar',
		'all_items'         => 'Todos los Lugares',		
		'parent_item'       => 'Parent Lugar',
		'parent_item_colon' => 'Parent Lugar:',
		'edit_item'         => 'Editar Lugar',
		'update_item'       => 'Actualizar Lugar',
		'add_new_item'      => 'Agregar Nuevo Lugar',		
		'new_item_name'     => 'Nuevo Nombre de Lugar',
		'menu_name'         => 'Lugares'
	);
	$args = array(
		'labels' 			=> $labels,
		'hierarchical'      => true,
		'public' 			=> true,
		'show_admin_column' => true,
		'show_in_rest' 		=> true,
		'show_tagcloud' 	=> false,
		'show_ui' 			=> true,
		'query_var' 		=> true,
		'rewrite' 			=> array('slug' => 'lugar')
	);
	register_taxonomy( 'lugar', 'proyecto', $args );

	// Register HierarchichalTaxonomy - Formatos
	$labels = array(
		'name'              => 'Referencias',
		'singular_name'     => 'Referencia',
		'search_items'      => 'Buscar Referencia',
		'all_items'         => 'Todas las Referencias',		
		'parent_item'       => 'Parent Referencia',
		'parent_item_colon' => 'Parent Referencia:',
		'edit_item'         => 'Editar Referencia',
		'update_item'       => 'Actualizar Referencia',
		'add_new_item'      => 'Agregar Nueva Referencia',		
		'new_item_name'     => 'Nuevo Nombre de Referencia',
		'menu_name'         => 'Referencias'
	);
	$args = array(
		'labels' 			=> $labels,
		'hierarchical'      => true,
		'public' 			=> true,
		'show_admin_column' => true,
		'show_in_rest' 		=> true,
		'show_tagcloud' 	=> false,
		'show_ui' 			=> true,
		'query_var' 		=> true,
		'rewrite' 			=> array('slug' => 'referencia')
	);
	register_taxonomy( 'referencia', 'formato', $args );


	/*
	======================================= 
	CLOUD TAXONOMIES
	======================================= 
	*/

	// Register Hierarchichal Taxonomy Marca Producto
	// $labels = array(
	// 	'name'              => 'Fabricantes',
	// 	'singular_name'     => 'Fabricante',
	// 	'search_items'      => 'Buscar Fabricante',
	// 	'all_items'         => 'Todas los Fabricantes',		
	// 	'parent_item'       => 'Parent Fabricante',
	// 	'parent_item_colon' => 'Parent Fabricante:',
	// 	'edit_item'         => 'Editar Fabricante',
	// 	'update_item'       => 'Actualizar Fabricante',
	// 	'add_new_item'      => 'Agregar Nuevo Fabricante',		
	// 	'new_item_name'     => 'Nuevo Nombre para Fabricante',
	// 	'menu_name'         => 'Fabricantes'
	// );
	// $args = array(
	// 	'labels' 			=> $labels,
	// 	'hierarchical' 		=> true,
	// 	'public'			=> true,
	// 	'show_admin_column' => true,
	// 	'show_in_rest' 		=> true,
	// 	'show_tagcloud' 	=> true,
	// 	'show_ui' 			=> true,
	// 	'query_var' 		=> true,
	// 	'rewrite' 			=> array( 'slug' => 'marca' )
	// 	); 
	// register_taxonomy( 'marca', ['portafolio', 'beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'], $args );
	
	// Register Hierarchichal Taxonomy Noticias - It's a tag cloud

	$labels = array(
		'name'              => 'Etiquetas Noticias',
		'singular_name'     => 'Etiqueta',
		'search_items'      => 'Buscar Etiqueta',
		'all_items'         => 'Todas las Etiquetas',		
		'parent_item'       => 'Parent Etiqueta',
		'parent_item_colon' => 'Parent Etiqueta:',
		'edit_item'         => 'Editar Etiqueta',
		'update_item'       => 'Actualizar Etiqueta',
		'add_new_item'      => 'Agregar Nueva Etiqueta',		
		'new_item_name'     => 'Nuevo Nombre para Etiqueta',
		'menu_name'         => 'Etiquetas'
	);
	$args = array(
		'labels' 			=> $labels,
		'hierarchical'      => true,
		'public' 			=> true,
		'show_admin_column' => true,
		'show_in_rest' 		=> true,
		'show_tagcloud' 	=> true,
		'show_ui' 			=> true,
		'query_var' 		=> true,
		'rewrite' 			=> array('slug' => 'tagsnoticias')
	);
	register_taxonomy( 'tagsnoticias', 'noticias', $args );


		// Register Hierarchichal Taxonomy Noticias - It's a tag cloud

	$labels = array(
		'name'              => 'Etiquetas Noticias',
		'singular_name'     => 'Etiqueta',
		'search_items'      => 'Buscar Etiqueta',
		'all_items'         => 'Todas las Etiquetas',		
		'parent_item'       => 'Parent Etiqueta',
		'parent_item_colon' => 'Parent Etiqueta:',
		'edit_item'         => 'Editar Etiqueta',
		'update_item'       => 'Actualizar Etiqueta',
		'add_new_item'      => 'Agregar Nueva Etiqueta',		
		'new_item_name'     => 'Nuevo Nombre para Etiqueta',
		'menu_name'         => 'Etiquetas'
	);
	$args = array(
		'labels' 			=> $labels,
		'hierarchical'      => true,
		'public' 			=> true,
		'show_admin_column' => true,
		'show_in_rest' 		=> true,
		'show_tagcloud' 	=> true,
		'show_ui' 			=> true,
		'query_var' 		=> true,
		'rewrite' 			=> array('slug' => 'tagsindustrias')
	);
	register_taxonomy( 'tagsindustrias', 'industria', $args );

	// Register Hierarchichal Taxonomy Proyectos, It's a tag cloud

	$labels = array(
		'name'              => 'Productos Proyectos',
		'singular_name'     => 'Producto',
		'search_items'      => 'Buscar Producto',
		'all_items'         => 'Todos los Productos',		
		'parent_item'       => 'Parent Producto',
		'parent_item_colon' => 'Parent Producto:',
		'edit_item'         => 'Editar Producto',
		'update_item'       => 'Actualizar Producto',
		'add_new_item'      => 'Agregar Nuevo Producto',		
		'new_item_name'     => 'Nuevo Nombre para Producto',
		'menu_name'         => 'Productos'
	);
	$args = array(
		'labels' 			=> $labels,
		'hierarchical' 		=> true,
		'public'			=> true,
		'show_admin_column' => true,
		'show_in_rest' 		=> true,
		'show_tagcloud' 	=> true,
		'show_ui' 			=> true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'pmaquina' )
	); 

	register_taxonomy( 'pmaquina', 'proyecto', $args );
}

add_action( 'init', 'be_custom_taxonomies' );