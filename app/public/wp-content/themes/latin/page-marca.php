<?php /*
	
@package blastingexpertstheme

*/

get_header(); 

?>

<div class="container-fluid grid-container blastingexperts-posts-container">
	<div class="btn-grid-list">
		<span class="be-icons icon-squared-menu btn-grid"></span>
		<span class="be-icons icon-list-menu btn-list"></span>
	</div>	 

	<div class="grid-card-portafolio justify-content-center">

        <?php     
                
            $args = array(
                'post_type'     => 'portafolio',
                'post_status'   => 'publish',
                'orderby'       => 'modified',
                'order'         => 'DESC',
                'tax_query'     => array(
                                        array(
                                            'taxonomy'  => 'marca',
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