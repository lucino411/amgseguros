<?php /*
	
		@package latincorrosionheme

*/

get_header(); ?>

<main role="main" class="container"> 

  <!-- Sponsor Principal jumbotron -->

<?php
  $args = array(            
    'post_type' => 'sponsor',
    'post_status' => 'publish',
    'posts_per_page' => '1',
    'tax_query' => array(
      array(
          'taxonomy' => 'latinsponsor',
          'field' => 'slug',
          'terms' => 'sponsor_principal',
      ),
    ),                              
  );    
  $sponsors = new WP_Query($args);    
  if( $sponsors->have_posts() ):   
    while($sponsors->have_posts()): $sponsors->the_post(); ?>        
        <div class="jumbotron h-main-sponsor">
          <div class="container">
             <?php the_title( '<h3><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h3>'); ?> 
            <p class="lead"><?php echo get_the_excerpt(); ?></p>
          </div>
        </div>
    <?php endwhile; wp_reset_postdata(); ?>   
  <?php endif; ?>     
  <!-- Fin Sponsor Principal - jumbotron -->

  <!-- industrias Titular -->
  <?php
  $args = array(            
    'post_type' => 'industria',
    'post_status' => 'publish',
    'posts_per_page' => '2',
    'tax_query' => array(
      array(
          'taxonomy' => 'latinindustrias',
          'field' => 'slug',
          'terms' => 'industria_titular',
      ),
    ),                              
  );    
  $industrias = new WP_Query($args);    
  if( $industrias->have_posts() ): ?>  
    <div class="row mb-2">
        <?php         
          while($industrias->have_posts()): $industrias->the_post();   
          if( latincorrosion_get_attachment()) {
            get_template_part( 'template-parts/content-industria-titular', get_post_format() );  
          }
          endwhile; wp_reset_postdata(); 
        ?>
      </div>
  <?php  endif; ?>    

  <!-- Fin industrias titular -->



<!-- noticias Titular y noticias mas leidas -->
<?php $args = array(            
  'post_type' => 'noticias',
  'post_status' => 'publish',
  'posts_per_page' => '6',
  // 'orderby'    => 'modified',
  'orderby'    => 'date',
  // 'order'      => 'DESC',
  'tax_query' => array(
        array(
            'taxonomy' => 'clasificacion',
            'field' => 'slug',
            'terms' => 'noticia_titular',                  
        ),
    ),                              
  ); 
  $latintitular = new WP_Query($args);  
  if( $latintitular->have_posts() ): ?>      
    <div class="row g-5">
    <div class="col-md-9">
      <?php while($latintitular->have_posts()): $latintitular->the_post(); 
        if( latincorrosion_get_attachment()) {
          get_template_part( 'template-parts/content-noticias-titular', get_post_format() );  
        }
      endwhile; wp_reset_postdata(); ?>   
    </div>
  <?php endif; ?>     

<!-- Noticias mas leidas -->

<?php
  $popularpost = new WP_Query( array(
      'post_type' => 'noticias',
      'post_status' => 'publish',
      'posts_per_page' => 5,
      'meta_key' => 'post_views_count',
      'orderby' => array(
          'meta_value_num' => 'DESC', // sort by the view count
          'post_modified' => 'DESC', // then sort by the modified date
          'date' => 'DESC', // sort by the date posted
      ),    
  ) );
if ( $popularpost->have_posts() ) : ?>
    <div class="col-md-3">
      <div class="position-sticky home-news-read" style="top: 4rem;">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
          <?php echo apply_filters( 'Noticias mas vistas Home', 'Noticias mas Leidas' ); ?>
        </h3>
            <?php while ( $popularpost->have_posts() ) : $popularpost->the_post();
                $views = get_post_meta( get_the_ID(), 'post_views_count', true ); // Get the view count for the current post
                printf($views);
                get_template_part( 'template-parts/content-noticias-leidas');
            endwhile; wp_reset_postdata(); ?>            
          </div>
    </div>

  </div>
  <br><br>
