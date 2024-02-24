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
                // 'post_type'     => 'portafolio',
                // 'post_type'     => ['portafolio', 'beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'bewaterjetting'],
                // 'post_type'     => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'bewaterjetting'],
                'post_type'     => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'bewaterjetting'],
                'post_status'   => 'publish',
                'orderby'       => 'modified',
                'order'         => 'DESC',
                'paged'         => get_query_var( 'paged' )                        
            );    

            $beportafolio = new WP_Query($args); 
            
            if( $beportafolio->have_posts() ):
                
                while( $beportafolio->have_posts() ): $beportafolio->the_post();				
                
                    get_template_part( 'template-parts/content-portafolio' );
                
                endwhile;

                wp_reset_postdata();
                
            endif;
			
			wp_reset_query();

		?>

	</div> <!-- grid-card-portafolio -->

	<div class="container be-pagination">
		<?php echo blastingexperts_paging_nav(); ?>	
	</div><!-- .container -->	

    <div class="container be-pagination">
		<?php echo cq_pagination() ?>
        <?php echo paginate_links(); ?>
        
	</div><!-- .container -->

</div> <!-- container-fluid -->				
		
<?php get_footer(); ?>