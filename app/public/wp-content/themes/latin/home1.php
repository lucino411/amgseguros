<?php /*
	
@package blastingexpertstheme

*/

get_header(); ?>


<!-- Front Carousel -->

<div class="container-fluid carousel-background">
  <!-- <div id="myCarousel" class="carousel slide carousel-fade be-front-carousel" data-ride="carousel"> -->
  <div id="myCarousel" class="carousel slide be-front-carousel" data-ride="carousel">
    
    <?php     
                
        $args = array(
          'post_type'       => 'formato',
          'post_status'     => 'publish',
          'posts_per_page'  => 5,
          'orderby'         => 'modified',
          'order'           => 'DESC',
          'tax_query'       => array(
              array(
                  'taxonomy'  => 'referencia',
                  'field'     => 'slug',
                  'terms'     => 'firstslider'
              ),
          ),
        );
        
        $i = 0;
        $novedad = new WP_Query($args);
        $novedad_num_posts = $novedad->found_posts; 

        if(count($novedad->posts) != 0 ) {

    ?>
          <div class="carousel-inner be-front-carousel-inner">

            <?php while($novedad->have_posts()): $novedad->the_post(); ?>

              <?php 
                  if( get_field('slug_redirect') ): 
                      $slug = get_field('slug_redirect');
                      $link = get_term_link($slug, 'marca');
                  endif;           
              ?>
              <div class="carousel-item be-front-carousel-item <?php echo $i == 0 ? 'active' : '' ?>">                
                
                <?php 
                  if(get_field('slug_redirect')) { ?>
                    <a href="<?php echo esc_url($link); ?>">
                  <?php } else { ?>                
                     <a href="#">
                     <!-- <a href="<?php the_permalink(); ?>">    -->                      
                          <?php the_post_thumbnail('slider-principal') ?><?php } ?>
                     </a> 
                
              </div><!-- carousel-item -->


              <?php $i++; endwhile; wp_reset_postdata(); ?>

              <ol class="carousel-indicators be-front-carousel-indicators">
                
                <li data-target="#myCarousel" data-slide-to="0" class="active <?php  echo $i == 0 ? 'active' : '' ?>"></li>

                <?php for($j = 1; $j < $novedad_num_posts; $j++ ) { ?>
                  
                  <li data-target="#myCarousel" data-slide-to="<?php echo $j; ?>" class="<?php echo $i == 0 ? 'active' : '' ?>"></li>
                  
                <?php } ?>                
              </ol>

          </div><!-- carousel-inner -->

          <?php } ?>

          <?php wp_reset_query(); ?>        

  </div> <!-- carousel slide -->

</div><!-- carousel-background -->      



  <!-- JUMBOTRON FEATURED PRODUCTS -->

  <div class="jumbotron jumbotron-fluid front-page-jumbotron">
    <h3>Productos Destacados</h3>      
  </div>
 
  <!-- FEATURED PRODUCTS-->

  <div class="container-fluid grid-container blastingexperts-posts-container">

		<div class="row grid-card-marketing justify-content-center">

				<?php
				
          $args = array(  
            'post_type'       => ['beabrasivo', 'bebmya', 'begranalladoras', 'behidrolavadoras', 'beimyc', 'belaser', 'beppe', 'besecydeshum', 'bewaterjetting'],
            'post_status'     => 'publish',
            'orderby'         => 'modified',
            'order'           => 'DESC',
            'posts_per_page'  => 4,
            'tax_query' => array(
                              array(
                                  'taxonomy' => 'condicion',
                                  'field' => 'slug',
                                  'terms' => 'producto_destacado'      
                              ),
                          ),            					
            );             
            $beProductoDestacado= new WP_Query($args);
                
            if( $beProductoDestacado->have_posts() ):							
              
              while( $beProductoDestacado->have_posts() ): $beProductoDestacado->the_post();
                          
                get_template_part( 'template-parts/content-portafolio' );
              
              endwhile;

              wp_reset_postdata();

            endif;

            wp_reset_query();
          
				?>	
			</div> <!-- grid-card-portafolio -->
	
</div> <!-- container-fluid -->	



 <!-- JUMBOTRON Features -->

 <div class="jumbotron jumbotron-fluid front-page-jumbotron">
    <h3>Divisiones Principales</h3>      
</div>

    <!-- START THE FEATURETTES -->

