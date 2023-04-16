<?php
if (isset($conexion)) {
    ?>
	<div id="editarProveedor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title"><i class='fa fa-edit'></i> Editar Proveedor</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post" id="editar_proveedor" name="editar_proveedor">
						<div id="resultados_ajax2"></div>

						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#mod_empresa" data-toggle="tab" aria-expanded="false" class="nav-link active">
									Datos de la Empresa
								</a>
							</li>
							<li class="nav-item">
								<a href="#mod_cont" data-toggle="tab" aria-expanded="true" class="nav-link">
									Datos de Contacto
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="mod_empresa">

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="mod_nombre" class="control-label">Razón Social:</label>
											<input type="text" class="form-control UpperCase" id="mod_nombre" name="mod_nombre" autocomplete="off" required>
											<input id="mod_id" name="mod_id" type='hidden'>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="mod_fiscal" class="control-label">RUC:</label>
											<input type="text" class="form-control" id="mod_fiscal" name="mod_fiscal" autocomplete="off" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="mod_web" class="control-label">Web:</label>
											<input type="text" class="form-control" id="mod_web" name="mod_web" autocomplete="off">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="mod_direccion" class="control-label">Dirección:</label>
											<textarea class="form-control UpperCase"  id="mod_direccion" name="mod_direccion" maxlength="255" autocomplete="off"></textarea>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="mod_rubro" class="control-label">Rubro:</label>
											<select class="form-control" id="mod_rubro" name="mod_rubro" required>
												<option value="" >-- Selecciona --</option>
												<option value="Cuero" >Cuero</option>
												<option value="Hilo Encerado">Hilo Encerado</option>
												<option value="Hilo Chino" >Hilo Chino</option>
												<option value="Dijes y Cuentas" >Dijes y Cuentas</option>
												<option value="Resina" >Resina</option>
												<option value="Cristales" >Cristales</option>
												<option value="Packaging" >Packaging</option>
												<option value="Productos Terminados" >Prod. Terminados</option>
												<option value="Marketing Digital" >Marketing Digital</option>
												<option value="Diseño Grafico" >Diseño Gráfico</option>
												<option value="Informatica" >Informática</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="mod_especialidad" class="control-label">Especialidad:</label>
											<input type="text" class="form-control" id="mod_especialidad" name="mod_especialidad" autocomplete="off">
										</div>
									</div>
								</div>

							</div>
							<div class="tab-pane fade" id="mod_cont">

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="mod_contacto" class="control-label">Nombre/Contacto:</label>
											<input type="text" class="form-control UpperCase" id="mod_contacto" name="mod_contacto" autocomplete="off" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="mod_telefono" class="control-label">Telefono:</label>
											<input type="text" class="form-control" id="mod_telefono" name="mod_telefono" autocomplete="off" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label for="encargado" class="control-label">Email:</label>
											<input type="mod_email" class="form-control" id="mod_email" name="mod_email" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="mod_estado" class="control-label">Estado:</label>
											<select class="form-control" id="mod_estado" name="mod_estado" required>
												<option value="">-- Selecciona --</option>
												<option value="1" selected>Activo</option>
												<option value="0">Inactivo</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="mod_facebook" class="control-label">Facebook:</label>
											<input type="text" class="form-control" id="mod_facebook" name="mod_facebook" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="mod_instagram" class="control-label">Instagram:</label>
											<input type="text" class="form-control" id="mod_instagram" name="mod_instagram" autocomplete="off">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="mod_twitter" class="control-label">Twitter:</label>
											<input type="text" class="form-control" id="mod_twitter" name="mod_twitter" autocomplete="off">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="mod_tiktok" class="control-label">Tiktok:</label>
											<input type="text" class="form-control" id="mod_tiktok" name="mod_tiktok" autocomplete="off">
										</div>
									</div>
								</div>


							</div>
						</div>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary waves-effect waves-light" id="actualizar_datos">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div><!-- /.modal -->
	<?php
}
?>