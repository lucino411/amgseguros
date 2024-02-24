<?php /*
	
@package blastingexpertstheme

*/

get_header(); ?>

<main id="main" role="main">
    
    <div class="container-fluid">
				
    <?php 
        
        if( have_posts() ):
            
            while( have_posts() ): the_post();         
            
                get_template_part( 'template-parts/content-freelance', 'page' );
            
            endwhile;
        
        endif;
    
    ?>	

    </div> <!-- container-fluid -->	

</main>

<?php get_footer(); ?>