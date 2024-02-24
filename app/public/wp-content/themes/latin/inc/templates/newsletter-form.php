<form id="beNewsletterForm" class="blastingexperts-newsletter-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">

	<div class="form-group">
		<input type="email" class="form-control blastingexperts-form-control" placeholder="Email" id="email" name="email" required="required">
		<small class="text-warning form-control-msg">Por favor ingresa tu Email</small>
	</div>

	<div class="text-center">
		<button type="submit" class="btn btn-blastingexperts btn-blastingexperts-form btn-newsletter-submit">Enviar</button>
		<small class="text-info form-control-msg js-form-submission">Tu requerimiento se está enviando, por favor espere..</small>
		<small class="text-success form-control-msg js-form-success">Hemos recibido tu Suscripción, gracias!</small>
		<small class="text-warning form-control-msg js-form-error">Hubo un problema con el formulario, por favor intente de nuevo!</small>
	</div>

</form>