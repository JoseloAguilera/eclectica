<?php

include 'is_logged.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
$session_id = session_id();

/* Connect To Database*/
require_once "../db.php";
require_once "../php_conexion.php";
//Archivo de funciones PHP
require_once "../funciones.php";


?>
<div class="row">
    <div class= 'col-lg-2'>
            <label for="cant_producida" class="control-label">Cantidad a Producir</label>
            <input type="number" class="form-control" autocomplete="off" id="cant_producida" name="cant_producida">
    </div>
</div>
<div class='row'>
    <div class= 'col-lg-12'>
        <div class="card-box">
            <form class="form-horizontal" method="post" id="guardar_materia_prima" name="guardar_materia_prima">
                <div class="row">
                    <label for="material" class="control-label">Material</label>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="material" name="material" autocomplete="off" required>
                        </div>
                    </div>

                    <label for="cantidad" class="control-label">Cantidad</label>
                    <div class="col-md-1">
                        <div class="form-group">
                            <input type="text" class="form-control" id="cantidad" name="cantidad" autocomplete="off" required>
                        </div>
                    </div>

                    <label for="un_medi1a" class="control-label">Un. Medida</label>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="text" class="form-control" id="un_medida" name="un_medida" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <a class='btn btn-success' href="#" title="Agregar a Factura" onclick=""><i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">

    <div class= 'col-lg-12'>
        <div class="card-box">
            <div class="widget-chart">
                <label>Materia Prima</label>
                    <div class="table table-bordered" style='height: 150px; overflow: scroll' id="table-wrapper-prod"> 
                        <table class="table table-sm">
                            <thead class="thead-default">
                                <tr>
                                    <th class='text-center' style='width:130px'>Id</th>
                                    <th class='text-center' style='minWidth:50px'>Material</th>
                                    <th class='text-center' style='width:130px'>Cantidad</th>
                                    <th class='text-center' style='width:130px'>Un. Medida</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class='text-center' style='width:130px'>a</td>
                                    <td class='text-left' style='minWidth:50px'>b</td>
                                    <td class='text-center' style='width:130px'>c</td>
                                    <td class='text-center' style='width:130px'>d</td>
                                
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div> 

    <div class='col-lg-12'>
            <div class="card-box">
                <div class="widget-chart">
                <label>Mano de Obra Directa</label>
                    <form role="form" id="mano_obra">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="salario_mensual">Salario Mensual</label>
                                <input type="number" class="form-control" autocomplete="off" id="salario_mensual" name="salario_mensual">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jornal_diario" class="control-label">Jornal Diario</label>
                                <input type="number" class="form-control" autocomplete="off" id="jornal_diario" name="jornal_diario" disabled="true">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dias_trabajados">Días trabajados</label>
                                <input type="number" class="form-control" autocomplete="off" id="dias_trabajados" name="dias_trabajados">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cant_trabajadores" class="control-label">Trabajadores</label>
                                <input type="number" class="form-control" autocomplete="off" id="cant_trabajadores" name="cant_trabajadores">
                            </div>
                        </div>
                    </div>
                    </form>
                </div> 
            </div> 
    </div> 

    <div class= 'col-lg-12'>
        <div class="card-box">
            <div class="widget-chart">
                <label>Gastos Operativos</label>
                    <div class="table table-bordered" style='height: 150px; overflow: scroll' id="table-wrapper-prod"> 
                        <table class="table table-sm">
                            <thead class="thead-default">
                                <tr>
                                    <th class='text-center' style='width:130px'>Id</th>
                                    <th class='text-center' style='minWidth:50px'>Descripcion</th>
                                    <th class='text-center' style='width:200px'>Costo Gs</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class='text-center' style='width:130px'>a</td>
                                    <td class='text-left' style='minWidth:50px'>b</td>
                                    <td class='text-center' style='width:200px'>c</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div> 
        </div> 
    </div> 
    
</div> 
<div class="row">
    <div class='col-md-12'>
        <div class="card-box">
            <div class="widget-chart">
                <form role="form" id="produccion">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="costos_produccion">Costos de Produccion</label>
                                <input type="number" class="form-control" autocomplete="off" id="costos_produccion" name="costos_produccion" disabled="true">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="punto_equilibrio" class="control-label">Punto de Equilibrio</label>
                                <input type="number" class="form-control" autocomplete="off" id="punto_equilibrio" name="punto_equilibrio" disabled="true">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="equilibrio_unit" class="control-label">Punto de Equilibrio Un</label>
                                <input type="number" class="form-control" autocomplete="off" id="equilibrio_unit" name="equilibrio_unit" disabled="true">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="porcentaje">% Ganancia Esperada</label>
                                <input type="number" class="form-control" autocomplete="off" id="porcentaje" name="porcentaje">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gea" class="control-label">Ganancia Asignada (GEA)</label>
                                <input type="number" class="form-control" autocomplete="off" id="gea" name="gea">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="precio_venta_calc" class="control-label">Precio Venta Calculado</label>
                                <input type="number" class="form-control" autocomplete="off" id="precio_venta_calc" name="precio_venta_calc" disabled="true">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="precio_final" class="control-label">Precio Venta</label>
                                <input type="number" class="form-control" autocomplete="off" id="precio_final" name="precio_final">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="margen" class="control-label">Ganancia o Perdida por Redondeo</label>
                                <input type="number" class="form-control" autocomplete="off" id="margen" name="margen">
                            </div>
                        </div>

                    </div>
                </form>
            </div> 
        </div> 
    </div>
</div>
<?php 
//Inicia Control de Permisos
include "../permisos.php";
$user_id = $_SESSION['id_users'];
get_cadena($user_id);
$modulo = "Ventas";
permisos($modulo, $cadena_permisos);
//Finaliza Control de Permisos
//var_dump($permisos_eliminar);
?>
<input type="hidden" id="permiso" value="<?php echo $permisos_eliminar; ?>">
<script>
    $(document).ready(function () {
        permiso = document.getElementById('permiso').value;
        $('.txt_desc').off('blur');
        $('.txt_desc').on('blur',function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
        // if(keycode == '13'){
            id_tmp = $(this).attr("id");
            desc = $(this).val();
             //Inicia validacion
             
    });


    });
</script>

