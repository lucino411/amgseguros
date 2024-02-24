<?php

/*
	
@package blastingexpertstheme
-- Freelance Template

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div>
		<header class="archive-header text-center">
            <h1><?php the_title(); ?></h1>
        </header>
	</div>				
	
	<div class="entry-content clearfix">
		
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->
	
</article>