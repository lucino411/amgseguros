<?php
/*	
@package latincorrosiontheme
-- Template for Noticias Post
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post reveal h-main-news'); ?>>
    <div class="entry-content">     
        <header class="entry-header" >	            
            <?php 				
                if( latincorrosion_posted_portafolio_marca($post->ID, 'tagsnoticias') != NULL ) {				
                    echo '' . latincorrosion_posted_portafolio_marca($post->ID, 'tagsnoticias'); 
                }										
            ?>	        
            <?php the_title( '<h2 class="blog-post-title entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h2>'); ?>     
        </header>

        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>     
        <div class="blog-post-meta">                
            <?php if( latincorrosion_noticias_clasificacion($post->ID, 'clasificacion') != NULL ) { ?>                         
                <?php echo latincorrosion_noticias_clasificacion($post->ID, 'clasificacion') ?>
             <?php } ?>  
        </div>		

        <!-- <div class="button-container">
            <a href="<?php the_permalink(); ?>" class="btn btn-danger btn-latincorrosion"><?php _e( 'Leer Más' ); ?></a>
        </div>      -->
    </div>
    <div class="entry-image">
        <?php if( latincorrosion_get_attachment() ) { ?>
			<a class="standard-featured-link" href="<?php the_permalink(); ?>">
				<img src="<?php echo latincorrosion_get_attachment(); ?>" alt="<?php the_title(); ?>" class="img-fluid" loading="lazy">	
			</a>	
		<?php } ?>
    </div>
</article>

<hr class="latin-hr-news">