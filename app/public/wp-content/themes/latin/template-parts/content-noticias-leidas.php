
<?php
/*	
@package latincorrosionheme
-- Template for Noticias Leidas
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post reveal noticia-leida'); ?>>       
     <section class="entry-content">     
        <header class="entry-header" >	                  
            <?php the_title( '<h3 class="blog-post-title entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h3>'); ?>     
        </header>

        <div class="blog-post-meta">                
        <?php if( latincorrosion_noticias_clasificacion($post->ID, 'clasificacion') != NULL ) { ?>                         
            <?php echo latincorrosion_noticias_clasificacion($post->ID, 'clasificacion') ?>
        <?php } ?>  
        </div>	
        
        <!-- <div class="button-container">
            <a href="<?php the_permalink(); ?>" class="btn btn-danger btn-latincorrosion"><?php _e( 'Leer Más' ); ?></a>
        </div> -->
    </section>       
    
    <section class="entry-image">      
    	<?php if( latincorrosion_get_attachment() ) { ?>
        <a class="standard-featured-link" href="<?php the_permalink(); ?>">
            <img src="<?php echo latincorrosion_get_attachment(); ?>" alt="<?php the_title(); ?>" loading="lazy">	
        </a>	
		<?php } ?>          
    </section>  
</article>

<hr class="latin-hr-news">