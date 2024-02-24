
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
        <span><?php echo apply_filters( 'Nosotros Breadcrumb', 'Nosotros' ); ?></span>	         
      </div>
    </div>		
  </div>	
  
  <main id="main" class=" container" role="main">		
    <h3 class="p-4 mb-4 border-bottom text-center">
      <?php echo apply_filters( 'Formulario Contacto', 'Formulario de Contacto' ); ?>
    </h3>
      <span class="newsletter-form"><?php echo do_shortcode('[contact_form]'); ?></span>      			
  </main>
</div>


        
<?php get_footer(); ?>