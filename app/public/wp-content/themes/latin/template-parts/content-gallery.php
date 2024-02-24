<?php

/*
	
@package latincorrosionheme-- Gallery Post Format

*/

global $detect;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blastingexperts-format-gallery' ); ?>>
	<header class="entry-header text-center">
		
		<?php if( blastingexperts_get_attachment() && !$detect->isMobile() && !$detect->isTablet() ): ?>			
			
			<div id="post-gallery-<?php the_ID(); ?>" class="carousel slide blastingexperts-carousel-thumb" data-ride="carousel">
				
				<div class="carousel-inner" role="listbox">
					
					<?php 
						
						$attachments = blastingexperts_get_bs_slides( blastingexperts_get_attachment(7) );
						foreach( $attachments as $attachment ):
					?>
										
					<div class="carousel-item<?php echo $attachment['class']; ?>">
						<img class="blastingexperts-carousel-image" src="<?php echo $attachment['url']; ?>" alt="<?php echo $attachment['caption']; ?>">
						<div class="hide next-image-preview" data-image="<?php echo $attachment['next_img']; ?>"></div>
						<div class="hide prev-image-preview" data-image="<?php echo $attachment['prev_img']; ?>"></div>
						<div class="entry-excerpt image-caption">
							<p><?php echo $attachment['caption']; ?></p>
						</div>
					</div>
				
					<?php endforeach; ?>

					
				</div><!-- .carousel-inner -->
				
				<a class="carousel-control-prev left" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
					<div class="preview-container">
						<span class="thumbnail-container background-image"></span>
						<span class="blastingexperts-icon blastingexperts-chevron-left " aria-hidden="true"></span>
						<span class="sr-only">Anterior</span>
					</div>
				</a>
				<a class="carousel-control-next right" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
					<div class="preview-container">
						<span class="thumbnail-container background-image"></span>
						<span class="blastingexperts-icon blastingexperts-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Siguiente</span>
					</div>
				</a>
				
			</div><!-- .carousel -->
			
		<?php endif; ?>
		
		<?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>
		
		<div class="entry-meta">
			<?php echo blastingexperts_posted_meta(); ?>
		</div>
		
	</header>
	
	<div class="entry-content">

		<?php if( blastingexperts_get_attachment() && ( $detect->isMobile() || $detect->isTablet() ) ): ?>
			
			<a class="standard-featured-link" href="<?php the_permalink(); ?>">
				<div class="standard-featured background-image" style="background-image: url(<?php echo blastingexperts_get_attachment(); ?>);"></div>
			</a>
			
		<?php endif; ?>
		
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
		
		<div class="button-container text-center">
			<a href="<?php the_permalink(); ?>" class="btn btn-blastingexperts"><?php _e( 'Leer Más' ); ?></a>
		</div>
		
	</div><!-- .entry-content -->
	
	<footer class="entry-footer">
		<?php echo blastingexperts_posted_footer(); ?>
	</footer>
	
</article>