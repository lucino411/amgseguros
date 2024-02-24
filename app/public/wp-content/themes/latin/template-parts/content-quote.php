<?php

/*
	
@package blastingexpertstheme
-- Quote Post Format

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blastingexperts-format-quote' ); ?>>
	<header class="entry-header text-center">
		
		<div class="row">
			<!-- <div class="col-sm-10 col-md-8 offset-sm-1 offset-md-2"> -->
			<div class="entry-content m-auto">
								
				<h2 class="quote-title"><?php echo wp_trim_words(get_the_title(), 20, '' ) ?></h2>
				
				<p class="quote-author">- <?php echo wp_trim_words(get_the_content(), 20, '' ) ?> -</p>		
			
			</div><!-- .col-md-8 -->
		</div><!-- .row -->
		
	</header>
	
	<hr>
	
	<footer class="entry-footer">
		<?php 				
			if( blastingexperts_posted_portafolio_marca($post->ID, 'tagsnoticias') != NULL ) {				
				echo '<span class="be-icons icon-price-tag"></span> ' . blastingexperts_posted_portafolio_marca($post->ID, 'tagsnoticias'); 
			}										
		?>
	</footer>
	
</article>