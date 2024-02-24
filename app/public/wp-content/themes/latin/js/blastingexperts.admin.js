jQuery(document).ready( function($){
	
	var mediaUploader;
	
	$('#upload-button').on('click',function(e) {
		e.preventDefault();
		if( mediaUploader ){
			mediaUploader.open();
			return;
		}
		
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Profile Picture',
			button: {
				text: 'Escoja una Foto'
			},
			multiple: false
		});
		
		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#profile-picture').val(attachment.url);
			$('#profile-picture-preview').css('background-image','url(' + attachment.url + ')');
		});
		
		mediaUploader.open();
		
	});
	
	$('#remove-picture').on('click',function(e){
		e.preventDefault();
		var answer = confirm("Está seguro que quiere quitar su foto de perfil?");
		if( answer == true ){
			$('#profile-picture').val('');
			$('.blastingexperts-general-form').submit();
		}
		return;
	});
	
});