<?php endif; ?>      

<!-- noticias titular y noticias mas leidas -->

<!-- Ultimos Proyectos -->
<?php 							
  $args = array(
    'post_type' => 'proyecto',
    'post_status' => 'publish',
    'posts_per_page' => '3',
    'orderby'    => 'modified',
    'order'      => 'DESC',
  );   
  $beproyectos = new WP_Query($args); 
  if( $beproyectos->have_posts() ):          
?>
  <div class="row g-5">
    <div class="col-md-12">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
        <?php echo apply_filters( 'Ultimos Proyectos Home', 'Ultimos Proyectos ' ); ?>
      </h3>
      <div class="ultimos-proyectos-home">
        <?php while( $beproyectos->have_posts() ): $beproyectos->the_post();		
            get_template_part( 'template-parts/content-proyecto' );
        endwhile; ?>        
      </div>
    </div>
  </div>  
  <br><br>
<?php endif; 
wp_reset_query();
?>
  <!-- <hr> -->

<!-- Ultimos Proyectos -->





<!-- --------------------------------------- START SPONSORS --------------------------------------- -->

<?php $args = array(
    'post_type' => 'sponsor',
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'latinsponsor',
            'field' => 'slug',
            'terms' => 'sponsor_principal',
            'operator' => 'NOT IN'
        ),
    ),                  
  );
  $i = 0;
  $sponsors = new WP_Query($args);            
  if(count($sponsors->posts) != 0 ) { ?> 
  <div class="row g-5">
    <div class="col-md-12 latin-main-sponsors">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
        <?php echo apply_filters( 'Sponsors Home', 'Sponsors' ); ?>
      </h3>
      <div class="sponsors-container-carousel">
        <?php if(count($sponsors->posts) > 1 ) { ?>      
          <a class="carousel-control-prev" href="#latincorrosion-sponsors-<?php the_ID(); ?>" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>    
          <a class="carousel-control-next" href="#latincorrosion-sponsors-<?php the_ID(); ?>" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>   
        <?php } ?> <!-- if count sponsors > 0 -->  
        <div id="latincorrosion-sponsors-<?php the_ID(); ?>" class="carousel slide max-medium-less-screen" data-ride="carousel">        
            <div class="carousel-inner">
                <?php while($sponsors->have_posts()): $sponsors->the_post(); ?>                      
                    <div class="carousel-item <?php echo $i == 0 ? 'active' : '' ?>">                          
                      <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
                      <p><?php echo limit_content( 20 ); ?></p>                        
                    </div>                          
                <?php $i++; endwhile; wp_reset_postdata(); ?>
            </div>                    
        </div><!-- latincorrosion-sponsors -->                 
      </div>  <!-- sponsors-container-carousel -->
    </div>
  </div>
<?php } ?> <!-- if count sponsors != 0 -->                      
                  

  <!-- -------------------------- /END SPONSORS ---------------------------------- -->


  <br><br><br>

<!-- Noticias Destacadas -->
<?php
  $args = array(            
    'post_type' => 'noticias',
    'post_status' => 'publish',
      'posts_per_page' => '10',
      // 'orderby'    => 'modified',
      'orderby'    => 'date',
      // 'order'      => 'DESC',
      'tax_query' => array(
        array(
            'taxonomy' => 'clasificacion',
            'field' => 'slug',
            'terms' => array('noticias_fija', 'noticias_promocion', 'noticia_titular'),
            'operator' => 'NOT IN'
        ),
    ),                              
  );    
  $benews = new WP_Query($args);    
  if( $benews->have_posts() ):   
