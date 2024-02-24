<?php
/*	
@package latincorrosionheme-- Template for Noticias Post
*/
?>



<div class="col-md-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('reveal h-main-industry'); ?>>  
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <header>	  
                <span class="h-main-category-industry">
                    <?php 				
                        if( latincorrosion_industrias_titular_category($post->ID, 'latinindustrias') != NULL ) {				
                            echo '' . latincorrosion_industrias_titular_category($post->ID, 'latinindustrias'); 
                        }										
                    ?>   
                </span>   
                <?php the_title( '<h3 class="mb-0"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h3>'); ?>             
                <div class="blog-post-meta">                
                    <?php if( latincorrosion_noticias_clasificacion($post->ID, 'tagsindustrias') != NULL ) { ?>                         
                        <?php echo latincorrosion_noticias_clasificacion($post->ID, 'tagsindustrias') ?>
                    <?php } ?>  
                </div>	           
            </header>

          <p class="card-text mb-auto"><?php echo get_the_excerpt(); ?></p>
        </div>
      
        <div class="col-auto d-none d-lg-block h-main-industry-image">
            <img  preserveAspectRatio="xMidYMid slice" focusable="false" src="<?php echo latincorrosion_get_attachment(); ?>" alt="<?php the_title(); ?>" loading="lazy">	
        </div>

      </div>
    </article>
</div>
