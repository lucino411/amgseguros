<h1>Blasting Experts Formulario Newsletter</h1>
<?php settings_errors(); ?>

<p>Use este <strong>shortcode</strong> para activar el Formulario de Newsletter dentro de una Página, Post, Sidebar, Header o Footer</p>
<p><code>[newsletter_form]</code></p>
<form method="post" action="options.php" class="blastingexperts-general-form">
	<?php settings_fields( 'blastingexperts-newsletter-options' ); ?>
	<?php do_settings_sections( 'blastingexperts_theme_newsletter' ); ?>
	<?php submit_button('Guardar Cambios', 'primary', 'btnSubmit'); ?>
</form>