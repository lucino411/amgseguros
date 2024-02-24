
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
        <a href="<?php echo home_url(); ?>"><?php echo apply_filters( 'Inicio Breadcrumb', 'Inicio' ); ?></a>
        <i class="breadcrumb-angle fa-solid fa-angle-right"> /&nbsp;</i>
        <a href="<?php echo home_url(); ?>/?post_type=<?php printf( get_post_type( get_the_ID() ) ); ?>"><?php echo apply_filters( 'Industrias Breadcrumb Categorias', 'Industrias' ); ?></a>	 
        <i class="breadcrumb-angle fa-solid fa-angle-right"> /&nbsp;</i>
        <?php 
		    if( single_term_title()) { ?>                   
				<?php echo single_term_title(); ?>
			<?php } ?>  
      </div>
    </div>		
  </div>	
  
  <main id="main" class=" container site-main latin-news-taxonomy" role="main">			
    <div class="row">
      <div class="col-md-9">
          <header class="archive-header text-center">            
              <h2>
                  <span>
                      <a href="<?php echo home_url(); ?>/?post_type=<?php printf( get_post_type( get_the_ID() ) ); ?>"><?php echo apply_filters( 'Industrias Categorias', 'Industrias' ); ?></a>
                  </span>
              </h2>   
              <h1><?php single_term_title(); ?></h1>
          </header> 
          <?php                    
          if( have_posts() ): 
                while( have_posts() ): the_post();                    
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
          <?php echo be_filter_industria_categories() ?>    
        </div>
      </div>

    </div>
  </main>
</div>


        
<?php get_footer(); ?>