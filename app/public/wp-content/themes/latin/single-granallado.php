<?php 
	
	/*
		This is the template for the single-portafolio
		
		@package blastingexpertstheme
	*/
	
get_header(); ?>

<div class="container-fluid single-product-main-container">
	<div class="row single-product-main-content-row justify-content-center">
		<div class="col-12 col-xl-8">
			<?php 
																						
				if( have_posts() ):
					
					while( have_posts() ): the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header text-center">
								<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
														
								<div class="entry-meta">
									<?php								
									
										if( blastingexperts_posted_portafolio_line($post->ID) != NULL ) {
											echo blastingexperts_posted_portafolio_line($post->ID);   
										
										} if( blastingexperts_posted_portafolio_marca($post->ID, 'marca') != NULL ) {
												
												echo ' | '; 	
												echo blastingexperts_posted_portafolio_marca($post->ID, 'marca'); 
										}										
									?>
								</div>
								<?php if( get_field('imagen_producto') ): ?>

									<div class="single-product-front-image">

										<img src="<?php the_field('imagen_producto'); ?>" alt="<?php the_title(); ?>" loading="lazy">

									</div>	

								<?php endif; ?>
								
							</header>
								
							<div class="entry-content be-entry-content-single clearfix">
								
								<?php the_content(); ?>
								
							</div><!-- .entry-content -->						
							
						</article>
					<?php endwhile; wp_reset_postdata(); ?>
			<?php endif;?>
		
		</div> <!-- col-12 col-xl-8 -->

		<div class="col-12 col-md-8 col-xl-4">
			<div class="card single-product-card">
				<div class="card-body">
					<h4 class="sku-producto">Características Generales</h4>
                    <?php if( get_field('product_made_in') ): ?>
                        <div class="badge badge-secondary">
                            <?php the_field('product_made_in'); ?>
						</div>
					<?php endif; ?>
					<?php if( get_field('encabezados_producto') ): ?>
							<?php the_field('encabezados_producto'); ?>
					<?php endif; ?>					
				</div>

				<!-- modal -->

				<button type="button" class="btn btn-cotizar" data-toggle="modal" data-target="#cotizacionModal">Solicitar Cotización</button>

				<div class="modal fade" id="cotizacionModal" tabindex="-1" aria-labelledby="cotizacionModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">

							<div class="modal-header">
								<h5 class="modal-title" id="cotizacionModalLabel">Solicitar Cotización</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div><!-- modal-header -->					
													
							<form id="__vtigerWebForm_3" name="New BE website Form" action="https://blastingexperts.od2.vtiger.com/modules/Webforms/capture.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<input type="hidden" name="__vtrftk" value="sid:e1bf322e1a7fce7f93911976becb08c51cde3110,1627420237">
								<div class="modal-body">
									<input type="hidden" name="publicid" value="315e47e8c3794be92f504637e2f48225">
									<input type="hidden" name="urlencodeenable" value="1">
									<input type="hidden" name="name" value="New BE website Form">
									<input type="hidden" name="__vtCurrency" value="1">
									<input type="hidden" data-type="storage" data-param="Website" name="leadsource" value="Website">
									<input type="hidden" data-type="storage" data-param="Contact" name="cf_leads_productwebsite" value="<?php the_title(); ?>">
									
									<select name="salutationtype" data-label="salutationtype" hidden="">
										<option value="">Select Value</option>
										<option value="Mr." selected="">
												Mr.
											</option>
										<option value="Ms.">
												Ms.
											</option>
										<option value="Mrs.">
												Mrs.
											</option>
										<option value="Dr.">
												Dr.
											</option>
										<option value="Prof.">
												Prof.
										</option>
									</select>

									<div class="form-group">
										<!-- <label for="recipient-name" class="col-form-label">Nombre*:</label> -->
										<input type="text" name="firstname" maxlength="80" data-label="" value="" required="" class="form-control" id="recipient-name" placeholder="Nombre*">         
									</div>
									<div class="form-group">
										<!-- <label for="recipient-lastname" class="col-form-label">Apellido*:</label> -->
										<input type="text" name="lastname" maxlength="80" data-label="" value="" required="" class="form-control" id="recipient-lastname" placeholder="Apellido*">        
									</div>
									<div class="form-group">
										<!-- <label for="recipient-email" class="col-form-label">Email*:</label> -->
										<input type="email" name="email" data-label="Primary Email" value="" required="" class="form-control" id="recipient-email" placeholder="Correo Electrónico*">   
										<input type="hidden" name="emailoptin" data-label="" value="0">    
									</div>
									<div class="form-group">
										<!-- <label for="recipient-phone" class="col-form-label">Teléfono:</label> -->
										<input type="text" name="phone" maxlength="50" data-label="" value="" class="form-control" id="recipient-phone" placeholder="Teléfono">     
									</div>
									<div class="form-group">
										<!-- <label for="recipient-mobile" class="col-form-label">Celular:</label> -->
										<input type="text" name="mobile" maxlength="50" data-label="" value="" class="form-control" id="recipient-mobile" placeholder="Celular">
									</div>
									<div class="form-group">
										<!-- <label for="recipient-company" class="col-form-label">Empresa:</label> -->
										<input type="text" name="company" maxlength="100" data-label="" value="" class="form-control" id="recipient-company" placeholder="Empresa">         
									</div>
									<div class="form-group">
										<!-- <label for="recipient-country" class="col-form-label">País*:</label> -->
										<select name="country" data-label="country" required="" class="form-control" id="recipient-country">
											<!-- <option value="">Seleccione una Opción</option> -->
											<option value="">Seleccione País*</option>
										
											<option value="AR">Argentina</option>                       
											<option value="AW">Aruba</option>
											<option value="BS">Bahamas</option>                        
											<option value="BO">Bolivia</option>                        
											<option value="BR">Brazil</option>                        
											<option value="CA">Canada</option>                        
											<option value="CL">Chile</option>                        
											<option value="CO">Colombia</option>                        
											<option value="CR">Costa Rica</option>                        
											<option value="CU">Cuba</option>                        
											<option value="DM">Dominica</option>                        
											<option value="EC">Ecuador</option>    
											<option value="SV">El Salvador</option>							
											<option value="ES">España</option>
											<option value="US">Estados Unidos</option>                        
											<option value="GT">Guatemala</option>                        
											<option value="GY">Guyana</option>
											<option value="HT">Haití</option>                        
											<option value="HN">Honduras</option>                        
											<option value="JM">Jamaica</option>                            
											<option value="MX">México</option>                        
											<option value="NI">Nicaragua</option>                        
											<option value="PA">Panamá</option>                        
											<option value="PY">Paraguay</option>							
											<option value="PE">Perú</option>                        
											<option value="PR">Puerto Rico</option>
											<option value="DO">República Dominicana</option>                        
											<option value="TT">Trinidad y Tobago</option>                        
											<option value="UY">Uruguay</option>                        
											<option value="VE">Venezuela</option>                        
										</select>
									</div>

									<div class="form-group">
										<!-- <label for="message-description" class="col-form-label">Message*:</label> -->
										<textarea name="description" required="" class="form-control" data-minlength="4" cols="" rows="6" id="message-description" placeholder="Mensaje*"></textarea>
									</div>
									
									<div class="form-group">
										<label class="col-form-label solicitar-politicas">*Campo Obligatorio.</label>
										<label class="col-form-label solicitar-politicas">Al dar clic para enviar el formulario, Ud acepta nuestros <a href="docs/POLITICA-PRIVACIDAD-PROTECCION-TRATAMIENTO-DATOS-PERSONALES-BLASTING-EXPERTS.pdf" target="_blank">términos y condiciones</a> para el tratamiento de datos personales.</label>
									</div>
										
									<div class="form-group">
										<script src="https://www.google.com/recaptcha/api.js"></script>
										<div class="g-recaptcha" data-sitekey="6LcmdSATAAAAAGWw734vGo0AXQwuxJS7RmDZA_Fe"></div>
										<input type="hidden" id="siteKey_3" value="6LcmdSATAAAAAGWw734vGo0AXQwuxJS7RmDZA_Fe">
									</div>									
								</div> <!-- modal-body -->
								
								<div class="modal-footer">
									<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
									<input type="submit" value="Enviar Cotización" id="vtigerFormSubmitBtn_3" class="btn btn-outline-primary">
								</div><!-- modal-footer -->

							</form>
						</div><!-- modal-content -->						
					</div><!-- modal-dialog -->	
				</div><!-- modal fade -->							
				<!-- fin modal -->
			</div><!-- card single-product-card -->						
		</div> <!-- col-12 col-md-8 col-xl-4 -->
	</div> <!-- row single-product-main-content-row justify-content-md-center -->
