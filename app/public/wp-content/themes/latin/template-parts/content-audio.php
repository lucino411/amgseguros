<?php

/*
	
@package blastingexperts
-- Audio Post Format

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blastingexperts-format-audio' ); ?>>

	<header class="entry-header">
		
	<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
		
		<div class="entry-meta">
			<?php 
				if( blastingexperts_noticias_clasificacion($post->ID, 'clasificacion') != NULL ) { ?>                            

					<?php echo blastingexperts_noticias_clasificacion($post->ID, 'clasificacion') ?>

			<?php } ?> 
		</div>
		
		
		<div class="entry-content entry-content-audio">
			
			<?php echo blastingexperts_get_embedded_media( array('audio','iframe') ); ?>
			
			<div>
				<?php echo be_share_this(); ?>			
			</div>
			
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