<?php /*
	
@package blastingexpertstheme

*/

get_header(); 

?>

<div class="container-fluid grid-container blastingexperts-posts-container">

    <header class="archive-header text-center product-header">
            <h1 class="page-title">Agua a Ultra Alta Presión o Agua más Abrasivo</h1>
    </header>  
    
     <div class="grid-card-portafolio justify-content-center">

        <?php     
                
            $args = array(
                'post_type'     => 'portafolio',
                'post_status'   => 'publish',
                'orderby'       => 'modified',
                'order'         => 'DESC',
                'tax_query'     => array(
                                        array(
                                            'taxonomy'  => 'hidrolavadoras',
                                            'operator' => 'EXISTS'                                                               
                                        ),
                ),
            );
            
            $bealquiler = new WP_Query($args);                 

			if( $bealquiler->have_posts() ):							
				
				while( $bealquiler->have_posts() ): $bealquiler->the_post();
										
					get_template_part( 'template-parts/content-portafolio' );
				
				endwhile;

				wp_reset_postdata();

			endif;			
		?>	

    </div> <!-- grid-card-portafolio -->


    <div class="container be-pagination">
        <?php echo blastingexperts_paging_nav(); ?>	
    </div><!-- .container -->	

</div> <!-- container-fluid -->				
		
<?php get_footer(); ?>