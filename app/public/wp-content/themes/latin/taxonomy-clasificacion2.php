
<?php /*
	
    @package blastingexpertstheme Filtro de Noticias
    
    */
    
    get_header(); 
    
    ?>

	<div class="container-fluid be-taxonomy">
    
		<header class="archive-header text-center">            
            <h2>
                <span>
                    <a href="<?php echo home_url(); ?>/?post_type=<?php printf( get_post_type( get_the_ID() ) ); ?>"><?php echo apply_filters( 'Noticias Breadcrumb Categorias', 'Noticias' ); ?></a>
                </span>
            </h2>   
			<h1><?php single_term_title(); ?></h1>
		</header>  	

	</div>

    <main class="container-fluid be-archive-noticias resultado-noticias">    
     
        <div class="row justify-content-center">
            
            <div class="col-12 col-xl-4 pr-md-5 pl-md-5 max-large-medium-screen filtro-noticias">
                <?php 		    
                    $args = array(    
                        'post_type' => 'noticias',
                        'post_status' => 'publish',            
                    );        
                    $benewscategorias = new WP_Query($args);     
                    if( $benewscategorias->have_posts() ):    
                ?>
                    <div class="p-4 card single-product-card">
                        <div class="card-body text-center">
                            <div class="sku-producto">CATEGORIAS</div>
                            <ol class="list-unstyled mb-0">    
                                <?php echo be_filter_news_categories() ?>    
                            </ol>
                        </div>
                    </div>   
    
                    <div class="p-4">         
                        <div class="tagcloud news-tagcloud">
                            <?php echo be_filter_news_tags(); ?>
                        </div>
                    </div>    
                <?php endif;	?>
            
            </div> <!-- col-md-2 -->
    
            <div class="col-12 col-xl-8 be-container-news">

            <!-- Filtro de Noticias -->                
                <div id="primary" class="content-area">

                    <main id="main" class="site-main" role="main">			
                        <div class="row">					
                            <div class="container">
                            
                                <?php                                                                                         
                                    if( have_posts() ):                                        
                                        while( have_posts() ): the_post();                                            
                                            blastingexperts_save_post_views( get_the_ID() );                                            
                                            get_template_part( 'template-parts/content', get_post_format() );                                        
                                        endwhile;                                        
                                    endif;	              
                                
                                ?>						
                        
                            </div><!-- .container -->
                            <div class="container be-pagination">
                                <?php echo blastingexperts_paging_nav(); ?>
                            </div><!-- .container -->
                        </div><!-- .row -->				
                    </main>
                </div><!-- #primary -->
                
            <!-- Fin Filtro de Noticias -->
    
            </div> <!-- col-md-8 -->	
    
        </div><!-- row justify-content-center -->    
    
    </main> <!-- container-fluid -->		

<?php get_footer(); ?>

