<?php /*
	
@package blastingexpertstheme

*/

get_header(); ?>	

<div id="primary" class="content-area">
    <main id="main" class="site-main mt-4" role="main">             
        <div class="container-fluid blastingexperts-posts-container">  

            <?php                     
                $args = array(
                    'post_type'     => 'formato',
                    'post_status'   => 'publish',
                    'orderby'       => 'modified',
                    'order'         => 'DESC',
                    'tax_query'     => array(
                                            array(
                                                'taxonomy'  => 'referencia',
                                                'field'     => 'slug',
                                                'terms'     => 'proveedores'                                                
                                            ),
                                    ),
                );
                
                $beproveedores = new WP_Query($args); 
                
                if( $beproveedores->have_posts() ):   
                    ?>       
                    <div class="grid-card-proveedores">

                        <?php while($beproveedores->have_posts()): $beproveedores->the_post(); ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <?php 
                                    $marcaslug = get_field('slug_redirect');
                                    if( $marcaslug ):     
                                        $terms = get_terms('marca');
                                        foreach ($terms as $term ) {
  
                                            if($term->slug == $marcaslug) {
                                                $slug = $marcaslug;               
                                                break 1;
                                            }  else {
                                                $slug = 'rbw';
                                            }
                                        }
                                        $link = get_term_link($slug, 'marca');    
                                    else: 
                                        $link = get_term_link('rbw', 'marca');  
                                    endif; 
                                ?>
                                
                                <div class="grid-item-proveedores">                                    
                                
                                    <a href="<?php if( $link ) { echo esc_url($link); } ?>">
                                        <div class="proveedores-paper-effect">
                                            <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
                                            <div class="proveedores-overlay"></div>
                                        </div>                       
                                    </a>
                                    <h2 class="title-proveedores"><?php the_title(); ?></h2>
                                    <p><?php echo get_the_content(); ?></p>

                                </div><!-- grid-item-proveedores -->                                    

                            </article>

                        <?php endwhile; wp_reset_postdata(); ?>

                    </div> <!-- grid-card-proveedores -->

                <?php endif; ?>                    

        </div><!-- container-fluid -->

    </main>
</div><!-- #primary -->
	
<?php get_footer(); ?>
