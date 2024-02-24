<?php

/*
	
@package blastingexpertstheme
-- Content Proyectos

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="flip-card">

        <div class="card-inner-proyectos archive-portafolio-card">

            <div class="flip-card-front">         

                <?php if( get_field('video_miniatura_proyectos') ) {
                        
                        the_field('video_miniatura_proyectos'); 

                    } else {  ?>                       
                        
                        <img src="<?php the_field('imagen_miniatura_proyectos'); ?>" alt="<?php the_title(); ?>" class="card-img-top" loading="lazy">

                <?php } ?>                                        
                                         
                <div class="card-body archive-portafolio-body">
                    <h4 class="card-title"><?php the_title(); ?></h4>
                    <div class="entry-meta mb-2">
                        <?php 
                            if( blastingexperts_posted_portafolio_line($post->ID) != NULL ) { ?>                            
                    
                             <h4><?php echo blastingexperts_proyectos_lugar($post->ID, 'lugar') ?></h4>
                
                        <?php } ?>  
		            </div>
                    <p>
                        <?php 
                            $excerpt = get_the_excerpt();  
                            $excerpt = substr( $excerpt, 0, 150 ); // Only display first 150 characters of excerpt
                            $result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
                            echo $result . '...';       
                        ?>
                    </p>
                </div>

                <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark" class="btn-card-portafolio">Ver mas</a>       

            </div> <!-- flip-card-front -->
            
            
        </div> <!-- card-inner archive-portafolio-card -->

        
    </div> <!-- flip-card -->

</article>
