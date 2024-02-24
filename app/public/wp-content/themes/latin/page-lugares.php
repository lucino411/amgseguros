<?php /*
	
		@package latincorrosionheme

*/

get_header(); 

?>

<div class="container-fluid grid-container blastingexperts-posts-container"> 

	<div class="grid-card-portafolio justify-content-center be-page-proyectos">

		<?php 							
            $args = array(
                'post_type' => 'proyecto',
                'post_status' => 'publish',
                'orderby'    => 'modified',
                'order'      => 'DESC',
                'paged' => get_query_var( 'paged' )
                        
            );    

            $beproyectos = new WP_Query($args); 
            
            if( $beproyectos->have_posts() ):
                
                while( $beproyectos->have_posts() ): $beproyectos->the_post();				
                
                    get_template_part( 'template-parts/content-proyecto' );
                
                endwhile;
                
            endif;
            
            wp_reset_query();

		?>

	</div> <!-- grid-card-portafolio -->

	<div class="container be-pagination">
		<?php echo blastingexperts_paging_nav(); ?>	
	</div><!-- .container -->	

</div> <!-- container-fluid -->				
		
<?php get_footer(); ?>