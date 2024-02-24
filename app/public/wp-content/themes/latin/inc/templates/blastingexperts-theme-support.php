<!-- <h1>Blasting Experts Theme Support</h1> -->
<h1>Blasting Experts Configuración</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="blastingexperts-general-form">
	<?php settings_fields( 'blastingexperts-theme-support' ); ?>
	<?php do_settings_sections( 'blastingexperts_theme' ); ?>
	<?php submit_button('Guardar Cambios', 'primary', 'btnSubmit'); ?>
</form>