</div> <!-- container-fluid -->

<!-- COLLAPSE BOOTSTRAP -->
<div class="container-fluid container-accordion-sp single-product-main-container">	
	<div class="accordion-sp">
		<?php if( get_field('caracteristicas_producto') ): ?>
			<div class="card">
				<div class="card-header header-accordion-sp" id="caracteristicasProducto">
					<h2 class="mb-0 ">
						<button class="btn btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseCaracteristicas" aria-expanded="false" aria-controls="collapseCaracteristicas">
							Especificaciones
						</button>
					</h2>
				</div>
				
				<div id="collapseCaracteristicas" class="collapse" aria-labelledby="caracteristicasProducto" data-parent="#caracteristicasProducto">
					<div class="card-body body-accordion-sp">
						<?php the_field('caracteristicas_producto'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>	

		<?php if( get_field('instrucciones_producto') ): ?>
			<div class="card">
				<div class="card-header header-accordion-sp" id="instruccionesProducto">
					<h2 class="mb-0 ">
						<button class="btn btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseInstrucciones" aria-expanded="false" aria-controls="collapseInstrucciones">
							Instrucciones de Uso
						</button>
					</h2>
				</div>
				
				<div id="collapseInstrucciones" class="collapse" aria-labelledby="instruccionesProducto" data-parent="#instruccionesProducto">
					<div class="card-body body-accordion-sp">
						<?php the_field('instrucciones_producto'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>		
				
		<?php if( get_field('materiales_producto') ): ?>
			<div class="card">
				<div class="card-header header-accordion-sp" id="materialesProducto">
					<h2 class="mb-0 ">
						<button class="btn btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseMateriales" aria-expanded="false" aria-controls="collapseMateriales">
							Materiales
						</button>
					</h2>
				</div>
				
				<div id="collapseMateriales" class="collapse" aria-labelledby="materialesProducto" data-parent="#materialesProducto">
					<div class="card-body body-accordion-sp">
						<?php the_field('materiales_producto'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
					
		<?php if( get_field('modelos_producto') ): ?>
			<div class="card">
				<div class="card-header header-accordion-sp" id="modelosProducto">
					<h2 class="mb-0 ">
						<button class="btn btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseModelos" aria-expanded="false" aria-controls="collapseModelos">
							Modelos Disponibles
						</button>
					</h2>
				</div>
				
				<div id="collapseModelos" class="collapse" aria-labelledby="modelosProducto" data-parent="#modelosProducto">
					<div class="card-body body-accordion-sp">
						<?php the_field('modelos_producto'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if( get_field('opciones_producto') ): ?>
			<div class="card">
				<div class="card-header header-accordion-sp" id="opcionesProducto">
					<h2 class="mb-0 ">
						<button class="btn btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseOpciones" aria-expanded="false" aria-controls="collapseOpciones">
							Opciones
						</button>
					</h2>
				</div>
				
				<div id="collapseOpciones" class="collapse" aria-labelledby="opcionesProducto" data-parent="#opcionesProducto">
					<div class="card-body body-accordion-sp">
						<?php the_field('opciones_producto'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if( get_field('paquetes_producto') ): ?>
			<div class="card">
				<div class="card-header header-accordion-sp" id="paquetesProducto">
					<h2 class="mb-0 ">
						<button class="btn btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapsePaquetes" aria-expanded="false" aria-controls="collapsePaquetes">
							Paquetes <span class="max-medium-less-screen">disponibles en <?php the_title(); ?></span>
						</button>
					</h2>
				</div>
				
				<div id="collapsePaquetes" class="collapse" aria-labelledby="paquetesProducto" data-parent="#paquetesProducto">
					<div class="card-body body-accordion-sp">
						<?php the_field('paquetes_producto'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if( get_field('partes_accesorios') ): ?>
			<div class="card">
				<div class="card-header header-accordion-sp" id="partesProducto">
					<h2 class="mb-0 ">
						<button class="btn btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapsePartes" aria-expanded="false" aria-controls="collapsePartes">
							Partes y Accesorios</span>
						</button>
					</h2>
				</div>
				
				<div id="collapsePartes" class="collapse" aria-labelledby="partesProducto" data-parent="#partesProducto">
					<div class="card-body body-accordion-sp">
						<?php the_field('partes_accesorios'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>	
		
		<?php if( get_field('tamanos_producto') ): ?>
			<div class="card">
				<div class="card-header header-accordion-sp" id="tamanosProducto">
					<h2 class="mb-0 ">
						<button class="btn btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseTamanos" aria-expanded="false" aria-controls="collapseTamanos">
							Tamaños <span class="max-medium-less-screen">disponibles en <?php the_title(); ?></span>
						</button>
					</h2>
				</div>
				
				<div id="collapseTamanos" class="collapse" aria-labelledby="tamanosProducto" data-parent="#tamanosProducto">
					<div class="card-body body-accordion-sp">
						<?php the_field('tamanos_producto'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
							
		<?php if( get_field('ventajas_producto') ): ?>
			<div class="card">
				<div class="card-header header-accordion-sp" id="ventajasProducto">
					<h2 class="mb-0 ">
						<button class="btn btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseVentajas" aria-expanded="false" aria-controls="collapseVentajas">
							Ventajas <span class="max-medium-less-screen">del uso de <?php the_title(); ?></span>
						</button>
					</h2>
				</div>
				
				<div id="collapseVentajas" class="collapse" aria-labelledby="ventajasProducto" data-parent="#ventajasProducto">
					<div class="card-body body-accordion-sp">
						<?php the_field('ventajas_producto'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
				
		<?php if( get_field('ficha_tecnica_producto') ): ?>
			<div class="card">
				<div class="card-header header-accordion-sp" id="descargasProducto">
					<h2 class="mb-0 ">
						<button class="btn btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseDescargas" aria-expanded="false" aria-controls="collapseDescargas">
							Descargas
						</button>
					</h2>
				</div>

				<div id="collapseDescargas" class="collapse" aria-labelledby="descargasProducto" data-parent="#descargasProducto">
					<div class="card-body body-accordion-sp">
						<ul class="descargas">
							<?php $file = get_field('ficha_tecnica_producto'); ?>
						
							<li><span><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></span></li><br>
						
							<?php if( get_field('ficha_tecnica_producto_2') ): 
								$file = get_field('ficha_tecnica_producto_2');
							?>
								<li><span><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></span></li><br>
							<?php endif; ?>
							
							<?php if( get_field('ficha_tecnica_producto_3') ): 
								$file = get_field('ficha_tecnica_producto_3');
							?>
								<li><span><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></span></li><br>
							<?php endif; ?>
							
							<?php if( get_field('ficha_tecnica_producto_4') ): 
								$file = get_field('ficha_tecnica_producto_4');
							?>
								<li><span><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></span></li><br>
							<?php endif; ?>
							<?php if( get_field('ficha_tecnica_producto_5') ): 
								$file = get_field('ficha_tecnica_producto_5');
							?>
								<li><span><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></span></li><br>
							<?php endif; ?>
							<?php if( get_field('ficha_tecnica_producto_6') ): 
								$file = get_field('ficha_tecnica_producto_6');
							?>
								<li><span><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></span></li><br>
							<?php endif; ?>
							<?php if( get_field('ficha_tecnica_producto_7') ): 
								$file = get_field('ficha_tecnica_producto_7');
							?>
								<li><span><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></span></li><br>
							<?php endif; ?>
							<?php if( get_field('ficha_tecnica_producto_8') ): 
								$file = get_field('ficha_tecnica_producto_8');
							?>
								<li><span><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></span></li><br>
							<?php endif; ?>
							<?php if( get_field('ficha_tecnica_producto_9') ): 
								$file = get_field('ficha_tecnica_producto_9');
							?>
								<li><span><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></span></li><br>
							<?php endif; ?>
							<?php if( get_field('ficha_tecnica_producto_10') ): 
								$file = get_field('ficha_tecnica_producto_10');
							?>
								<li><span><a href="<?php echo $file['url']; ?>" target="_blank">Descargar <?php echo $file['title']; ?></a></span></li><br>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div> <!-- card -->								
		<?php endif; ?>
	</div> <!-- accordion -->			
</div> <!-- container-fluid -->

<!-- FIN ACCORDION BOOTSTRAP -->	
	
<!-- Image Gallery -->
	
	<?php
	//Get the images ids from the post_metadata
	$images = acf_photo_gallery('galeria_producto', $post->ID);
	//Check if return array has anything in it
	if( count($images) ): ?>
	
		<ul class="row list-unstyled single-portafolio-gallery-ul">
			
			<?php foreach($images as $image):

				$id = $image['id']; // The attachment id of the media
				$title = $image['title']; //The title
				$caption= $image['caption']; //The caption
				$full_image_url= $image['full_image_url']; //Full size image url
				// $full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
				$thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
				$url= $image['url']; //Goto any link when clicked
				// $target= $image['target']; //Open normal or new tab
				// $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
				// $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
				?>

				<li>
					<?php if( !empty($full_image_url) ){ ?>
						<div class="zoom-gallery single-portafolio-gallery">
							<a href="<?php echo $full_image_url; ?>" data-caption="<?php the_excerpt(); ?>" title="<?php echo $title; ?>">
								<img src="<?php echo $thumbnail_image_url; ?>" alt="<?php echo $title; ?>" class="img-fluid" loading="lazy">	
							</a>
						</div>
					<?php } ?>
				</li>

			<?php endforeach; ?> 

		</ul>				

	<?php endif; ?>	

<!-- Videos -->
<div class="container-fluid single-product-main-container">
	
	<div class="row single-product-video-grid justify-content-center">
	
		<div class="single-product-video ">			
			<?php if( get_field('video_producto_1') ): ?>
			
				<?php the_field('video_producto_1'); ?>
			
			<?php endif; ?>
		</div>			
		
		<div class="single-product-video">			
			<?php if( get_field('video_producto_2') ): ?>
				
				<?php the_field('video_producto_2'); ?>
			
			<?php endif; ?>
		</div>
			
		<div class="single-product-video">				
			<?php if( get_field('video_producto_3') ): ?>
			
				<?php the_field('video_producto_3'); ?>
			
			<?php endif; ?>
		</div>
		
		<div class="single-product-video">			
			<?php if( get_field('video_producto_4') ): ?>
				
				<?php the_field('video_producto_4'); ?>
				
			<?php endif; ?>
		</div>
					
		<div class="single-product-video">			
			<?php if( get_field('video_producto_5') ): ?>
				
				<?php the_field('video_producto_5'); ?>
			
			<?php endif; ?>
		</div>
						
		<div class="single-product-video">			
			<?php if( get_field('video_producto_6') ): ?>
				
				<?php the_field('video_producto_6'); ?>
			
			<?php endif; ?>
		</div>
							
	</div> <!-- row single-product-video-grid justify-content-center-->	
	
</div> <!-- container-fluid  -->
					
<!-- Related Products -->
	
<div class="container-fluid grid-container single-product-main-content-row">
		
	<div class="text-center single-product-title">
		<h2 class="entry-title">Productos Relacionados</h2>  
	</div>
	
	<div class="row grid-card-marketing justify-content-center">

		<?php be_get_related_posts( get_the_ID(), 4 ); ?>
	
	</div> <!-- grid-card-marketing -->
	
</div> <!-- container-fluid -->	

<?php get_footer(); ?>					