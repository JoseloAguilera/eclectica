<?php
session_start();
if (!isset($_SESSION['user_login_status']) and $_SESSION['user_login_status'] != 1) {
    header("location: ../../login.php");
    exit;
}
/* Connect To Database*/
require_once "../db.php"; //Contiene las variables de configuracion para conectar a la base de datos
require_once "../php_conexion.php"; //Contiene funcion que conecta a la base de datos
//Archivo de funciones PHP
require_once "../funciones.php";
//Inicia Control de Permisos
include "../permisos.php";
$user_id = $_SESSION['id_users'];
get_cadena($user_id);
$modulo = "Productos";
permisos($modulo, $cadena_permisos);
//Finaliza Control de Permisos
$nombre_usuario = get_row('users', 'usuario_users', 'id_users', $user_id);
//consulta para elegir el comprobante
$query = $conexion->query("select * from comprobantes");
$tipo  = array();
while ($r = $query->fetch_object()) {$tipo[] = $r;}
?>

<?php require 'includes/header_start.php';?>

<?php require 'includes/header_end.php';?>

<!-- Begin page -->
<div id="wrapper" class="forced enlarged"> <!-- DESACTIVA EL MENU -->

	<?php require 'includes/menu.php';?>

	<!-- ============================================================== -->
	<!-- Start right Content here -->
	<!-- ============================================================== -->
	<div class="content-page">
		<!-- Start content -->
		<div class="content">
			<div class="container">
				<?php// var_dump($permisos_eliminar);	?>
				<input type="hidden" id="permiso" value="<?php echo $permisos_eliminar; ?>">
				<?php if ($permisos_ver == 1) {
    ?>
					<div class="col-lg-12">
						<div class="portlet">
							<div class="portlet-heading bg-primary">
								<h3 class="portlet-title">
									Nueva Transferencia
								</h3>
								<div class="portlet-widgets">
								</div> 
								<div class="clearfix"></div>
							</div>
							<div id="bg-primary" class="panel-collapse collapse show">
								<div class="portlet-body">
									<?php
	include "../modal/buscar_productos_ventas.php";
	include "../modal/buscar_clientes_ventas.php";
    include "../modal/registro_cliente.php";
    include "../modal/registro_producto.php";
    include "../modal/caja.php";
    include "../modal/anular_factura.php";
    ?>
									<div class="row">
										<div class="col-lg-12">
											<div class="card-box">

												<div class="widget-chart">
													<div id="resultados_ajaxf" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->
													<form class="form-horizontal" role="form" id="barcode_form">
														<div class="form-group row">
															<label for="id_feria" class="control-label">Origen:</label>
															<div class="col-md-3" align="left">	
																
																<select id = "id_feria" class = "form-control" name = "id_feria" required autocomplete="off" onchange="getFeria();">
																		<option value="tienda" selected>Tienda</option>
																		<option value="feria1">Feria 1</option>
																		<option value="feria2">Feria 2</option>
																		
																</select>
															</div>

															<label for="condiciones" class="control-label">Codigo:</label>
															<div class="col-md-5" align="left">
																<div class="input-group">
																	<input type="text" class="form-control" id="barcode" autocomplete="off"  tabindex="1" autofocus="true" >
																	<span class="input-group-btn">
																		<button type="submit" class="btn btn-default"><span class="fa fa-barcode"></span></button>
																	</span>
																</div>
															</div>
															<div class="col-md-2">
																<button type="button" accesskey="a" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#buscar">
																	<span class="fa fa-search"></span> Buscar
																</button>
															</div>
														</div>
													</form>

													<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->

												</div>
											</div>

										</div>

										

									</div>
									<!-- end row -->


								</div>
							</div>
						</div>
					</div>
					<?php
} else {
    ?>
					<section class="content">
						<div class="alert alert-danger" align="center">
							<h3>Acceso denegado! </h3>
							<p>No cuentas con los permisos necesario para acceder a este módulo.</p>
						</div>
					</section>
					<?php
}
?>

			</div>
			<!-- end container -->
		</div>
		<!-- end content -->

		<?php require 'includes/pie.php';?>

	</div>
	<!-- ============================================================== -->
	<!-- End Right content here -->
	<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<?php require 'includes/footer_start.php'
?>
<!-- ============================================================== -->
<!-- Todo el codigo js aqui-->
<!-- ============================================================== -->
<script type="text/javascript" src="../../js/VentanaCentrada.js"></script>
<script type="text/javascript" src="../../js/transferencia.js"></script>
<!-- ============================================================== -->
<!-- Codigos Para el Auto complete de Clientes -->

<!-- FIN -->
<script>
// print order function
function printOrder(id_factura) {
	$('#modal_vuelto').modal('hide');//CIERRA LA MODAL
	if (id_factura) {
		$.ajax({
			url: '../pdf/documentos/imprimir_venta.php',
			type: 'post',
			data: {
				id_factura: id_factura
			},
			dataType: 'text',
			success: function(response) {
				var mywindow = window.open('', 'Stock Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Facturación</title>');
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');
                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10
                mywindow.print();
                mywindow.close();
            } // /success function

        }); // /ajax function to fetch the printable order
    } // /if orderId
} // /print order function
</script>
<script>
// print order function
function printFactura(id_factura) {
	$('#modal_vuelto').modal('hide');
	if (id_factura) {
		$.ajax({
			url: '../pdf/documentos/imprimir_factura_venta.php',
			type: 'post',
			data: {
				id_factura: id_factura
			},
			dataType: 'text',
			success: function(response) {
				var mywindow = window.open('', 'Stock Management System', 'height=800,width=1200');
				mywindow.document.write('<html><head><title>Facturación</title>');
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');
                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10
               // mywindow.print();
               // mywindow.close();
            } // /success function

        }); // /ajax function to fetch the printable order
    } // /if orderId
} // /print order function
</script>
<script>
	function obtener_caja(user_id) {
		$(".outer_div3").load("../modal/carga_caja.php?user_id=" + user_id);//carga desde el ajax
	}
</script>
<script>
	function showDiv(select){
		if(select.value==4){
			$("#resultados3").load("../ajax/carga_prima.php");
		} else{
			$("#resultados3").load("../ajax/carga_resibido.php");
		}
	}
	function comprobar(select){
		var rnc = $("#rnc").val();
		if(select.value==1 && rnc==''){
			$.Notification.notify('warning','bottom center','NOTIFICACIÓN', 'AL CLIENTE SELECCIONADO NO SE LE PUEDE IMPRIR LA FACTURA, NO TIENE RUC - CEDULA REGISTRADO')
			$("#resultados4").load("../ajax/tipo_doc.php");
		} else{
			//$("#resultados3").load("../ajax/carga_resibido.php");
		}
	}
</script>
<script>
  function getval(sel)
  {
    $.Notification.notify('success', 'bottom center', 'NOTIFICACIÓN', 'CAMBIO DE COMPROBANTE')
    $("#outer_comprobante").load("../ajax/carga_correlativos.php?id_comp="+sel.value);

  }
</script>

<?php require 'includes/footer_end.php'
?>