<?php /*
	
@package blastingexpertstheme

*/

get_header(); 

?>

<div class="container-fluid grid-container blastingexperts-posts-container">

	<header class="archive-header text-center">
		<h2>Tolvas <?php single_term_title() ?></h2>
	</header>
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