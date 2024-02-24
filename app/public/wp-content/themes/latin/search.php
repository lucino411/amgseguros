<?php /*
	
		@package latincorrosionheme

*/

get_header(); 

?>

<div class="container-fluid grid-container blastingexperts-posts-container">

	<header class="archive-header text-center search-header">
		<h1 class="page-title page-search">Resultado de Búsqueda</h1>
	</header>
	<!-- <h2 class="page-title page-search">Resultado de Búsqueda: <?php the_search_query(); ?></h2> -->

	<header class="archive-header text-center search-header">
		
		<h2 class="page-title page-search">Productos: <?php the_search_query(); ?></h2>
			
	</header>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row grid-card-portafolio justify-content-md-center"> 

			<?php 
				
				$args = array(
					's' 				=> $s,
					'posts_per_page'    => '-1', // use -1 for all post
					'post_status' 		=> 'publish',
					'orderby'       	=> 'modified',
					'order'         	=> 'DESC',  
					'post_type' 		=> ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'bewaterjetting']				
				);
				
				$productoSearch = new WP_Query($args);

				if( $productoSearch->have_posts() ) {							
					
					while( $productoSearch->have_posts() ): $productoSearch->the_post();
											
						get_template_part( 'template-parts/content-portafolio' );
					
					endwhile;

					wp_reset_postdata();

				} else { ?> 
				 
					<div class="container">
						<h5>No hay productos relacionados con: <?php the_search_query(); ?></h5>	
					</div>
				 
				 <?php } ?>
				 
		</div> <!-- grid-card-portafolio -->
	</article>

</div> <!-- container-fluid grid-container blastingexperts-posts-container -->				

<!-- Busqueda Proyectos -->

	<?php 							
		$args = array(
			's' 				=> $s,
			'post_type' 		=> 'proyecto',	
			'post_status' 		=> 'publish',  
			'orderby'       	=> 'modified',
			'order'         	=> 'DESC',
			'posts_per_page'  	=> '-1', // use -1 for all post
						
		);
		
		$proyectoSearch = new WP_Query($args);

		if( $proyectoSearch->have_posts() ) {	?>
		
			
			<header class="archive-header text-center search-header">
		
				<h2 class="page-title page-search">Proyectos: <?php the_search_query(); ?></h2>
					
			</header>

			<!-- <div class="grid-card-portafolio justify-content-center be-page-proyectos mt-0"> -->
		
		<?php 

			while( $proyectoSearch->have_posts() ): $proyectoSearch->the_post();
									
				get_template_part( 'template-parts/content-proyectos-search' );
			
			endwhile;

			wp_reset_postdata();
		
		?>
			<!-- </div>  -->
		<?php } ?>


<!-- Busqueda Noticias  -->

		<?php 
			
			$args = array(
				's' 				=> $s,
				'post_type' 		=> 'noticias',
				'post_status' 		=> 'publish',  
				'orderby'       	=> 'modified',
                'order'        	 	=> 'DESC',	
				'posts_per_page'    => '-1', 
		
			);
			
			$noticiaSearch = new WP_Query($args);

			if( $noticiaSearch->have_posts() ) { ?>
			
				<header class="archive-header text-center search-header">
            
					<h2>Noticias: <?php the_search_query(); ?></h2>				
				
				</header>
				
			<?php

				while( $noticiaSearch->have_posts() ): $noticiaSearch->the_post();
										
					get_template_part( 'template-parts/content-news-search' );
				
				endwhile;

				wp_reset_postdata();

			} ?>		

		
<?php get_footer(); ?>