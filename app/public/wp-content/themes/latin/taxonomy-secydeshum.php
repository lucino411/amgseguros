<?php /*
	
@package blastingexpertstheme

*/

get_header(); 

?>

<div class="container-fluid grid-container blastingexperts-posts-container be-taxonomy">

	<header class="archive-header text-center">
		<!-- <h3> <small class="text-muted">Secadores y Deshumidificadores</small></h3>
		<h2><?php single_term_title(); ?></h2> -->
		<h1><span>Secadores y Deshumidificadores</span><?php single_term_title(); ?></h1>
	</header>
	<div class="btn-grid-list">
		<span class="be-icons icon-squared-menu btn-grid"></span>
		<span class="be-icons icon-list-menu btn-list"></span>
	</div>

	<div class="grid-card-portafolio justify-content-center">
		
		<?php 
		
			$theterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

			$args = array(
				'post_type'     => ['portafolio', 'besecydeshum'],
				'post_status'   => 'publish',
				'orderby'       => 'modified',
				'order'         => 'DESC',
				'paged'         => get_query_var( 'paged' ), 
				'tax_query'     => array(
					array(
						'taxonomy' => 'secydeshum',
						'field'     => 'slug',
						'terms'     => $theterm->slug   
			                                          
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