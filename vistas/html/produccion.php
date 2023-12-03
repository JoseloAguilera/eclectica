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
									Producción
								</h3>
								<div class="portlet-widgets">
								
								</div> 
								<div class="clearfix"></div>
							</div>
							<div id="bg-primary" class="panel-collapse collapse show">
								<div class="portlet-body">
									<?php
	
	/*include "../modal/buscar_productos_ventas.php";
	include "../modal/buscar_clientes_ventas.php";
    include "../modal/registro_cliente.php";
    include "../modal/registro_producto.php";
    include "../modal/caja.php";
    include "../modal/anular_factura.php";*/
    ?>
								<div class="row">
										<!-- <div id="resultados" class='col-md-12' style="margin-top:10px"></div> --><!-- Carga los datos ajax -->
										<button onclick="agregarFila()" class="btn btn-primary">+</button>
    									<button onclick="finalizar()" class="btn btn-success">Finalizar</button>
										<table id="tabla">
											<thead>
												<tr>
													<th>ID</th>
													<th>Material</th>
													<th>Cantidad</th>
													<th>Medida</th>
													<th>Precio Unitario</th>
													<th>Total</th>
													<th>Acciones</th>
												</tr>
											</thead>
											<tbody>
												<!-- Filas se agregarán aquí -->
											</tbody>
										</table>

										<input type="hidden" id="totalMPPHP" name="totalMPPHP" value="">
										<div id="total-mp"></div>
										

								</div> 
								<div class="row">
									<div class="col-md-6">
										<label for="diasTrabajar">Días a Trabajar:</label>
										<input type="number" id="diasTrabajar" name="diasTrabajar" class="form-control" onchange="calcularMOD(); calcularDiarioDT();">
									</div>
									<div class="col-md-6">
										<label for="cantidadTrabajadores">Cantidad de Trabajadores:</label>
										<input type="number" id="cantidadTrabajadores" name="cantidadTrabajadores" class="form-control" onchange="calcularMOD(); calcularDiarioDT();">
									</div>
								</div>	
								<div class="row">
									<h4>Mano de Obra Directa (MOD)</h4>
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Salario Mensual</th>
												<th>Jornal Diario</th>
												<th>Total MOD</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><input type="number" id="salarioMensual" name="salarioMensual" onchange="calcularMOD()"></td>
												<td><input type="text" id="jornalDiario" name="jornalDiario" readonly></td>
												<td><input type="text" id="totalMOD" name="totalMOD" readonly></td>
											</tr>
										</tbody>
									</table>
									<div id="totalMODResult"></div>
									<input type="hidden" id="totalMODPHP" name="totalMODPHP" value="">
								</div>

								<div class="row">
									<div class="col-md-12">
										<h4>Gastos Operativos</h4>
									</div>
									<div>
										<button onclick="agregarFilaGastos()" class="btn btn-primary">+ Agregar Gasto</button> 
										<button onclick="finalizarGastos()" class="btn btn-success">Finalizar Gastos</button>
									</div>
									<div class="table-responsive">
										<table id="gastosOperativos" class="table table-bordered">
											<thead>
												<tr>
													<th>Concepto</th>
													<th>Total Mensual</th>
													<th>Total Diario según DT</th>
													<th>Acciones</th>
												</tr>
											</thead>
											<tbody>
												<!-- Filas se agregarán aquí -->
											</tbody>
										</table>
									</div>
									<div id="diarioDTResult"></div>
									<input type="hidden" id="totalDiarioDTPHP" name="totalDiarioDTPHP" value="">
									
								</div>

								<div class="row">
									<div class="col-md-6">
										<h4>Costos y Ganancias</h4>
										<button id="btn-calcular" class="btn btn-primary">Calcular</button>
									</div>
									<div class="col-md-6">
										
									</div>
									<div class="col-md-3">
										<label for="porcentajePuntoEquilibrio">Porcentaje de Punto de Equilibrio:</label>
										<input type="number" id="porcentajePuntoEquilibrio" name="porcentajePuntoEquilibrio" class="form-control">
									</div>
									<div class="col-md-3">
										<label for="porcentajeGanancia">Porcentaje de Ganancia Esperada:</label>
										<input type="number" id="porcentajeGanancia" name="porcentajeGanancia" class="form-control">
									</div>
									<div class="col-md-3">
										<label for="cantidadAProducir">Cantidad a Producir:</label>
										<input type="number" id="cantidadAProducir" name="cantidadAProducir" class="form-control">
									</div>
									
								</div>

								<div id="resultadosCostosGanancias"></div>











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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript" src="../../js/VentanaCentrada.js"></script>
<script type="text/javascript" src="../../js/produccion.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- ============================================================== -->
<!-- Codigos Para el Auto complete de Clientes -->
<script>

