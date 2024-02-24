<?php

/*
	
@package latincorrosionheme

-- Template for Noticias Post

*/

?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('blastingexperts-format-standard'); ?>>

			<header class="entry-header text-center" >		
				
				<?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>
				
				<div class="entry-meta">
						
					<?php 
						if( blastingexperts_noticias_clasificacion($post->ID, 'clasificacion') != NULL ) { ?>                            
			
							<?php echo blastingexperts_noticias_clasificacion($post->ID, 'clasificacion') ?>

					<?php } ?>  

				</div>		
			
			</header>
			
			<div class="entry-content text-center">
				
				<?php if( blastingexperts_get_attachment() ) { ?>

					<a class="standard-featured-link" href="<?php the_permalink(); ?>">
						<img src="<?php echo blastingexperts_get_attachment(); ?>" alt="<?php the_title(); ?>" class="img-fluid" loading="lazy">	
					</a>	

				<?php } ?>

				<div class="entry-excerpt">
					<?php the_excerpt(); ?>
				</div>
				
				<div class="button-container text-center">
					<a href="<?php the_permalink(); ?>" class="btn btn-blastingexperts"><?php _e( 'Leer Más' ); ?></a>
				</div>
				
			</div><!-- .entry-content -->

			
			<hr>
	
			<footer class="entry-footer">
				<?php 				
					if( blastingexperts_posted_portafolio_marca($post->ID, 'tagsnoticias') != NULL ) {				
						echo '<span class="be-icons icon-price-tag"></span> ' . blastingexperts_posted_portafolio_marca($post->ID, 'tagsnoticias'); 
					}										
				?>
			</footer>
			
		</article>