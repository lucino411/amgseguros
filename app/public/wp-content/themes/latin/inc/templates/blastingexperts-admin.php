<h1>Blasting Experts Opciones</h1>
<?php settings_errors(); ?> <!-- wordpress prints errors at the admin-->
<?php 
	
	$picture = esc_attr( get_option( 'profile_picture' ) );
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	$fullName = $firstName . ' ' . $lastName;
	$description = esc_attr( get_option( 'user_description' ) );
	
?>
<div class="blastingexperts-sidebar-preview">
	<div class="blastingexperts-sidebar">
		<div class="image-container">
			<div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
		</div>
		<h1 class="blastingexperts-username"><?php print $fullName; ?></h1>
		<h2 class="blastingexperts-description"><?php print $description; ?></h2>
		<div class="icons-wrapper">
			
		</div>
	</div><!-- blastingexperts-sidebar -->
</div><!-- blastingexperts-sidebar-preview -->

<form id="submitForm" method="post" action="options.php" class="blastingexperts-general-form"><!-- wordpress admin uses options.php in forms -->
	<?php settings_fields( 'blastingexperts-settings-group' ); ?>
	<?php do_settings_sections( 'blastingexperts' ); ?>
	<?php submit_button( 'Guardar Cambios', 'primary', 'btnSubmit' ); ?><!-- We changed submit button name and ID from submit to btnSubmit for no interference with javascript submit order: $('.blastingexperts-general-form').submit(); -->
</form>