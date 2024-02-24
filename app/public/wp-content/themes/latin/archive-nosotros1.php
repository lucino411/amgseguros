<?php /*
	
		@package latincorrosionheme

*/

get_header(); ?>

<!-- PERFIL DE LA EMPRESA -->
  <div id="be-perfil" class="container be-perfil justify-content-center">

        <?php     
            
            $args = array(
                'post_type'     => 'nosotros',
                // 'post_status'   => 'publish',
                'tax_query'     => array(
                                            array(
                                                'taxonomy'  => 'benosotros',
                                                'field'     => 'slug',
                                                'terms'     => 'be_perfil_empresa'
                                            ),
                ),
            );
            
            $perfil = new WP_Query($args);
            
            if(count($perfil->posts) != 0 ) {
                
                while($perfil->have_posts()): $perfil->the_post(); ?>

                    <div class="row">
                        <div class="col-md-5 text-center">
                            <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>         
                        </div>

                        <div class="col-md-7">
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                            
                        </div>
                    </div><!-- row -->    

                <?php endwhile; wp_reset_postdata(); ?>
        
            <?php } wp_reset_query(); ?>                

  </div><!-- container -->  

<!-- MISION - VISION -->

<div class="bg-white">
    <div class="container be-mision-vision">

        <?php  
            $args = array(
                'post_type'     => 'nosotros',
                // 'post_status'   => 'publish',
                'tax_query'     => array(
                            array(
                                'taxonomy'  => 'benosotros',
                                'field'     => 'slug',
                                'terms'     => 'be_mision'            
                            ),
                ),
            );

            $mision = new WP_Query($args);  

            if(count($mision->posts) != 0 ) {
                
                while($mision->have_posts()): $mision->the_post(); ?>     
                    
                    <div class="row">
                        <div class="col-md-7">
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>                            
                        </div>
                        <div class="col-md-5 text-center">
                            <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>         
                        </div>
                    </div> <!-- row -->

                <?php endwhile; wp_reset_postdata(); ?>  

        <?php } ?>        

        <?php
            $args = array(
                    'post_type' => 'nosotros',
                    // 'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'benosotros',
                            'field' => 'slug',
                            'terms' => 'be_vision'
                
                        ),
                    ),
                );

            $vision = new WP_Query($args);  

            if(count($vision->posts) != 0 ) {

            while($vision->have_posts()): $vision->the_post(); ?>     
            
                <div class="row">
                    <div class="col-md-7 order-md-2">
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>                        
                    </div>
                    <div class="col-md-5 order-md-1 text-center">
                        <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>         
                    </div>
                </div> <!-- row featurette -->

            <?php endwhile; wp_reset_postdata(); ?>   

        <?php } wp_reset_query(); ?>                

    </div> <!-- container -->  
</div><!-- bg-white -->

<br>

 <!-- QUIENES SOMOS, QUE HACEMOS, PORQUE NOSOTROS -->

<div id="be-quienes-somos" class="container-fluid be-quienes-somos">
    <div class="row">

        <!-- Quienes Somos -->   
        <?php        
            $args = array(
                'post_type' => 'nosotros',
                // 'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'benosotros',
                        'field' => 'slug',
                        'terms' => 'be_quienes_somos'
                    ),
                ),
            );
            
            $quienes_somos = new WP_Query($args);
            
            if(count($quienes_somos->posts) != 0 ) {
                
                while($quienes_somos->have_posts()): $quienes_somos->the_post(); ?>

                    <div class="col-lg-4">
                        <?php the_post_thumbnail('full', ['class' => 'img-fluid rounded-circle']); ?> 
                        <h2><?php the_title(); ?></h2>                        
                           <p>         
                            <?php 
                                    $excerpt = get_the_excerpt();  
                                    $excerpt = substr( $excerpt, 0, 500 ); // Only display first 260 characters of excerpt
                                    $result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
                                    echo $result . ' [...]';       
                                ?>
                            </p>

                        <a class="btn btn-blastingexperts" href="<?php the_permalink(); ?>" role="button">Ver Más &raquo;</a>

                    </div><!-- /.col-lg-4 -->                

                <?php endwhile; wp_reset_postdata(); ?>
            
            <?php } wp_reset_query(); ?>                

        <!-- Que Hacemos -->
        <?php     
            
            $args = array(
                'post_type' => 'nosotros',
                // 'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'benosotros',
                        'field' => 'slug',
                        'terms' => 'be_que_hacemos'
                    ),
                ),
            );
            
            $quienes_somos = new WP_Query($args);
            
            if(count($quienes_somos->posts) != 0 ) {
                
                while($quienes_somos->have_posts()): $quienes_somos->the_post(); ?>

                    <div class="col-lg-4">
                        <?php the_post_thumbnail('full', ['class' => 'img-fluid rounded-circle']); ?> 
                        <h2><?php the_title(); ?></h2>                        
                        <p>
                            <?php 
                                $excerpt = get_the_excerpt();  
                                $excerpt = substr( $excerpt, 0, 500 ); // Only display first 260 characters of excerpt
                                $result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
                                echo $result . ' [...]';       
                            ?>
                        </p> 

                        <a class="btn btn-blastingexperts" href="<?php the_permalink(); ?>" role="button">Ver Más &raquo;</a>
                    </div>              

                <?php endwhile; wp_reset_postdata(); ?>
            
            <?php } wp_reset_query(); ?>                
                    
        <!-- Porque Nosotros -->
        <?php            
            $args = array(
                'post_type' => 'nosotros',
                // 'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'benosotros',
                        'field' => 'slug',
                        'terms' => 'be_porque_nosotros'
                    ),
                ),
            );
            
            $quienes_somos = new WP_Query($args);
            
            if(count($quienes_somos->posts) != 0 ) {
                
                while($quienes_somos->have_posts()): $quienes_somos->the_post(); ?>

                    <div class="col-lg-4">
                        <?php the_post_thumbnail('full', ['class' => 'img-fluid rounded-circle']); ?> 
                        <h2><?php the_title(); ?></h2>                        
                        <p>
                            <?php 
                                $excerpt = get_the_excerpt();  
                                $excerpt = substr( $excerpt, 0, 500 ); // Only display first 260 characters of excerpt
                                $result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
                                echo $result . ' [...]';       
                            ?>
                        </p> 

                        <a class="btn btn-blastingexperts" href="<?php the_permalink(); ?>" role="button">Ver Más &raquo;</a>
                    </div>              

                <?php endwhile; wp_reset_postdata(); ?>
            
            <?php } wp_reset_query(); ?>                
  
    </div><!-- /.row -->
