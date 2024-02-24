<?php /*
	
@package blastingexpertstheme

*/

get_header(); ?>
	
<div class="container-fluid blastingexperts-posts-container">
				
    <?php 
        
        if( have_posts() ):
            
            while( have_posts() ): the_post();         
                
                get_template_part( 'template-parts/content-contacto', 'page' );
            
            endwhile;
            
        endif;
                        
    ?>	

</div> <!-- container-fluid -->	
	
<?php get_footer(); ?>