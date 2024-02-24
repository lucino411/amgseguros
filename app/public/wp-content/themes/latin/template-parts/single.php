<?php

/*
	
@package latincorrosionheme

-- Single Post Template

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header text-center single-header">
		
		<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
		
		<div class="entry-meta mb-2">
			<?php echo blastingexperts_posted_meta(); ?>
		</div>
		
	</header>
	
	<div class="entry-content be-entry-content-single be-entry-content-news">
		
		<?php if( get_field('imagen_principal_proyectos') ) { ?>

			<div class="be-image-news img-fluid">		
				<img src="<?php the_field('imagen_principal_proyectos'); ?>" alt="<?php the_title(); ?>">
			</div>

		<?php } elseif( get_field('video_principal_proyectos') ) { ?>
			
			<div class="single-product-video">
				<?php the_field('video_principal_proyectos'); ?>
			</div>

		<?php } ?>
		
		
		<div class="single-product-content img-fluid">
			<?php the_content(); ?>
		</div>
		
	</div><!-- .entry-content -->

<!-- Image Gallery -->

		<?php
			//Get the images ids from the post_metadata
			$images = acf_photo_gallery('galeria_de_imagenes_proyectos', $post->ID);
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
									<img src="<?php echo $thumbnail_image_url; ?>" alt="<?php echo $title; ?>" class="img-fluid">	
								</a>
							<?php } ?>
						</div>
					</li>

					<?php endforeach; ?> 

				</ul>				

		<?php endif; ?>	

	<!-- Descargas PDF -->	

	<?php if( get_field('archivo_noticias') ): ?>
		<div class="mb-5">
			<button class="be-accordion accordion-single-product accordion-noticias">Descargas</button>
			<div class="be-accordion-panel panel-single-product">
				<ul>
					<?php					
						$file = get_field('archivo_noticias');					
					?>
					
					<li><span><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></span></li><br>

					<?php 					
						if( get_field('archivo_noticias_2') ): 
							$file = get_field('archivo_noticias_2');
						?>
						<li><span><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></span></li>
					<?php endif; ?>
				</ul>

			</div>				
		</div>
	<?php endif; ?>
	
	<footer class="entry-footer noticias-footer">
		<?php echo blastingexperts_posted_footer(); ?>
	</footer>
	
</article>