<?php 
	
	/*
		This is the template for the index
		
		@package latincorrosionheme
	*/
	
get_header(); ?>

    <main id="main" class="site-main mt-4" role="main">

        
        <div class="container blastingexperts-posts-container be-post-noticias">
            
            <?php 

                $args = array(
                    'post_type'       => 'publicacion',
                    'orderby'    => 'modified',
                    'order'      => 'DESC'                    
                );    

                $bepublicaciones = new WP_Query($args); 
                
                if( $bepublicaciones->have_posts() ):

                    echo '<div class="page-limit" data-page="/' . blastingexperts_check_paged() . '">';
                    
                        while( $bepublicaciones->have_posts() ): $bepublicaciones->the_post();		
                        
                            // get_template_part( 'template-parts/content-publicaciones', get_post_format() );
                            get_template_part( 'template-parts/content-publicaciones'  );
                        
                        endwhile;

                    echo '</div>';
                    
                endif;
                
            ?>
            
        </div><!-- .container -->

        <div class="container be-pagination">
		    <?php echo blastingexperts_paging_nav(); ?>	
	    </div><!-- .container -->	

    </main>
    
<?php get_footer(); ?>