</div><!-- container-fluid marketing -->

<!-- CAROUSEL NUESTROS CLIENTES-->

<h2 id="be-our-clients" class="entry-title text-center nuestros-clientes">NUESTROS CLIENTES</h2>

<div class="opinion-container-carousel">
    <div id="be-nuestros-clientes" class="carousel slide" data-ride="carousel">
    
            <?php $args = array(
                    'post_type' => 'nosotros',
                    // 'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'benosotros',
                            'field' => 'slug',
                            'terms' => 'be_nuestros_clientes'
                        ),
                    ),
                );

            $i = 0;
            $clientes = new WP_Query($args);
    
            if(count($clientes->posts) != 0 ) { ?>       
                <div class="carousel-inner" role="listbox">
                    <?php while($clientes->have_posts()): $clientes->the_post(); ?>

                        <div class="carousel-item <?php echo $i == 0 ? 'active' : '' ?>">
                            <?php the_content(); ?>
                            <h3><?php the_title(); ?></h3>
                        </div>

                    <?php $i++; endwhile; wp_reset_postdata(); ?>
                </div>
                
                <a class="carousel-control-prev" href="#be-nuestros-clientes" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#be-nuestros-clientes" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            <?php } wp_reset_query(); ?>                

    </div><!-- be-nuestros-clientes --> 

    <!-- Opiniones de Nuestros Clientes --> 

    <div id="be-opiniones-clientes" class="carousel slide max-medium-less-screen" data-ride="carousel">

            <?php $args = array(
                    'post_type' => 'nosotros',
                    // 'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'benosotros',
                            'field' => 'slug',
                            'terms' => 'be_opiniones_clientes'
                        ),
                    ),
                );

            $i = 0;
            $opiniones = new WP_Query($args);

            if(count($opiniones->posts) != 0 ) { ?>       
                <div class="carousel-inner">
                    <?php while($opiniones->have_posts()): $opiniones->the_post(); ?>

                        <div class="carousel-item <?php echo $i == 0 ? 'active' : '' ?>">
                            <?php the_content(); ?>
                            
                            <h3><?php the_title(); ?></h3>
                        </div>

                    <?php $i++; endwhile; wp_reset_postdata(); ?>
                </div>
                
                <a class="carousel-control-prev" href="#be-opiniones-clientes" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#be-opiniones-clientes" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            <?php } wp_reset_query(); ?>                

    </div><!-- be-opiniones-clientes -->    
    
</div><!-- opinion-container-carousel -->

<!-- NUESTRO EQUIPO -->

<!-- <section id="team" class="pb-5 be-nosotros"> -->
<section id="team" class="be-nosotros">
    <!-- <div class="container-fluid grid-container blastingexperts-posts-container"> -->
    <div class="grid-container">
        <h2 id="be-our-team" class="entry-title text-center">NUESTRO EQUIPO</h2><br>
        <div class="grid-card-nosotros justify-content-center">
            <!-- Team member -->
            <?php 
                $argsnosotros = array(
                    'post_type'         => 'nosotros',
					'post_status'       => 'publish',
                    'posts_per_page'    => '-1', // use -1 for all post
                    'order'             => 'DESC',
                    'orderby'           => 'modified',
                    'tax_query'         => array(
                                                array(
                                                        'taxonomy' => 'benosotros',
                                                        'field' => 'slug',
                                                        'terms' => 'be_equipo'
                                                )
                                            ),
                );

                $beequipo = new WP_Query($argsnosotros);

                if(count($beequipo->posts) != 0 ) : 
                
                        while($beequipo->have_posts()): $beequipo->the_post(); ?>

                            <article id="post-<?php the_ID(); ?>" class="nuestro_equipo clearfix">
                                <div class="image-flip" >
                                    <div class="mainflip flip-0">
                                        <div class="frontside">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <p> 

                                                        <?php if ( has_post_thumbnail() ) : 

                                                            $attr = array(
                                                                'class' => 'img-fluid',
                                                                'loading' => 'lazy',
                                                            );
                                                            
                                                            the_post_thumbnail('post-thumbnail', $attr); 
                                                            
                                                        endif; ?>
                                                        
                                                    </p>                                            
                                                    <h4 class="card-title"><?php the_title(); ?></h4>
                                                    <?php if( get_field('team_cargo') ): ?>
                                                        <p class="display-3">
                                                            <?php the_field('team_cargo'); ?>
                                                        </p>
                                                    <?php endif; ?>
                                                    <div class="team-contact-info">             
                                                        <?php if( get_field('team_phone') ): ?>
                                                            <p class="lead">
                                                                <i class="be-icons icon-phone"></i>                                                            
                                                                <?php the_field('team_phone'); ?>
                                                            </p>
                                                        <?php endif; ?>
                                                        <?php if( get_field('team_whatsapp') ): ?>
                                                            <p class="lead">
                                                                <i class="be-icons icon-whatsapp"></i>                                                            
                                                                <?php the_field('team_whatsapp'); ?>
                                                            </p>
                                                        <?php endif; ?>
                                                        <?php if( get_field('team_email') ): ?>
                                                            <p class="lead">
                                                                <i class="be-icons icon-envelop"></i>                                                            
                                                                <?php the_field('team_email'); ?>
                                                            </p>
                                                        <?php endif; ?>                                      
                                                    </div> 
                                                    <div class="the-content">
                                                        <?php if( !empty( get_the_content() )): ?>
                                                            <p class="card-text">                                                    
                                                                <?php echo limit_content(25); ?>
                                                            </p>                                        
                                                        <?php endif; ?>					
                                                    </div>                
                                                    <i class="be-nosotros-arrow bi bi-arrow-up-circle"></i>
                                                </div> <!-- card-body -->                                        
                                            </div> <!--card -->
                                        </div> <!-- backside -->  
                                        <div class="backside">
                                            <div class="card">
                                                <div class="card-body text-center mt-4">
                                                    <h4 class="card-title"><?php the_title(); ?></h4>
                                                        <?php if( get_field('team_experiencia') ): ?>
                                                            <p class="card-text">                                                    
                                                                <?php echo get_field('team_experiencia'); ?>
                                                            </p>  
                                                        <?php endif; ?>					
                                                    <ul class="list-inline">
                                                        <?php if( get_field('team_linkedin') ): ?>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="<?php the_field('team_linkedin'); ?>">
                                                                    <i class="be-icons icon-linkedin2"></i>                                                            
                                                                </a>                                
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if( get_field('team_twitter') ): ?>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="<?php the_field('team_twitter'); ?>">
                                                                    <i class="be-icons icon-twitter"></i>                                                            
                                                                </a>                                
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if( get_field('team_facebook') ): ?>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="<?php the_field('team_facebook'); ?>">
                                                                    <i class="be-icons icon-facebook2"></i>                                                            
                                                                </a>                                
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if( get_field('team_email') ): ?>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="mailto:<?php the_field('team_email'); ?>?Subject=Página Web Blasting Experts">
                                                                    <i class="be-icons icon-envelop"></i>                                                            
                                                                </a>                                
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if( get_field('team_phone') ): ?>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="tel:<?php the_field('team_phone'); ?>">
                                                                    <i class="be-icons icon-phone"></i>                                                            
                                                                </a>                                
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if( get_field('team_whatsapp') ): ?>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="https://api.whatsapp.com/send?phone=<?php the_field('team_phone'); ?>&text=Cotizar%20-%20Solicitar%20Visita/Asesoria" >
                                                                    <i class="be-icons icon-whatsapp"></i>                                                            
                                                                </a>                                
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div> <!-- card-body -->
                                            </div> <!-- card -->
                                        </div> <!-- backside -->                                
                                    </div> <!-- mainflip -->                            
                                </div> <!-- image-flip -->
                                
                            </article>
                        
                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php endif;              
            
                wp_reset_query(); 
            
            ?>               

            <!-- ./Team member -->           

        </div> <!-- grid-card-portafolio -->        
    </div> <!-- container-fluid -->    
</section>
<!-- Team -->

<?php get_footer(); ?>