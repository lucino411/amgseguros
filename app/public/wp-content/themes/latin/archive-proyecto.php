<?php /*
	
		@package latincorrosionheme

*/

get_header(); 

?>

<div id="primary" class="content-area">

  <div class="container-fluid latin-breadcrumb">
    <div class="container">
      <div class="entry-meta"> 
        <a href="<?php echo home_url(); ?>"><?php echo apply_filters( 'Inicio Breadcrumb Categorias', 'Inicio' ); ?></a>
        <i class="breadcrumb-angle fa-solid fa-angle-right"> /&nbsp;          </i>
        <span><?php echo apply_filters( 'Proyectos Breadcrumb', 'Proyectos' ); ?></span>	         
      </div>
    </div>		
  </div>	

    <main id="main" class=" container site-main" role="main">			
        <div class="row">
            <div class="col-md-12">          
                <div class="ultimos-proyectos-home">
                    <?php 							
                    $args = array(
                        'post_type' => 'proyecto',
                        'post_status' => 'publish',
                        'orderby'    => 'modified',
                        'order'      => 'DESC',
                        'paged' => get_query_var( 'paged' )                  
                    );   
                    $beproyectos = new WP_Query($args); 
                    if( $beproyectos->have_posts() ):          
                        while( $beproyectos->have_posts() ): $beproyectos->the_post();			
                        get_template_part( 'template-parts/content-proyecto' );
                    endwhile;
                    endif; 
                    wp_reset_query();
                    ?>
                </div>
                <div class="container be-pagination">
                    <?php echo blastingexperts_paging_nav(); ?>
                </div>
            </div>
        </div>		
    </main>		

</div>

<?php get_footer(); ?>