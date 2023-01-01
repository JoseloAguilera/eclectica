<?php
if (isset($conexion)) {
    ?>
	<div id="nuevoEgreso" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title"><i class='fa fa-edit'></i> Nuevo Gasto</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post" id="guardar_proveedor" name="guardar_proveedor">
						<div id="resultados_ajax"></div>	
						<div class="tab-content">
							<div class="tab-pane fade show active" id="empresa">

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="fecha" class="control-label">Fecha</label>
											<input type="date" class="form-control" id="fecha" name="fecha" autocomplete="off" required>
										</div>

									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="cuenta_contable" class="control-label">Cta Contable</label>
											<select class="form-control" id="cuenta_contable" name="cuenta_contable" required>
												<option value="">-- Selecciona --</option>
												<option value="adquisición de equipos">Adquisición de equipos</option>
												<option value="arriendo">Arriendo</option>
												<option value="creditos">Créditos</option>
												<option value="formación">Formación</option>
												<option value="impuestos">Impuestos</option>
												<option value="inscripción en ferias">Inscripción en Ferias</option>
												<option value="internet">Internet</option>
												<option value="mantenimiento pagina web">Mantenimiento Página Web</option>
												<option value="materiales de oficina">Materiales de Oficina</option>
												<option value="movilidad">Movilidad</option>
												<option value="pago de salarios">Pago de Salarios</option>
												<option value="pasarela de pago">Pasarela de Pago</option>
												<option value="publicidad">Publicidad</option>
												<option value="servicio de encomienda">Servicio de Encomienda</option>	
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="proveedor" class="control-label">Proveedor</label>
											<select class="form-control" id="proveedor" name="proveedor" required>
												<option value="">-- Selecciona --</option>
												<?php
												$query_proveedor = mysqli_query($conexion, "select * from proveedores order by nombre_proveedor");
												while ($rw = mysqli_fetch_array($query_proveedor)) {
												?>

												<option value="<?php echo $rw['id_proveedor']; ?>"><?php echo $rw['nombre_proveedor']; ?></option>
                                                    <?php
												}
													?>
											</select>
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="nro_comprobante" class="control-label">Nro Comprobante</label>
											<input type="text" class="form-control" id="nro_comprobante" name="nro_comprobante" autocomplete="off" required>
										</div>
									</div>
								</div>
								<div class="row">
									
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="concepto" class="control-label">Concepto</label>
											<input type="text" class="form-control" id="concepto" name="concepto" autocomplete="off" required>
										</div>
									</div>
								</div>

								<div class="row">
									
									<div class="col-md-12">
										<div class="form-group">
											<label for="medio_pago" class="control-label">Medio de Pago:</label>
											<input type="radio" id="medio_pago" name="medio_pago" value="efectivo" required> Efectivo
											<input type="radio" id="medio_pago" name="medio_pago" value="transferencia"> Transferencia
											<input type="radio" id="medio_pago" name="medio_pago" value="cheque"> Cheque
											<input type="radio" id="medio_pago" name="medio_pago" value="tarjeta"> Tarjeta
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="importe" class="control-label">Importe</label>
											<input type="text" class="form-control" id="importe" name="importe" autocomplete="off" required>
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