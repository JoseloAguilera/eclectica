<?php
if (isset($conexion)) {
    ?>
	<div id="editarCliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title"><i class='fa fa-edit'></i> Editar Cliente</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post" id="editar_cliente" name="editar_cliente">
						<div id="resultados_ajax2"></div>
							<ul class="nav nav-tabs">
								<li class="nav-item">
									<a href="#mod_empresa" data-toggle="tab" aria-expanded="false" class="nav-link active">
										Datos del Cliente
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
												<label for="mod_nombre" class="control-label">Nombre:</label>
												<input type="text" class="form-control UpperCase" id="mod_nombre" name="mod_nombre" autocomplete="off" required>
												<input id="mod_id" name="mod_id" type='hidden'>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="mod_fiscal" class="control-label">RUC | Cedula:</label>
												<input type="text" class="form-control" id="mod_fiscal" name="mod_fiscal" autocomplete="off" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="mod_telefono" class="control-label">Telefono:</label>
												<input type="text" class="form-control" id="mod_telefono" name="mod_telefono" autocomplete="off" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="mod_direccion" class="control-label">Dirección:</label>
												<textarea class="form-control UpperCase"  id="mod_direccion" name="mod_direccion" maxlength="255" autocomplete="off" required></textarea>
											</div>
										</div>
									</div>

									<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="mod_fec_nacimiento" class="control-label">Nacimiento</label>
														<input type="date" class="form-control" id="mod_fec_nacimiento" name="mod_fec_nacimiento" autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="mod_ciudad" class="control-label">Ciudad:</label>
														<select class="form-control" id="mod_ciudad" name="mod_ciudad" >
															<option value="">-- Selecciona --</option>
																<?php
																$query_ciudad = mysqli_query($conexion, "select * from ciudad order by nombre_ciudad asc");
																while ($rw = mysqli_fetch_array($query_ciudad)) {
																?>

																<option value="<?php echo $rw['id_ciudad']; ?>"><?php echo $rw['nombre_ciudad']; ?></option>
																	<?php
																}
																?>
														</select>
												</div>
									</div>
											</div>
											<div class="row">
												<div class="col-md-3">
													<label for="mod_hijos" class="control-label">Tiene Hijos</label>
													<input name="mod_hijos" type="checkbox" id="mod_hijos" class="check_ver" />
												</div>
												<div class="col-md-4">
													<label for="mod_pareja" class="control-label">Tiene Pareja</label>
													
													<input name="mod_pareja" type="checkbox" id="mod_pareja" class="check_ver" />
												</div>
												<div class="col-md-5">
													<label for="mod_int_mayorista" class="control-label">Interés Mayorista</label>
													
													<input name="mod_int_mayorista" type="checkbox" id="mod_int_mayorista" class="check_ver" />
												</div>
											</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="mod_email" class="control-label">Email:</label>
												<input type="mod_email" class="form-control" id="mod_email" name="mod_email" autocomplete="off">
											</div>
										</div>
										<div class="col-md-6">
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
								</div>
								<div class="tab-pane fade" id="mod_cont">
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
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="mod_canal_comunicacion" class="control-label">Canal de Comunicación:</label>
													<select class="form-control" id="mod_canal_comunicacion" name="mod_canal_comunicacion" required>
														<option value="">-- Selecciona --</option>
														<option value="WHATSAPP" selected>Whatsapp</option>
														<option value="FACEBOOK">Facebook</option>
													</select>
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