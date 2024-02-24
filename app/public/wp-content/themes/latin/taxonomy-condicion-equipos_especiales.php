<?php /*
	
@package blastingexpertstheme

*/

get_header(); 

?>

<div class="container-fluid grid-container blastingexperts-posts-container">

	<!-- <header class="archive-header text-center">
		<h2><?php single_term_title(); ?></h2>
	</header> -->
	<div class="btn-grid-list">
		<span class="be-icons icon-squared-menu btn-grid"></span>
		<span class="be-icons icon-list-menu btn-list"></span>
	</div>

	<div class="grid-card-portafolio justify-content-center">
		
		<?php 
		
			$theterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

			$args = array(
                'post_type'     => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'beshotpeening', 'bewaterjetting'],
				'orderby'       => 'modified',
				'order'         => 'DESC',
				'paged'         => get_query_var( 'paged' ), 
				'tax_query'     => array(
					array(
						'taxonomy' => 'condicion',
						'field'     => 'slug',
						'terms'     => 'equipos_especiales'   
			                                          
					)
				),						
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
			
</div> <!-- container-fluid -->				
		
<?php get_footer(); ?>