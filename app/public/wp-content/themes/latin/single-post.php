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
								
								get_template_part( 'template-parts/single', get_post_format() );
								
								echo be_post_navigation_without_title();
								
								// if ( comments_open() ):
								// 	comments_template();
								// endif;
							
							endwhile;
							
						endif;	                
					
					?>						
			
				</div><!-- .container -->
			</div><!-- .row -->				
		</main>
	</div><!-- #primary -->
	
<?php get_footer(); ?>