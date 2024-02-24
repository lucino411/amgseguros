<?php /*	
@package latincorrosionheme*/
get_header(); 
?>

<div id="primary" class="content-area">
	<div class="container-fluid latin-breadcrumb">
		<div class="container">

			<div class="entry-meta"> 
				<a href="<?php echo home_url(); ?>"><?php echo apply_filters( 'Inicio Breadcrumb', 'Inicio' ); ?></a>
				<i class="breadcrumb-angle fa-solid fa-angle-right"> /&nbsp;</i>
				<a href="<?php echo home_url(); ?>/?post_type=<?php printf( get_post_type( get_the_ID() ) ); ?>"><?php echo apply_filters( 'Proyectos Breadcrumb Lugares', 'Proyectos' ); ?></a>	 
				<i class="breadcrumb-angle fa-solid fa-angle-right"> /&nbsp;</i>
				<?php 
					if( single_term_title()) { ?>                   
						<?php echo single_term_title(); ?>
					<?php } ?>  
			</div>


		</div>		
	</div>	
    <main id="main" class=" container site-main" role="main">			
        <div class="row">
            <div class="col-md-12">   
				<header class="archive-header text-center">
					<h2 class="page-title">Proyectos <?php single_term_title() ?></h2>
				</header>
				<div class="ultimos-proyectos-home">
				<?php 							
					if( have_posts() ):					
						while( have_posts() ): the_post();										
							get_template_part( 'template-parts/content-proyecto' );				
						endwhile;
						wp_reset_query();
					endif;		
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