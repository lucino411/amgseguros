<h1>Blasting Experts Formulario de Contacto</h1>
<?php settings_errors(); ?>

<p>Use este <strong>shortcode</strong> para activar el Formulario de Contacto dentro de una Página o Post</p>
<p><code>[contact_form]</code></p>
<form method="post" action="options.php" class="blastingexperts-general-form">
	<?php settings_fields( 'blastingexperts-contact-options' ); ?>
	<?php do_settings_sections( 'blastingexperts_theme_contact' ); ?>
	<?php submit_button('Guardar Cambios', 'primary', 'btnSubmit'); ?>
</form>