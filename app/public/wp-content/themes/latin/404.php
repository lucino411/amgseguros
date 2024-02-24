<?php /*
	
@package latincorrosionheme
*/

get_header(); 

?>

<div class="container mt-5">
    <div id="content" class="site-content" role="main">

        <header class="page-header">
            <h1 class="page-title mb-3"><?php _e( 'No existe', 'blastingexperts' ); ?></h1>
        </header>

        <div class="page-wrapper">
            <div class="page-nofound">
                <h2 class="mb-3"><?php _e( 'Oops! Esto es algo vergonzoso, ¿No es cierto?', 'blastingexperts' ); ?></h2>
                <h4><label for="search-addon"><?php _e( 'Parece que no se encontró nada en esta ubicación. ¿Quizás intentar una búsqueda?', 'blastingexperts' ); ?></label></h4>

                <form action="/" method="get">
                    <div class="input-group">
                        <input type="text" name="s" id="search-addon" value="<?php the_search_query(); ?>" class="form-control" placeholder="Buscar" aria-label="Search" />
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="blastingexperts-icon blastingexperts-search"></i>
                        </span>
                        <!-- <button type="button" class="btn btn-blastingexperts btn-lg mt-3">BUSCAR</button> -->
                    </div>
                </form>

            </div><!-- .page-nofound -->
        </div><!-- .page-wrapper -->

    </div><!-- #content -->

</div> <!-- container-fluid -->				
		
<?php get_footer(); ?>