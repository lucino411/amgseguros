<?php /*
	
@package blastingexpertstheme

*/

get_header(); 

?>

<div class="container-fluid grid-container blastingexperts-posts-container">

	<header class="archive-header text-center">
		<h2>Alquiler <?php single_term_title(); ?></h2>
	</header>

	<div class="alquiler-container">
		<div class="jumbotron single-image-paper-effect">
			<?php     
					
				$args = array(
					'post_type'     => 'formato',
					'post_status'   => 'publish',
					'orderby'       => 'modified',
					'order'         => 'DESC',
					'tax_query'     => array(
											array(
												'taxonomy'  => 'referencia',
												'field'     => 'slug',
												'terms'     => 'condiciones_alquiler'                                                
											),
					),
				);
				
				$be_condiciones_alquiler = new WP_Query($args);                 

				if( $be_condiciones_alquiler->have_posts() ):							
					
					while( $be_condiciones_alquiler->have_posts() ): $be_condiciones_alquiler->the_post();                                        
			?>

					<p><?php echo get_the_content(); ?></p>

			<?php                                 
					endwhile;

					wp_reset_postdata();

				endif;			
			?>	
		</div> <!-- jumbotron -->
	</div> <!-- alquiler-container -->

	<div class="btn-grid-list">
		<span class="be-icons icon-squared-menu btn-grid"></span>
		<span class="be-icons icon-list-menu btn-list"></span>
	</div>

	<div class="grid-card-portafolio justify-content-center">	  

		<?php 							
			if( have_posts() ):							
				
				while( have_posts() ): the_post();
										
					get_template_part( 'template-parts/content-portafolio', get_post_format() );
				
				endwhile;

			endif;			
		?>	

	</div> <!-- grid-card-portafolio -->

	<div class="container be-pagination">
		<?php echo blastingexperts_paging_nav(); ?>
	</div><!-- .container -->
			
</div> <!-- container-fluid -->				
		
<?php get_footer(); ?>