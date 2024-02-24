
<?php /*
	
		@package latincorrosionheme
    
    */
    
    get_header();     
    ?>
        
        
    <!-- NOTICIAS  -->
        
<div id="primary" class="content-area">
  <div class="container-fluid latin-breadcrumb">
    <div class="container">
      <div class="entry-meta"> 
        <a href="<?php echo home_url(); ?>"><?php echo apply_filters( 'Inicio Breadcrumb Categorias', 'Inicio' ); ?></a>
        <i class="breadcrumb-angle fa-solid fa-angle-right"> /&nbsp;          </i>
        <span><?php echo apply_filters( 'Noticias Breadcrumb', 'Noticias' ); ?></span>	         
      </div>
    </div>		
  </div>	
  
  <main id="main" class=" container site-main" role="main">			
    <div class="row">
      <div class="col-md-9">
          <?php
          $args = array(            
            'post_type' => 'noticias',
            'post_status' => 'publish',
            'posts_per_page' => '10',
            'orderby'    => 'modified',
            'orderby'    => 'date',
            // 'order'      => 'DESC',
            'paged' => get_query_var( 'paged' ),
            'tax_query' => array(
              array(
                'taxonomy' => 'clasificacion',
                'field' => 'slug',
                'terms' => array('noticias_fija_news', 'noticias_promocion_news', 'titular'),                
                'operator' => 'NOT IN'
              ),
            ),                              
          );    
          $benews = new WP_Query($args);                   
          if( $benews->have_posts() ): 
                while( $benews->have_posts() ): $benews->the_post();                    
                get_template_part( 'template-parts/content-noticias-destacadas', get_post_format() );  
              endwhile;    
              wp_reset_postdata();
            endif;                    
          ?>  
        <nav class="blog-pagination" aria-label="Pagination">
          <div class="be-pagination">
            <?php echo blastingexperts_paging_nav(); ?>	        
          </div>
        </nav>
      </div>

      <div class="col-md-3 news-taxonomy-archive-noticias">
        <div class="position-sticky" style="top: 4rem;">
          <?php echo be_filter_news_categories() ?>    
        </div>
      </div>

    </div>
  </main>
</div>


        
<?php get_footer(); ?>