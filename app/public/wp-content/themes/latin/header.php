<?php 
	
	/*
		This is the template for the header
		
		@package latincorrosiontheme
	*/
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html <?php language_attributes(); ?>>
	<head>
		<title><?php bloginfo( 'name' ); wp_title(); ?></title>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
		
		<?php 
			$custom_css = esc_attr( get_option( 'blastingexperts_css' ) );
			if( !empty( $custom_css ) ):
				echo '<style>' . $custom_css . '</style>';
			endif;
		?>

		<!-- Previene que indexadores como Google.com indexen la pagina de respaldo, quitarlo para la pagina Live -->
		<meta name="robots" content="noindex">


		<!-- Global site tag (gtag.js) - Google Analytics -->
		<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-102539480-2"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-102539480-2');
		</script> -->

		<!-- Global site tag (gtag.js) - Google Ads: 10897693065 -->
		<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10897693065"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'AW-10897693065');
		</script> -->
		
	</head>

	<body <?php body_class(); ?>>
		<div class="blastingexperts-sidebar sidebar-closed">			
			<div class="blastingexperts-sidebar-container">			
				<a class="js-toggleSidebar sidebar-close-icon">
					<span class="bi bi-x-circle-fill"></span>
				</a>			
				<div class="sidebar-scroll">				
					<?php get_sidebar(); ?>				
				</div>		
			</div>			
		</div>

		<!-- sidebar fade background and stop scroll -->		
		<div class="sidebar-overlay js-toggleSidebar"></div>
		
		<div class="container-fluid">		
			<div class="row">
				<header class="header-container be-header background-image text-center header-megamenu">									
					<span class="be-custom-logo">
						<?php 	
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' ); 
						?>
						<a href="<?php echo esc_url( home_url()) ?>"> 
							<?php
								if ( has_custom_logo() ) {  ?>
									<?php 
									// echo '<img src="' . esc_url( $custom_logo_url ) . '" width="523" height="127" alt="Blasting Experts" loading="lazy">'; 
									echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="Blasting Experts" loading="lazy">'; 
								} else {
									echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
								}
							?>
						</a>
					</span>
				</header><!-- .header-container -->		
				
				

				<?php if( has_nav_menu( 'primary' ) ) { ?>									
					<nav id="topNav" class="navbar-blastingexperts navbar navbar-expand-lg" role="navigation">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarslatin" aria-controls="navbarslatin" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>	
						<a class="latincorrosion-nav-icon">
							<img src="https://respaldo.latincorrosion.com/wp-content/uploads/2023/03/latincorrosion_icon.png" alt="">
						</a>	
						<a class="js-toggleSidebar sidebar-open">
							<span class="bi bi-list leftsidebar-open-icon"></span>
						</a>	
						
						<div class="be-walker navbar-collapse collapse justify-content-center" id="navbarsbe">
						<?php
							wp_nav_menu( array(
								'theme_location'    => 'primary',
								'menu_id'        	=> 'primary-menu',
								'container' 		=> false,
								'menu_class' 		=> 'navbar-nav',
								'walker' 			=> new bemegamenu\core\walkernav()							
								) );	
						?>
						</div>
						<!-- GTranslate: https://gtranslate.io/ -->
						<span class="gtranslate">
							<?php echo do_shortcode('[gtranslate]'); ?>							
						</span>
					</nav>			
				<?php } ?>
				
			</div><!-- .row -->
		</div><!-- .container-fluid -->