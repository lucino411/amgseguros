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
          'post_type' => 'formato',
          'post_status' => 'publish',
          'tax_query' => array(
              array(
                  'taxonomy' => 'referencia',
                  'field' => 'slug',
                  'terms' => 'firstslider'
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
                <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
                
                <?php 
                  if(get_field('slug_redirect')) { ?>
                    <a href="<?php echo esc_url($link); ?>">
                      <?php } else { ?>                
                    <a href="<?php the_permalink(); ?>">
                <?php } ?>

                </a>
                
              </div><!-- carousel-item -->

              <?php $i++; endwhile; wp_reset_postdata(); ?>

              <ol class="carousel-indicators be-front-carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="<?php echo $i == 0 ? 'active' : '' ?>"></li>

                <?php for($j = 1; $j < $novedad_num_posts; $j++ ) { ?>
                  
                  <li data-target="#myCarousel" data-slide-to="<?php echo $j; ?>" class="<?php echo $i == 0 ? 'active' : '' ?>"></li>
                  
                <?php } ?>                
              </ol>


          </div><!-- carousel-inner -->

          <?php } ?>

  </div> <!-- carousel slide -->

</div><!-- carousel-background -->

  <!-- JUMBOTRON Marketing -->

  <div class="jumbotron jumbotron-fluid front-page-jumbotron">
    <h3>Productos Destacados</h3>      
  </div>
 
  <!-- LAST PRODUCTS MARKETING-->

  <div class="container-fluid grid-container blastingexperts-posts-container">

		<div class="row grid-card-marketing justify-content-center">

				<?php
				
				$args = array(  
					'post_type'       => 'portafolio',
					'post_status'     => 'publish',
          'orderby'         => 'modified',
          'order'           => 'DESC',
					'posts_per_page'  => 4,					
				);             
					$beportafolio = new WP_Query($args);
							
					if( $beportafolio->have_posts() ):							
						
						while( $beportafolio->have_posts() ): $beportafolio->the_post();
												
							get_template_part( 'template-parts/content-portafolio', get_post_format() );
						
						endwhile;

					endif;
				
				?>	
			</div> <!-- grid-card-portafolio -->
	
</div> <!-- container-fluid -->	

    <!-- JUMBOTRON Features -->

<div class="jumbotron jumbotron-fluid front-page-jumbotron">
    <h3>Divisiones Principales</h3>      
</div>

    <!-- START THE FEATURETTES -->

<div class="container pb-5">

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
      <a href="<?php echo esc_url( home_url( '/portafolio' )) ?>">
        <div class="col-md-7">
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
        </div>
        <div class="col-md-5">
          <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>         
        </div>
      </a>
    </div> <!-- row featurette -->

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
      </div> <!-- row featurette -->

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
    </div> <!-- row featurette -->

    <?php endwhile; wp_reset_postdata(); ?>  

</div> <!-- container -->

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
          'orderby'         => 'modified',
          'order'           => 'DESC',
        );    
        
        $benews = new WP_Query($args);        
  ?>
  
  <div class="row front-page-news-row">

    <?php while($benews->have_posts()): $benews->the_post(); ?>

      <div class="col-12">

        <div class="row no-gutters flex-md-row border rounded overflow-hidden shadow-sm h-md-250 position-relative front-page-new-tax-card">
          <div class="col d-flex flex-column position-static front-page-card-text">
            <!-- <span class="d-inline-block mb-2 front-page-new-tax"><?php the_tags(''); ?></span> -->
            <a href="<?php the_permalink(); ?>"><h4 class="be-front-news-title"><?php the_title(); ?></h4></a>
            <div class="text-muted be-news-date"><?php the_date( 'd M Y' ); ?></div>
            
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
            <?php the_post_thumbnail(); ?>
          </div> <!-- col-auto d-none d-lg-block -->
        </div> <!-- row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative -->
      </div> <!-- col-md-6 -->

    <?php ; endwhile; wp_reset_postdata(); ?>

  </div> <!-- row front-page-news-row -->

</div> <!-- container-fluid -->

	
<?php get_footer(); ?>

