<?php

/*
	
@package latincorrosionheme-- Standard Post Format

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="clearfix">

    <div class="flip-card">

        <div class="flip-card-inner archive-portafolio-card">

            <section class="flip-card-front">
                
                <div class="card-header">                                        
                    <?php if( get_field('imagen_miniatura_frontal') ) { ?>
                        
                        <img src="<?php the_field('imagen_miniatura_frontal'); ?>" alt="<?php the_title(); ?>" class="card-img-top img-fluid" width="438" height="285" loading="lazy">

                    <?php } else {  ?>

                        <img src="<?php echo get_template_directory_uri() . '/img/default-image.jpg'; ?>" alt="thumbnail" width="438" height="285" class=img-fluid loading="lazy">

                    <?php }  ?>     	                        
                </div>

                <div class="card-body">
                    <h4 class="card-title"><?php echo ((strlen(get_the_title()) > 66) ? (substr(get_the_title(), 0, 66) . ' ...') : get_the_title())?></h4>                    

                    <?php if( get_field('product_made_in') ): ?>
                        <div class="badge badge-secondary">
                            <?php 
                                if( be_posted_portafolio_marca_sin_link($post->ID, 'marca') != NULL ) {                                                    
                                    echo be_posted_portafolio_marca_sin_link($post->ID, 'marca') . '&nbsp;&nbsp;|&nbsp;&nbsp;'; 
                                }                  
                            ?>
                            <?php the_field('product_made_in'); ?>
                            
                        </div>
					<?php endif; ?>
                    <p>
                        <?php
                            $excerpt = get_the_excerpt();                        
                            $excerpt = substr($excerpt, 0, 280);
                            $result = substr($excerpt, 0, strrpos($excerpt, ' ')) . ' ...';
                            echo $result;
                        ?>
                    </p>
                </div> <!-- card-body -->     
                
                <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark" class="btn-card-portafolio">Ver más</a> 
                
            </section> <!-- flip-card-front -->
            
            <section class="flip-card-back">
                
                <div class="card-header">                                      
					<?php if( get_field('imagen_miniatura_trasera') ) { ?>
                        
                        <img src="<?php the_field('imagen_miniatura_trasera'); ?>" alt="<?php the_title(); ?>" class="card-img-top img-fluid" width="438" height="285" loading="lazy">

                    <?php } else {  ?>

                        <img src="<?php echo get_template_directory_uri() . '/img/default-image.jpg'; ?>" alt="thumbnail" width="438" height="285" class="img-fluid" loading="lazy">

                    <?php }  ?>                                       
                </div>

                <div class="card-body">                    
                    <?php if( get_field('encabezados_producto') ):                     

                        // echo ((strlen(get_field('encabezados_producto')) > 700) ? (substr(get_field('encabezados_producto'), 0, 700) . ' ...') : get_field('encabezados_producto'));
                        echo ((strlen(get_field('encabezados_producto')) > 685) ? (substr(get_field('encabezados_producto'), 0, 685) . ' ...') : get_field('encabezados_producto'));

                    endif; ?>                               
                </div><!-- card-body -->    
                
            </section> <!-- flip-card-back -->            
            
        </div> <!-- flip-card-inner archive-portafolio-card -->
        

    </div> <!-- flip-card -->

</article>



		
		

		


	
