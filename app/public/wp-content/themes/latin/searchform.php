<form action="/" method="get" class="search-form-portafolio">
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Buscar Producto …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Buscar por:', 'label' ) ?>" />
        <input type="hidden" name="post_type[]" value="portafolio" />
        <input type="hidden" name="post_type[]" value="post" />    
</form>