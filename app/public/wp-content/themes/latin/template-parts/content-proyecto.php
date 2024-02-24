<?php

/*
	
		@package latincorrosionheme
-- Content Proyectos

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <figure class="home-proyectos">
            <div class="image">                        
            <?php if( get_field('video_miniatura_proyectos') ) {                
                    the_field('video_miniatura_proyectos'); 
                } else {  ?>                       
                    <img src="<?php the_field('imagen_miniatura_proyectos'); ?>" alt="<?php the_title(); ?>" class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder image" preserveAspectRatio="xMidYMid slice" focusable="false"">
            <?php } ?>    
            </div>
            <figcaption>
                <div class="date"><?php echo blastingexperts_posted_meta_dm() ?>
                </div>

                <h3 class="card-title"><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h3>
                <p class="card-text">
                <?php 
                    $excerpt = get_the_excerpt();  
                    $excerpt = substr( $excerpt, 0, 220 ); // Only display first 150 characters of excerpt
                    $result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
                    echo $result . ' [...]';       
                ?>
                </p>
            </figcaption>
            <footer>
            <?php if( blastingexperts_posted_portafolio_line($post->ID) != NULL ) { ?>                         
                <i><?php echo blastingexperts_proyectos_lugar($post->ID, 'lugar') ?></i>
            <?php } ?>  
            </footer>
            <!-- <a href="<?php esc_url( the_permalink() ); ?>">Leer mas</a> -->
        </figure>
</article>
