<?php /*
	
		@package latincorrosionheme

*/

get_header(); ?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<header class="archive-header text-center">
				<?php single_term_title('<h1 class="page-title">', '</h1>'); ?>
			</header>
			
			<?php if( is_paged() ): ?>
			
				<div class="container text-center container-load-previous">
					<a class="btn-blastingexperts-load blastingexperts-load-more" data-prev="1" data-archive="<?php echo $_SERVER["REQUEST_URI"]; ?>" data-page="<?php echo blastingexperts_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
						<span class="blastingexperts-icon blastingexperts-loading"></span>
						<span class="text">Cargar Post Anteriores</span>
					</a>
				</div><!-- .container -->
				
			<?php endif; ?>
			
			<div class="container blastingexperts-posts-container">
				
				<?php 
					
					if( have_posts() ):
						
						echo '<div class="page-limit" data-page="' . $_SERVER["REQUEST_URI"] . '">';
						
						while( have_posts() ): the_post();
												
							get_template_part( 'template-parts/content', get_post_format() );
						
						endwhile;
						
						echo '</div>';
						
					endif;
                
				?>
				
			</div><!-- .container -->
			
			<div class="container text-center">
				<a class="btn-blastingexperts-load blastingexperts-load-more" data-page="<?php echo blastingexperts_check_paged(1); ?>" data-archive="<?php echo blastingexperts_grab_current_uri(); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
					<span class="blastingexperts-icon blastingexperts-loading"></span>
					<span class="text">Cargar Más</span>
				</a>
			</div><!-- .container -->
			
		</main>
	</div><!-- #primary -->
	
<?php get_footer(); ?>