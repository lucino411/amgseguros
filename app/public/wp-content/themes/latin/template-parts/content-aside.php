<?php

/*
	
@package latincorrosionheme-- Aside Post Format - Mini Entrada

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blastingexperts-format-aside' ); ?>>

	<header class="entry-header text-center">

		<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>	
				
		<div class="entry-meta">
			<?php 
				if( blastingexperts_noticias_clasificacion($post->ID, 'clasificacion') != NULL ) { ?>                            

					<?php echo blastingexperts_noticias_clasificacion($post->ID, 'clasificacion') ?>

			<?php } ?>  
		</div>


		<div class="entry-content">		

			<p><?php echo the_content(); ?></p>
			<?php echo be_share_this(); ?>			

		</div><!-- .entry-content -->

	</header>	

			
	<footer class="entry-footer">
		<hr>
		<div class="post-footer-container">
			<div class="row">
				<div class="col-12">
					<?php 				
						if( blastingexperts_posted_portafolio_marca($post->ID, 'tagsnoticias') != NULL ) {				
							echo '<span class="be-icons icon-price-tag"></span> ' . blastingexperts_posted_portafolio_marca($post->ID, 'tagsnoticias'); 
						}										
					?>
				</div>
			</div>
		</div>
	</footer>
			
		
	
</article>