</script>
<script>
    var contador = 1;

    function agregarFila() {
        var table = document.getElementById("tabla").getElementsByTagName('tbody')[0];
        var newRow = table.insertRow(table.rows.length);

        var idCell = newRow.insertCell(0);
        var materialCell = newRow.insertCell(1);
        var cantidadCell = newRow.insertCell(2);
        var medidaCell = newRow.insertCell(3);
        var precioCell = newRow.insertCell(4);
        var totalCell = newRow.insertCell(5);
        var accionesCell = newRow.insertCell(6);

        idCell.innerHTML = contador++;
        materialCell.innerHTML = '<input type="text" name="material[]">';
        cantidadCell.innerHTML = '<input type="number" name="cantidad[]">';
        medidaCell.innerHTML = '<input type="text" name="medida[]">';
        precioCell.innerHTML = '<input type="number" name="precio[]">';
        totalCell.innerHTML = '<input type="text" name="total[]" readonly>';
        accionesCell.innerHTML = '<button onclick="eliminarFila(this)" class="btn btn-danger">-</button>';

        $('input[name^="cantidad"], input[name^="precio"]').on('input', function() {
            var row = $(this).closest('tr');
            var cantidad = parseFloat(row.find('input[name^="cantidad"]').val()) || 0;
            var precio = parseFloat(row.find('input[name^="precio"]').val()) || 0;
            row.find('input[name^="total"]').val(cantidad * precio);
        });
    }

    function eliminarFila(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    function finalizar() {
        var data = [];
		var totalMP = 0;
        $('#tabla tbody tr').each(function(index, tr) {
            var row = [];
            $('td', tr).each(function(index, td) {
                var inputValue = $(td).find('input').val();
                row.push(inputValue);
                if (index === 5) { // Índice 5 es la columna del total
                    totalMP += parseFloat(inputValue) || 0;
                }
            });
            data.push(row);
        });

        console.log(data);
		// Mostrar total debajo de la tabla
        $('#total-mp').html('<strong style="border: solid 2px;padding: 10px; margin: 10px; display: flex;">Total de la Materia Prima: Gs. ' + totalMP.toFixed(0) + '</strong>');

        $('#totalMPPHP').val(totalMP.toFixed(0));
    }
</script>

<script>
	function calcularMOD() {
    var salarioMensual = parseFloat($('#salarioMensual').val()) || 0;
    var diasTrabajar = parseInt($('#diasTrabajar').val()) || 0;
    var cantidadTrabajadores = parseInt($('#cantidadTrabajadores').val()) || 0;

    var jornalDiario = salarioMensual / 26;
    var totalMOD = jornalDiario * diasTrabajar * cantidadTrabajadores;

    $('#jornalDiario').val(jornalDiario.toFixed(2));
    $('#totalMOD').val(totalMOD.toFixed(2));
    $('#totalMODResult').html('<strong>Total MOD: Gs. ' + totalMOD.toFixed(0) + '</strong>');

    $('#totalMODPHP').val(totalMOD.toFixed(0));
}

</script>

<script>
	var contadorGastos = 1;

	function agregarFilaGastos() {
		var table = document.getElementById("gastosOperativos").getElementsByTagName('tbody')[0];
		var newRow = table.insertRow(table.rows.length);

		var conceptoCell = newRow.insertCell(0);
		var totalMensualCell = newRow.insertCell(1);
		var diarioDTCell = newRow.insertCell(2);
		var accionesCell = newRow.insertCell(3);

		conceptoCell.innerHTML = '<input type="text" name="concepto[]">';
		totalMensualCell.innerHTML = '<input type="number" name="totalMensual[]" onchange="calcularDiarioDT()"> ';
		diarioDTCell.innerHTML = '<input type="text" name="diarioDT[]" readonly>';
		accionesCell.innerHTML = '<button onclick="eliminarFilaGastos(this)" class="btn btn-danger">-</button>';

		$('input[name^="totalMensual"]').on('input', function() {
			calcularDiarioDT();
		});
	}

	function eliminarFilaGastos(btn) {
		var row = btn.parentNode.parentNode;
		row.parentNode.removeChild(row);
		calcularDiarioDT(); // Recalcular al eliminar una fila
	}

	function calcularDiarioDT() {
		$('#gastosOperativos tbody tr').each(function(index, tr) {
			var totalMensual = parseFloat($(tr).find('input[name="totalMensual[]"]').val()) || 0;
			var diarioDT = (totalMensual / 30) * parseInt($('#diasTrabajar').val()) || 0;
			$(tr).find('input[name="diarioDT[]"]').val(diarioDT.toFixed(2));
		});
	}

	function finalizarGastos() {
		var totalDiarioDT = 0;

		$('#gastosOperativos tbody tr').each(function(index, tr) {
			var diarioDT = parseFloat($(tr).find('input[name="diarioDT[]"]').val()) || 0;
			totalDiarioDT += diarioDT;
		});

		$('#diarioDTResult').html('<strong>Sumatoria Total Diario según DT: Gs. ' + totalDiarioDT.toFixed(0) + '</strong>');

		$('#totalDiarioDTPHP').val(totalDiarioDT.toFixed(0));
	}

</script>




<!-- En lugar de la lógica de AJAX actual -->
<!-- <script>
    function realizarSolicitudAJAX(data, successCallback, errorCallback) {
        $.ajax({
            url: "produccion_ajax.php",
            type: "POST",
            dataType: "json",
            data: data,
            success: function(response) {
                if (successCallback && typeof successCallback === 'function') {
                    successCallback(response);
                }
            },
            error: function(error) {
                if (errorCallback && typeof errorCallback === 'function') {
                    errorCallback(error);
                }
            }
        });
    }
</script>





<script>
    $(document).ready(function() {
	   $("#btn-calcular").on("click", function() {
            // Obtener los valores de los inputs ocultos
			var totalMPPHP = $("#totalMPPHP").val();
			var totalMODPHP = $("#totalMODPHP").val();
			var totalDiarioDTPHP = $("#totalDiarioDTPHP").val();

			console.log(totalMPPHP, totalMODPHP, totalDiarioDTPHP);
            // Datos que se enviarán en la solicitud AJAX
            var datos = {
				totalMPPHP: totalMPPHP,
				totalMODPHP: totalMODPHP,
				totalDiarioDTPHP: totalDiarioDTPHP
				// Puedes agregar más datos según sea necesario
			};

            // Función de éxito para manejar la respuesta del servidor
            function successCallback(response) {
                console.log(response);
                $('#resultadosCostosGanancias').html(response);
            }

            // Función de error para manejar cualquier error en la solicitud AJAX
            function errorCallback(error) {
                console.error("Error en la solicitud Ajax:", error);
            }

            // Llamar a la función para realizar la solicitud AJAX
            realizarSolicitudAJAX(datos, successCallback, errorCallback);
        });
    });

</script> -->


<script>
    $(document).ready(function() {
        $("#btn-calcular").on("click", function() {
            // Obtener los valores de los inputs
            var totalMPPHP = parseFloat($("#totalMPPHP").val()) || 0;
            var totalMODPHP = parseFloat($("#totalMODPHP").val()) || 0;
            var totalDiarioDTPHP = parseFloat($("#totalDiarioDTPHP").val()) || 0;
            var porcentajePuntoEquilibrio = parseFloat($("#porcentajePuntoEquilibrio").val()) || 0;
            var porcentajeGanancia = parseFloat($("#porcentajeGanancia").val()) || 0;
            var cantidadAProducir = parseInt($("#cantidadAProducir").val()) || 0;

            // Calcular costo y ganancia
            var costoTotal = totalMPPHP + totalMODPHP + totalDiarioDTPHP;
            var gananciaEsperada = costoTotal * (porcentajeGanancia / 100);
            var precioVenta = costoTotal + gananciaEsperada;
            var precioUnitario = precioVenta / cantidadAProducir;

            // Imprimir resultados
            var resultadosHTML = '<strong>Costo Total: Gs. ' + costoTotal.toFixed(0) + '</strong><br>';
            resultadosHTML += '<strong>Ganancia Esperada: Gs. ' + gananciaEsperada.toFixed(0) + '</strong><br>';
            resultadosHTML += '<strong>Precio de Venta: Gs. ' + precioVenta.toFixed(0) + '</strong><br>';
            resultadosHTML += '<strong>Precio Unitario: Gs. ' + precioUnitario.toFixed(0) + '</strong><br>';
            
            $('#resultadosCostosGanancias').html(resultadosHTML);
        });
    });
</script>


<!-- FIN -->

 <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
			margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>

   
<?php require 'includes/footer_end.php';




?>