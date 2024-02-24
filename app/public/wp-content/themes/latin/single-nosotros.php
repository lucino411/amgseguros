<?php /*
	
		@package latincorrosionheme

*/

get_header(); ?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">			
			<div class="row">					
				<div class="container">
					<?php 
																			
						if( have_posts() ):
							
							while( have_posts() ): the_post();
								
								blastingexperts_save_post_views( get_the_ID() );
								
								get_template_part( 'template-parts/single-nosotros' );
							
							endwhile;
							
						endif;	                
					
					?>						
			
				</div><!-- .container -->
			</div><!-- .row -->				
		</main>
	</div><!-- #primary -->
	
<?php get_footer(); ?>