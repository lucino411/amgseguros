<?php 	
	/*
		This is the template for the footer
		
		@package latincorrosionheme
	*/	
?>
    <!-- Botón WhatsApp Flotante 20191125-->
    <!-- <address class="cotizar-flotante max-small-screen">
      <label class="share-bar">
        <input type="checkbox" checked />
        <div class="btn-share">
          <p>Cotizar</p>
        </div>
        <div tabindex="1" class="share-list">
          <ul>
            <li>
              <a target="_blank" href="https://api.whatsapp.com/send?phone=19055410997&text=Cotizar%20-%20Solicitar%20Visita/Asesoria" data-toggle="tooltip" title="Whatsapp"><i class="bi bi-whatsapp wasap"></i></a>
            </li>
            <li>
              <a target="_blank" href="https://telegram.im/@Blastingexperts" data-toggle="tooltip" title="Telegram"><i class="bi bi-telegram"></i></a>
            </li>
          </ul>
        </div>
      </label>
  </address> -->
    <!-- Fin Botón WhatsApp Flotante 20191125-->

    

<button id="scroll-to-top">
<i class="bi bi-chevron-up"></i>
</button>
    
<footer class="container blastingexperts-footer text-small">      
  <hr class="be-footer-divline">
 <div class="row g-5">
        <?php        
          wp_nav_menu(
            array(
              'theme_location' => 'footer1',
              // 'container_class' => 'latin-menu-footer col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2',
              'container_class' => 'latin-menu-footer col-md-3',
              'container' 		=> 'div',
              )
            );      
            ?>                 
        <!--/.First column--> <!--Second column-->        
        <?php        
          wp_nav_menu(
            array(
                'theme_location' => 'footer2',
                // 'container_class' => 'latin-menu-footer col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2',
                'container_class' => 'latin-menu-footer ol-md-3',
                'container' 		=> 'div',
                )
              );      
              ?>
        <!--/.Second column--> <!--Third column-->        
        <?php        
          wp_nav_menu(
            array(
              'theme_location' => 'footer3',
              // 'container_class' => 'latin-menu-footer col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2',
              'container_class' => 'latin-menu-footer col-md-3',
              'container' 		=> 'div',
              )
            );      
            ?>
        <!--/.Third column--> <!--Fourth column-->
        <?php        
          wp_nav_menu(
            array(
              'theme_location' => 'footer4',
              // 'container_class' => 'latin-menu-footer col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2',
              'container_class' => 'latin-menu-footer col-md-3',
              'container' 		=> 'div',
              )
            );      
            ?>
        <!--/.Fourth column--> <!--Fifth column-->        
  </div> <!--/.row-columns-->    
  
  <div class="row mb-5 w-100 m-auto sections-footer">      
    <div class="col-md-6 col-lg-3">
      <hr class="be-footer-line">
      <h4>Documentos</h4>
      <ul class="text-small">
        <li><a  href="#">Boletines Técnicos</a></li>
        <li><a href="#">BlastNews</a></li>
      </ul>
    </div>

    <div class="col-md-6 col-lg-3 no-small-screen">      
      <hr class="be-footer-line">
      <a href="<?php echo esc_url( home_url( '/latinsponsors' )) ?>"><h4>Sponsors</h4></a>
      <!-- <ul class="list-unstyled text-small"> -->
      <ul class="">
        <li><a href="<?php echo esc_url( home_url( '/latinsponsor/sponsor_gold' )) ?>">Gold</a></li>
        <li><a href="<?php echo esc_url( home_url( '/latinsponsor/sponsor_silver' )) ?>">Silver</a></li>
        <li><a href="<?php echo esc_url( home_url( '/latinsponsor/sponsor_bronze' )) ?>">Bronze</a></li>
      </ul>
    </div>

    <div class="col-md-6 col-lg-3 be-social-footer">
      <hr class="be-footer-line">
      <h4>Síguenos</h4>
      <br>
      <a href="https://twitter.com/blastingexperts" data-toggle="tooltip" title="Síguenos en Twitter" target="_blank" class="social"><span class="blastingexperts-icon-sidebar be-icons icon-twitter"></span></a>
      <a href="https://www.facebook.com/BlastingExpertsLtda/" data-toggle="tooltip" title="Síguenos en Facebook" target="_blank" class="social"><span class="blastingexperts-icon-sidebar be-icons icon-facebook2"></span></a>
      <a href="https://www.instagram.com/blastingexperts/" class='instagram-footer' data-toggle="tooltip" title="Síguenos en Instagram" target="_blank" class="social"><span class="blastingexperts-icon-sidebar bi bi-instagram"></span></a>
      <a href="https://www.youtube.com/user/blastingexperts" data-toggle="tooltip" title="Suscríbete a nuestro canal de Youtube" target="_blank" class="social"><span class="blastingexperts-icon-sidebar be-icons icon-youtube2"></span></a>
      <a href="https://www.linkedin.com/company/2420546/admin/" data-toggle="tooltip" title="Síguenos en Linkedin" target="_blank" class="social"><span class="blastingexperts-icon-sidebar be-icons icon-linkedin2"></span></a>
    </div>    

    <div class="col-md-6 col-lg-3">
      <hr class="be-footer-line">
      <h4 class="no-small-screen">Newsletter</h4>
      <!-- <ul class="latin-nesletter list-unstyled text-small"> -->
      <ul class="latin-newsletter">
        <li class="newsletter-subscribe">Suscríbete al Newsletter</li>
        <li class="newsletter-form"><?php echo do_shortcode('[newsletter_form]'); ?></li>
      </ul>            
    </div>         
  </div>

  <hr>

  <div class="col-12">
    <p class='text-muted small pb-5 mb-0 text-center'>
            Copyright © 2022 latin Chapter Colombia
            <a href="privacy-policy" alt="website privacy policy">Privacy Policy</a>   |   <a href="terms-of-use" alt="website terms of use" class="footer-link-red">Terms of Use</a>                            
    </p>
  </div>