?>
<div class="row g-5">
    <div class="col-md-9">
    <h3 class="pb-4 mb-4 fst-italic border-bottom">
      <?php echo apply_filters( 'Noticias Destacadas Home', 'Noticias Destacadas ' ); ?>
    </h3>
    <?php 
        while( $benews->have_posts() ): $benews->the_post();                    
          if( latincorrosion_get_attachment() ) {
            get_template_part( 'template-parts/content-noticias-destacadas' );  
          }
        endwhile;    
        wp_reset_postdata();
    ?>  
    </div>
    <div class="col-md-3">
      <div class="position-sticky categorias-news-home" style="top: 4rem;">
        <?php echo be_filter_news_categories() ?>    
      </div>
    </div>
  </div>
<br><br><br><br>
<?php endif; ?>
<!-- <hr> -->

<!-- FIN Noticias Destacadas -->












 <!-- NOTICIAS VIDEO -->

<?php     
  $args = array(
    'post_type'       => 'noticias',
    'posts_per_page'  => 7,
    'order'           => 'DESC',
    'orderby'         => 'modified',
    'post_status'     => 'publish',
    'tax_query'       => array(
      // 'relation' => 'AND',
      // array(
          'taxonomy' => 'clasificacion',
          'field' => 'slug',
          'terms' => array('noticias_fija_news', 'titular'),
          'operator' => 'NOT IN'
      // ),
    //   array(
    //     'taxonomy' => 'post_format',
    //     'field' => 'slug',
    //     'terms' => array('post-format-image', 'post-format-link', 'post-format-quote', 'post-format-audio'),
    //     'operator' => 'NOT IN'
    // ),
),
  );          
$benews = new WP_Query($args);   
  
if ( $benews->have_posts() ): 
?>

 <div class="row g-5">
    <div class="col-md-12">
        <div class="row front-page-news-videos">
          <?php while( $benews->have_posts() ): $benews->the_post();               
                if( get_field('video_noticias') ):    ?>             
                <div class="row no-gutters flex-md-row border rounded overflow-hidden shadow-sm h-md-250 position-relative front-page-new-tax-card">
                  <div class="col d-flex flex-column position-static front-page-card-text benews-thumbnail">
                    <a href="<?php the_permalink(); ?>"><h4 class="be-front-news-title"><?php echo ((strlen(get_the_title()) > 70) ? (substr(get_the_title(), 0, 70) . '...') : get_the_title())?></h4></a>
                    <div class="entry-meta be-news-date">
                      <span class="posted-on">Publicado hace <?php echo human_time_diff( get_the_time('U') , current_time('timestamp') ); ?></span>
                    </div>         
                      <div class="embed-responsive embed-responsive-1by1 h-news-grid-video">
                          <?php the_field('video_noticias'); ?>
                      </div>
                  </div>
                </div>
              <?php endif; ?>	 
          <?php endwhile; wp_reset_postdata(); ?>
    </div>
   </div>
  </div>
  <br><br>

<?php endif; ?>

<!-- fin News -->

<!-- ------------------------------  NO SE LO PIERDA --------------------------------------------------- -->
   <?php 		    
    $args = array(      
      'post_type' => 'evento',
      'post_status' => 'publish',
      'posts_per_page'  => 1,
      'tax_query' => array(
        array(
          'taxonomy' => 'latinevento',
          'field' => 'slug',
          'terms' => 'evento_no_perder'
        ),
      ),      
    );    
    
    $latinnewfija = new WP_Query($args); 
    ?>

  <?php    
  if( $latinnewfija->have_posts() ):  
  ?>
  <div class="row">
    <div class="col-md-12"> 
      <div class="jumbotron jumbotron-fluid latin-jumbotron-news h-evento-titular">
          <div class="container">
            <?php while( $latinnewfija->have_posts() ): $latinnewfija->the_post();	             
              get_template_part( 'template-parts/content-evento-home' );                                         
            endwhile; wp_reset_postdata(); ?>
        </div>              
      </div>
    </div>
  </div>
  <?php endif; ?>
  <!-- ------------------------------------- /FIN NO PERDER ------------------------------------------------ -->

	


 </main>


<?php get_footer(); ?>
