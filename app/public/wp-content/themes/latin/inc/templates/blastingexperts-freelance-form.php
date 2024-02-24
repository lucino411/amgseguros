<h1>Blasting Experts Formulario de Freelance</h1>
<?php settings_errors(); ?>

<p>Use este <strong>shortcode</strong> para activar el Formulario de Freelances dentro de una Página o Post</p>
<p><code>[freelance_form]</code></p>
<form method="post" action="options.php" class="blastingexperts-general-form">
	<?php settings_fields( 'blastingexperts-freelance-options' ); ?>
	<?php do_settings_sections( 'blastingexperts_theme_freelance' ); ?>
	<?php submit_button('Guardar Cambios', 'primary', 'btnSubmit'); ?>
</form>