</footer>






















    <!-- Barra de informacion -->

    <!-- <nav class="navbar navbar-expand-sm navbar-dark justify-content-center fixed-bottom be-status-bar">		 -->
    <!-- <nav class="navbar navbar-expand-sm navbar-dark fixed-bottom be-status-bar">		

          <a class="min-small-plus" target="_blank" href="https://telegram.im/@Blastingexperts" data-toggle="tooltip" title="Telegram">
            <span class="navbar-text bi bi-telegram"></span>
          </a>
      
          <a class="min-small-plus" target="_blank" href="https://api.whatsapp.com/send?phone=19055410997&text=Cotizar%20-%20Solicitar%20Visita/Asesoria" data-toggle="tooltip" title="Whatsapp">
            <span class="navbar-text bi bi-whatsapp"></span>
          </a>

          <a class="navbar-brand max-extra-large-screen" href="<?php echo esc_url( home_url()) ?>">
            <span class="">Blasting Experts</span>
          </a>
          <a href="tel:+1-905-541-0997" class="max-medium-less-screen">
            <span class="navbar-text">Tel: +1 905 541 0997</span> 
          </a>
          <a href="tel:57-(1)-704-5000" class="max-medium-less-screen">
            <span class="navbar-text">PBX: 57 (1) 704 5000</span>
          </a>
          <a href="mailto:ingenieria@blastingexperts.com?Subject=Página Web Blasting Experts" target="_blank" class="max-large-medium-screen">
            <span class="navbar-text ">ingenieria@blastingexperts.com</span>
          </a>
          <a href="mailto:ventas@blastingexperts.com?Subject=Página Web Blasting Experts" target="_blank" class="max-small-screen">
            <span class="navbar-text">ventas@blastingexperts.com</span> 
          </a>

          <a class="js-toggleSidebar be-status-bar-search">
            <span class="navbar-text be-icons icon-menu"></span>
          </a>

    </nav> -->

    <?php wp_footer(); ?>

    
  </body>
</html>