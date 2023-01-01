<?php
if (isset($conexion)) {
    ?>
	<div id="nuevoCliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title"><i class='fa fa-edit'></i> Nuevo Cliente</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post" id="guardar_cliente" name="guardar_cliente">
						<div id="resultados_ajax"></div>
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#empresa" data-toggle="tab" aria-expanded="false" class="nav-link active">
									Datos Personales
								</a>
							</li>
							<li class="nav-item">
								<a href="#contacto" data-toggle="tab" aria-expanded="true" class="nav-link">
									Datos de Contacto
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="empresa">

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="nombre" class="control-label">* Razón Social:</label>
											<input type="text" class="form-control UpperCase" id="nombre" name="nombre_cliente" autocomplete="off" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="fiscal_cliente" class="control-label">* RUC:</label>
											<input type="text" class="form-control" id="fiscal_cliente" name="fiscal_cliente" autocomplete="off" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="telefono_cliente" class="control-label">* Telefono:</label>
											<input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" autocomplete="off" required>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="direccion_cliente" class="control-label">* Dirección:</label>
											<textarea class="form-control UpperCase"  id="direccion_cliente" name="direccion_cliente" maxlength="255" autocomplete="off" required></textarea>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="fec_nacimiento" class="control-label ">Nacimiento</label>
											<input type="date" class="form-control" id="fec_nacimiento" name="fec_nacimiento" autocomplete="off">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="ciudad" class="control-label">Ciudad:</label>
											<select class="form-control" id="ciudad" name="ciudad" >
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
										<label for="hijos" class="control-label">Tiene Hijos</label>
										<input type="hidden" name="hijos" value="N" />
										<input name="hijos" type="checkbox" value="S" id="hijos" class="check_ver" /> 
									</div>
									<div class="col-md-4">
										<label for="pareja" class="control-label">Tiene Pareja</label>
										<input type="hidden" name="pareja" value="N" />
										<input name="pareja" type="checkbox" value="S" id="pareja" class="check_ver" />
									</div>
									<div class="col-md-5">
										<label for="int_mayorista" class="control-label">Interés Mayorista</label>
										<input type="hidden" name="int_mayorista" value="N" />
										<input name="int_mayorista" type="checkbox" value="S" id="int_mayorista" class="check_ver" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="email_cliente" class="control-label">* Email:</label>
											<input type="email_cliente" class="form-control" id="email_cliente" name="email_cliente" autocomplete="off" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="status_cliente" class="control-label">* Estado:</label>
											<select class="form-control" id="status_cliente" name="status_cliente" required>
												<option value="">-- Selecciona --</option>
												<option value="1" selected>Activo</option>
												<option value="0">Inactivo</option>
											</select>
										</div>
									</div>
									
								</div>

							</div>

							<div class="tab-pane fade" id="contacto">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="facebook" class="control-label">Facebook:</label>
											<input type="text" class="form-control" id="facebok" name="facebook" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="instagram" class="control-label">Instagram:</label>
											<input type="text" class="form-control" id="instagram" name="instagram" autocomplete="off">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="twitter" class="control-label">Twitter:</label>
											<input type="text" class="form-control" id="twitter" name="twitter" autocomplete="off">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="tiktok" class="control-label">Tiktok:</label>
											<input type="text" class="form-control" id="tiktok" name="tiktok" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="canal_comunicacion" class="control-label">* Canal de Comunicación:</label>
											<select class="form-control" id="canal_comunicacion" name="canal_comunicacion" required>
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
							<button type="submit" class="btn btn-primary waves-effect waves-light" id="guardar_datos">Guardar</button>
						</div>
				</form>
			</div>
		</div>
	</div><!-- /.modal -->
	<?php
}
?>

<!-- /.modal

<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="nombre" class="control-label">Nombre:</label>
									<input type="text" class="form-control UpperCase" id="nombre" name="nombre" autocomplete="off" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="fiscal" class="control-label">RUC | Cedula:</label>
									<input type="text" class="form-control" id="fiscal" name="fiscal" autocomplete="off">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="telefono" class="control-label">Telefono:</label>
									<input type="text" class="form-control" id="telefono" name="telefono" autocomplete="off" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="direccion" class="control-label">Dirección:</label>
									<textarea class="form-control UpperCase"  id="direccion" name="direccion" maxlength="255" autocomplete="off"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="encargado" class="control-label">Email:</label>
									<input type="email" class="form-control" id="email" name="email" autocomplete="off">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="estado" class="control-label">Estado:</label>
									<select class="form-control" id="estado" name="estado" required>
										<option value="">-- Selecciona --</option>
										<option value="1" selected>Activo</option>
										<option value="0">Inactivo</option>
									</select>
								</div>
							</div>
						</div>

-->