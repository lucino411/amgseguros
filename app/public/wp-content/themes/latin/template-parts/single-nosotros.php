<?php

/*
	
@package latincorrosionheme-- Single Noticias > Single Noticia Template

*/

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blastingexperts-single-noticia'); ?>>

	<header class="entry-header text-center">
		
		<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
		
		<div class="entry-meta">
 
			<?php 
				if( blastingexperts_noticias_clasificacion($post->ID, 'clasificacion') != NULL ) { ?>                            
	
					<?php echo blastingexperts_noticias_clasificacion($post->ID, 'clasificacion') ?>

			<?php } ?>  

		</div>
		
	</header>
	
	<!-- <div class="entry-content be-entry-content-single be-entry-content-news"> -->
	<div class="entry-content img-fluid">
		
		<?php if( get_field('imagen_principal_noticias') ) { ?>

			<img src="<?php the_field('imagen_principal_noticias'); ?>" alt="<?php the_title(); ?>" loading="lazy">

		<?php } ?>		
		
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->

<!-- Image Gallery -->

		<?php
			//Get the images ids from the post_metadata
			$images = acf_photo_gallery('galeria_de_imagenes_noticias', $post->ID);
			//Check if return array has anything in it
			if( count($images) ): 
		?>
			
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

	<div class="container-accordion-sp ">	
		<div class="accordion accordion-sp" id="accordionSingleNew">

			<?php if( get_field('archivo_noticia') ): ?>

				<div class="card">
					<div class="card-header header-accordion-sp" id="DownloadNew">
						<h2 class="mb-0 ">
							<button class="btn btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseNew" aria-expanded="false" aria-controls="collapseNew">Descargas</button>
						</h2>
					</div>
					
					<div id="collapseNew" class="collapse" aria-labelledby="DownloadNew" data-parent="#accordionSingleNew">
						<div class="card-body body-accordion-sp">
							<ul>
								<?php $file = get_field('archivo_noticia'); ?>								
									
									<li class="be-link"><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></li><br>

								<?php if( get_field('archivo_noticia_2') ): $file = get_field('archivo_noticia_2'); ?>

									<li class="be-link"><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></li>
									
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div><!-- card -->

			<?php endif; ?>

		</div> <!-- accordion -->			
	</div> <!-- container-fluid -->
    
    <hr>

	<div>
		<?php echo be_share_this(); ?>			
	</div>

	
</article>