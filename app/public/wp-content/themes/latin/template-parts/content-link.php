<?php

/*
	
@package blastingexpertstheme
-- Link Post Format

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blastingexperts-format-link' ); ?>>
	
	<header class="entry-header text-center">
		
		<?php 
			$link = blastingexperts_grab_url();
			the_title( '<h1 class="entry-title"><a href="' . $link . '" target="_blank">', '<div class="link-icon"><span class="blastingexperts-icon blastingexperts-link"></span></div></a></h1>'); 
		?>
		
	</header>

</article>