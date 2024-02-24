<?php

/*
	
@package latincorrosionheme

-- Single Noticias > Single Noticia Template

*/

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blastingexperts-single-noticia'); ?>>
	<header class="archive-header text-center proyecto-header">		
		<?php the_title( '<h1 class="page-title">', '</h1>'); ?>		
		<div class="entry-meta"> 
			<?php 
				if( blastingexperts_noticias_clasificacion($post->ID, 'clasificacion') != NULL ) { ?>                        
					<?php echo blastingexperts_posted_meta() ?>
					 <?php if( blastingexperts_posted_portafolio_line($post->ID) != NULL ) {                    
                    	echo blastingexperts_posted_portafolio_line($post->ID);                  
                	} ?>  
			<?php } ?>  
		</div>		
	</header>	
	<!-- <div class="entry-content be-entry-content-single be-entry-content-news"> -->
	<div class="entry-content img-fluid">		
		<?php if( get_field('imagen_principal_noticias') ) { ?>
			<img src="<?php the_field('imagen_principal_noticias'); ?>" alt="<?php the_title(); ?>" loading="lazy">
		<?php } ?>				
		<?php the_content(); ?>	
		<?php if( get_field('video_noticias') ) { ?>		
			<?php the_field('video_noticias'); ?>
		<?php } ?>
	</div><!-- .entry-content -->

<!-- Image Gallery -->
		<?php
			//Get the images ids from the post_metadata
			$images = acf_photo_gallery('galeria_de_imagenes_noticias', $post->ID);
			//Check if return array has anything in it
			if( count($images) ): ?>			
				<ul class="row list-unstyled single-portafolio-gallery-ul">

					<?php foreach($images as $image):
						$id = $image['id']; // The attachment id of the media
						$title = $image['title']; //The title
						$caption= $image['caption']; //The caption
						$full_image_url= $image['full_image_url']; //Full size image url
						$thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
						$url= $image['url']; //Goto any link when clicked		
					?>

					<li>
						<div class="zoom-gallery single-portafolio-gallery">
							<?php if( !empty($full_image_url) ){ ?>
								<a href="<?php echo $full_image_url; ?>" data-caption="<?php the_excerpt(); ?>" title="<?php echo $title; ?>">
									<img src="<?php echo $thumbnail_image_url; ?>" alt="<?php echo $title; ?>" class="img-fluid" loading="lazy">	
								</a>
							<?php } ?>
						</div>
					</li>
					<?php endforeach; ?> 
				</ul>	
		<?php endif; ?>	

	<!-- Descargas PDF -->	

		
	<?php if( get_field('archivo_noticia') ): ?>
		<div class="alert alert-dark news-download-files" role="alert">
			<h2>Descargas</h2>
			<hr>
			<ul>
				<?php $file = get_field('archivo_noticia'); ?>							
					<li class="be-link"><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></li>
				<?php if( get_field('archivo_noticia_2') ): $file = get_field('archivo_noticia_2'); ?>
					<li class="be-link"><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></li>									
				<?php endif; ?>
			</ul>				
		</div>		
	<?php endif; ?>

	<div>
		<?php echo be_share_this(); ?>			
	</div>
	<hr>	
	<footer class="entry-footer">
		<?php 				
			if( blastingexperts_posted_portafolio_marca($post->ID, 'tagsnoticias') != NULL ) {				
				echo '<span class="be-icons icon-price-tag"></span> ' . blastingexperts_posted_portafolio_marca($post->ID, 'tagsnoticias'); 
			}										
		?>
	</footer>	
</article>