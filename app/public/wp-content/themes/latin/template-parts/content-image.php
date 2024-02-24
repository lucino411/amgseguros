<?php

/*
	
@package blastingexpertstheme
-- Image Post Format

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blastingexperts-format-image' ); ?>>	

	<header class="entry-header text-center">

		<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
				
		<div class="entry-meta">
				
			<?php 
				if( blastingexperts_noticias_clasificacion($post->ID, 'clasificacion') != NULL ) { ?>                            
	
					<?php echo blastingexperts_noticias_clasificacion($post->ID, 'clasificacion') ?>

			<?php } ?>  

		</div>		

		<div class="entry-content">			
				
			<?php if( blastingexperts_get_attachment() ): ?>				

				<div class="standard-featured text-center">							
					<img src="<?php echo blastingexperts_get_attachment(); ?>" alt="<?php the_title(); ?>" loading="lazy">						
				</div>
				
			<?php endif; ?>	


			<?php $the_content = apply_filters('the_content', get_the_content());
			if ( !empty($the_content) ) { ?>			
				<div class="entry-excerpt image-content-caption hide">
					<p><?php echo limit_content(22); ?></p>
				</div>
			<?php } ?>
				
			<div class="image-share-caption hide">
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