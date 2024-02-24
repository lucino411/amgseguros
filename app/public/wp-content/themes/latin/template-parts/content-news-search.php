<?php

/*
	
@package latincorrosionheme-- Template for Search News

*/

?>

<div class="container">

    <div class="search-news">
        
        <article>            

            <ul>                
                <li class="li-search-news">
                    <?php the_title( '<a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a>'); ?>        	            
                </li>
            </ul>
            
        </article>

    </div>
    
</div> <!-- container -->
