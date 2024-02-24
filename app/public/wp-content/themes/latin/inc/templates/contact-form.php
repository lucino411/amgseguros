<form id="latinContactForm" class="blastingexperts-contact-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">

	<!-- reCaptcha v3 -->
define('SITE_KEY', '6LdsAUIlAAAAACqo9lg1w0FLxq8_k6cRy2tEmh1B')
define('SECRET_KEY",'6LdsAUIlAAAAAItkLwsKkUAXqrDhz9dQ_J_Cwlzl')


	<div class="form-group">
		<input type="text" class="form-control blastingexperts-form-control" placeholder="Nombre" id="nombre" name="nombre">
		<small class="text-danger form-control-msg">Por favor ingresa tu Nombre</small>
	</div>

	<div class="form-group">
		<input type="text" class="form-control blastingexperts-form-control" placeholder="Apellido" id="apellido" name="apellido">
		<small class="text-danger form-control-msg">Por favor ingresa tu Apellido</small>
	</div>

	<div class="form-group">
		<input type="email" class="form-control blastingexperts-form-control" placeholder="Email" id="email" name="email">
		<small class="text-danger form-control-msg">Por favor ingresa tu Email</small>
	</div>

	<div class="form-group">
		<input type="text" class="form-control blastingexperts-form-control" placeholder="Profesión" id="profesion" name="profesion">
		<small class="text-danger form-control-msg">Por favor ingresa tu Profesión</small>
	</div>

	<div class="form-group">
		<input type="text" class="form-control blastingexperts-form-control" placeholder="* Perfil en Linkedin" id="perfil_linkedin" name="perfil_linkedin">
	</div>	

	<div class="form-group">
		<input type="text" class="form-control blastingexperts-form-control" placeholder=" País de Residencia" id="pais_residencia" name="pais_residencia">
		<small class="text-danger form-control-msg">Por favor ingresa tu País de Residencia</small>
	</div>

	<div class="form-group">
		<textarea name="message" id="message" class="form-control blastingexperts-form-control" placeholder="* Mensaje" rows="5"></textarea>
	</div>

	<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

	<div class="text-center">
		<button type="submit" class="btn btn-blastingexperts btn-blastingexperts-form" class="g-recaptcha" 
        data-sitekey="reCAPTCHA_site_key" 
        data-callback='onSubmit' 
        data-action='submit'>Enviar</button>
		<small class="text-info form-control-msg js-form-submission">Tu requerimiento se está enviando, por favor espere..</small>
		<small class="text-success form-control-msg js-form-success">Formulario enviado exitosamente, gracias!</small>
		<small class="text-danger form-control-msg js-form-error">Hubo un problema con el formulario, por favor intente de nuevo!</small>
	</div>

	<div class="text-info freelance-optional">
		<span class="h2">*</span><label class="text-info">Opcional</label>
	</div>

	<small class="text-secondary">Al dar clic para enviar el formulario, Ud acepta nuestros <a href="https://blastingexperts.com/wp-content/uploads/POLITICA-PRIVACIDAD-PROTECCION-TRATAMIENTO-DATOS-PERSONALES-BLASTING-EXPERTS-1.pdf" target="_blank" class="text-danger">Términos y Condiciones</a> para el tratamiento de datos personales.</small>


</form>

<script>
	grecaptcha.ready(function() {
		grecaptcha.execute("'.SITE_KEY.'",{action: "homepage"})
		.then(function(token){
			console.log(token);
		});		
	});
</script>