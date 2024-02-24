<?php

/*
	
@package latincorrosiontheme
-- Template for Noticias fijas

*/

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('latincorrosion-format-standard'); ?>>
    <header class="entry-header" >		        
        <?php the_title( '<h2 class="blog-post-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h2>'); ?>        
        <div class="entry-meta">					
            <?php 
                if( blastingexperts_noticias_clasificacion($post->ID, 'latinevento') != NULL ) { ?>                         		
                    <?php echo blastingexperts_noticias_clasificacion($post->ID, 'latinevento') ?>
            <?php } ?>  
        </div>		    
    </header>			
    <div class="entry-excerpt">
        <?php echo limit_content( 50 ); ?> 
    </div>						
</article>