<div class="container be-container-featurettes">

  <?php 
      $args = array(
              'post_type' => 'formato',
              'post_status' => 'publish',
              'tax_query' => array(
                  array(
                      'taxonomy' => 'referencia',
                      'field' => 'slug',
                      'terms' => 'features_venta'          
                  ),
              ),
            );

    $beventa = new WP_Query($args);  
      
    while($beventa->have_posts()): $beventa->the_post(); ?>     
       
    <div class="row featurette">
      <a href="<?php echo esc_url( home_url( '/condicion/portafolio' )) ?>">
        <div class="col-md-7">
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
        </div>
        <div class="col-md-5">
          <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>         
        </div>
      </a>
    </div>
    <!-- row featurette -->

    <?php endwhile; wp_reset_postdata(); ?>   

    <hr class="featurette-divider">

    <?php    

      $args = array(
              'post_type' => 'formato',
              'post_status' => 'publish',
              'tax_query' => array(
                  array(
                      'taxonomy' => 'referencia',
                      'field' => 'slug',
                      'terms' => 'features_alquiler'
          
                  ),
              ),
            );

      $bealquiler = new WP_Query($args);  

      while($bealquiler->have_posts()): $bealquiler->the_post(); ?>     
      
      <div class="row featurette">
        <a href="<?php echo esc_url( home_url( '/alquiler' )) ?>">
          <div class="col-md-7 order-md-2">
              <h2><?php the_title(); ?></h2>
              <?php the_content(); ?>
          </div>
          <div class="col-md-5 order-md-1">
              <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>         
          </div>
        </a>
      </div>
      <!-- row featurette -->

      <?php endwhile; wp_reset_postdata(); ?>   

      <hr class="featurette-divider">

      <?php    

            $args = array(
                    'post_type' => 'formato',
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'referencia',
                            'field' => 'slug',
                            'terms' => 'features_capacitacion'
                
                        ),
                    ),
                  );

    $becapacitacion = new WP_Query($args);  
      
    while($becapacitacion->have_posts()): $becapacitacion->the_post(); ?>     
       
    <div class="row featurette">
      <div class="col-md-7">
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
        
      </div>
      <div class="col-md-5">
        <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>         
      </div>
    </div> 
    <!-- row featurette -->

    <?php endwhile; wp_reset_postdata(); ?>  

</div> 
<!-- container -->

<!-- /END THE FEATURETTES -->














 <!-- NEWS -->

  <!-- JUMBOTRON Noticias -->

<div class="jumbotron jumbotron-fluid front-page-jumbotron">
  <h3>Últimas Noticias</h3>      
</div>

<div class="container-fluid container-news">
  
  <?php     
        $args = array(
          'posts_per_page'  => 4,
          'order'           => 'DESC',
          'post_type'       => 'noticias',
          'orderby'         => 'modified',
          'post_status'     => 'publish',
          'tax_query'       => array(
                                      'relation' => 'AND',
                                      array(
                                          'taxonomy' => 'clasificacion',
                                          'field' => 'slug',
                                          'terms' => array('noticias_fija_news'),
                                          'operator' => 'NOT IN'
                                      ),
                                      array(
                                        'taxonomy' => 'post_format',
                                        'field' => 'slug',
                                        'terms' => array('post-format-image', 'post-format-video', 'post-format-link', 'post-format-quote', 'post-format-audio'),
                                        'operator' => 'NOT IN'
                                    ),
                                ),
        );    
        
        $benews = new WP_Query($args);   
        
        // var_dump(count($args));
  ?>
  
  <div class="row front-page-news-row">

    <?php if ( $benews->have_posts() ): while( $benews->have_posts() ): $benews->the_post(); ?>

      <div class="col-12">

        <div class="row no-gutters flex-md-row border rounded overflow-hidden shadow-sm h-md-250 position-relative front-page-new-tax-card">
          <div class="col d-flex flex-column position-static front-page-card-text">
            <!-- <span class="d-inline-block mb-2 front-page-new-tax"><?php the_tags(''); ?></span> -->
            <a href="<?php the_permalink(); ?>"><h4 class="be-front-news-title"><?php echo ((strlen(get_the_title()) > 70) ? (substr(get_the_title(), 0, 70) . '...') : get_the_title())?></h4></a>
            <div class="entry-meta be-news-date">
              <span class="posted-on">Publicado hace <?php echo human_time_diff( get_the_time('U') , current_time('timestamp') ); ?></span>
            </div>            
              <p class="card-text">
                <?php 
                    $excerpt = get_the_excerpt();  
                    $excerpt = substr( $excerpt, 0, 200 ); // Only display first 260 characters of excerpt
                    $result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
                    echo $result . ' [...]';       
                ?>
              </p> 

            <a href="<?php the_permalink(); ?>" class="stretched-link front-page-continuar">Continuar leyendo ></a>
          </div> <!-- col p-4 d-flex flex-column position-static -->
          <div class="col-auto d-none d-md-block d-xl-block benews-thumbnail">

            <?php if( has_post_thumbnail() ): 

              the_post_thumbnail(); 

            else: ?>

              <div class="embed-responsive embed-responsive-1by1">
                  <?php echo blastingexperts_get_embedded_media( array('video','iframe') ); ?>
              </div>

            <?php endif; ?>	  

          </div> <!-- col-auto d-none d-lg-block -->
        </div> <!-- row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative -->
      </div> <!-- col-md-6 -->

    <?php endwhile; wp_reset_postdata(); endif; ?>

  </div> <!-- row front-page-news-row -->

</div> <!-- container-fluid -->

	
<?php get_footer(); ?>
