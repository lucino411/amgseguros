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
            <?php 
                if( blastingexperts_posted_portafolio_line($post->ID) != NULL ) {
                    
                    echo blastingexperts_posted_portafolio_line($post->ID);   
                
                }            
            ?>  
		</div>
		
	</header>
	
	<div class="entry-content be-entry-content-single be-entry-content-news">		
		
		<div class="single-product-content img-fluid">
			<?php the_content(); ?>
		</div>
		
	</div><!-- .entry-content -->


	<!-- Descargas PDF -->	

	<?php if( get_field('archivo_proyecto') ): ?>
		<div class="mb-5">
			<button class="be-accordion accordion-single-product accordion-noticias">Descargas</button>
			<div class="be-accordion-panel panel-single-product">
				<ul>
					<?php					
						$file = get_field('archivo_proyecto');					
					?>
					
					<li><span><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></span></li><br>

					<?php 					
						if( get_field('archivo_proyecto_2') ): 
							$file = get_field('archivo_proyecto_2');
						?>
						<li><span><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></span></li>
					<?php endif; ?>
				</ul>

			</div>				
		</div>
	<?php endif; ?>
	
	<footer class="entry-footer noticias-footer">

        <?php echo blastingexperts_proyectos_footer($post->ID, 'documento') ?>
        
	</footer>
	
</article>