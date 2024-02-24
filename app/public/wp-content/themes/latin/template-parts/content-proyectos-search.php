<?php

/*
	
@package latincorrosionheme

-- Content Proyectos Busqueda

*/

?>



<div class="container">

    <div class="search-news">

        <article>
            
            <ul>                
                <li class="li-search-news"><a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a>
                    <?php 
                        if( blastingexperts_posted_portafolio_line($post->ID) != NULL ) { ?> - <?php echo be_proyectos_lugar($post->ID, 'lugar') ?>            
                    <?php } ?>  	            
                </li>
            </ul>

        </article>

    </div>
    
</div> <!-- container -->