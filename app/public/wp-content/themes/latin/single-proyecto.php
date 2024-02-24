<?php /*
	
		@package latincorrosionheme

*/

get_header(); ?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">			
			<div class="row">	
				<div class="container-fluid latin-breadcrumb">
					<div class="container">
						<div class="entry-meta"> 
							<a href="<?php echo home_url(); ?>"><?php echo apply_filters( 'Inicio Breadcrumb Categorias', 'Inicio' ); ?></a>
							<i class="breadcrumb-angle fa-solid fa-angle-right"> /&nbsp;          </i>
							<a href="<?php echo home_url(); ?>/?post_type=<?php printf( get_post_type( get_the_ID() ) ); ?>"><?php echo apply_filters( 'Proyectos Breadcrumb', 'Proyectos' ); ?></a>	 
							<i class="breadcrumb-angle fa-solid fa-angle-right"> /&nbsp; </i>
							<?php 									 
								$title = get_the_title();
								$short_title = substr( $title, 0, 35);
								echo $short_title . " ...";																		
								?>  
						</div>
					</div>		
				</div>		
				<div class="container">				
					<?php 																			
						if( have_posts() ):							
							while( have_posts() ): the_post();								
								blastingexperts_save_post_views( get_the_ID() );								
								get_template_part( 'template-parts/single-proyecto' );								
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