<?php

/*-------------------------
Autor: Delmar Lopez
Web: softwys.com
Mail: softwysop@gmail.com
---------------------------*/
include 'is_logged.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/* Connect To Database*/
require_once "../db.php";
require_once "../php_conexion.php";
//Inicia Control de Permisos
include "../permisos.php";
$user_id = $_SESSION['id_users'];
get_cadena($user_id);
$modulo = "Gastos";
permisos($modulo, $cadena_permisos);
//Finaliza Control de Permisos

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    // escaping, additionally removing everything that could be (html/javascript-) code
    $q        = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
    $aColumns = array('concepto', 'nro_comprobante', 'cuenta_contable'); //Columnas de busqueda
    $sTable   = "egresos";
    $sWhere   = "";
    if ($_GET['q'] != "") {
        $sWhere = "WHERE (";
        for ($i = 0; $i < count($aColumns); $i++) {
            $sWhere .= $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
        }
        $sWhere = substr_replace($sWhere, "", -3);
        $sWhere .= ')';
    }
    $sWhere .= " order by concepto";
    include 'pagination.php'; //include pagination file
    //pagination variables
    $page      = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page  = 10; //how much records you want to show
    $adjacents = 4; //gap between pages after number of adjacents
    $offset    = ($page - 1) * $per_page;
    //Count the total number of row in your table*/
    $count_query = mysqli_query($conexion, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
    $row         = mysqli_fetch_array($count_query);
    $numrows     = $row['numrows'];
    $total_pages = ceil($numrows / $per_page);
    $reload      = '../html/egresos.php';
    //main query to fetch the data
    $sql   = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
    $query = mysqli_query($conexion, $sql);
    //loop through fetched data
    if ($numrows > 0) {
//Hasta aca modificado por Luz
        ?>
        <div class="table-responsive">
            <table class="table table-sm table-striped">
                <tr  class="info">
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Cta Contable</th>
                    <th>Concepto</th>
                    <th>Proveedor</th>
                    <th>Comprobante</th>
                    <th>Medio Pago</th>
                    <th>Importe</th>
                    <th>Estado</th>
                    <th class='text-right'>Acciones</th>

                </tr>
                <?php
while ($row = mysqli_fetch_array($query)) {
            $id_egreso          = $row['id_egreso'];
            $fecha              = date('d/m/Y', strtotime($row['fecha']));
            $cuenta_contable    = $row['cuenta_contable'];
            $concepto           = $row['concepto'];
            $proveedor          = $row['proveedor'];
            $nro_comprobante    = $row['nro_comprobante'];
            $medio_pago         = $row['medio_pago'];
            $importe            = $row['importe'];
            $estado             = $row['estado'];
            $fecha_added        = date('d/m/Y', strtotime($row['fecha_added']));
            if ($estado == 1) {
                $estado = "<span class='badge badge-success'>Activo</span>";
            } else {
                $estado = "<span class='badge badge-danger'>Inactivo</span>";
            }

            ?>
                    <input type="hidden" value="<?php echo $id_egreso; ?>" id="id_egreso<?php echo $id_egreso; ?>">
                    <input type="hidden" value="<?php echo  $fecha; ?>" id="fecha<?php echo  $fecha; ?>">
                    <input type="hidden" value="<?php echo $cuenta_contable; ?>" id="cuenta_contable<?php echo $cuenta_contable; ?>">
                    <input type="hidden" value="<?php echo $concepto; ?>" id="concepto<?php echo $concepto; ?>">
                    <input type="hidden" value="<?php echo $proveedor; ?>" id="proveedor<?php echo $proveedor; ?>">
                    <input type="hidden" value="<?php echo $nro_comprobante; ?>" id="nro_comprobante<?php echo $nro_comprobante; ?>">
                    <input type="hidden" value="<?php echo $medio_pago; ?>" id="medio_pago<?php echo $medio_pago; ?>">
                    <input type="hidden" value="<?php echo $importe; ?>" id="importe<?php echo  $importe; ?>">
                    <input type="hidden" value="<?php echo $estado; ?>" id="estado<?php echo  $estado; ?>">

                    <tr>
                    <td><span class="badge badge-purple"><?php echo $id_egreso; ?></span></td>
                    <td><?php echo $fecha; ?></td>
                    <td><?php echo $cuenta_contable; ?></td>
                    <td><?php echo $concepto; ?></td>
                    <td><?php echo $proveedor; ?></td>
                    <td><?php echo $nro_comprobante; ?></td>
                    <td><?php echo $medio_pago; ?></td>
                    <td><?php echo $importe; ?></td>
                    <td><?php echo $estado; ?></td>

                    <td >
                        <div class="btn-group dropdown pull-right">
                            <button type="button" class="btn btn-warning btn-rounded btn-sm waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"> <i class='fa fa-cog'></i> <i class="caret"></i> </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                
                                <?php  if ($permisos_eliminar == 1) {?>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $id_egreso; ?>"><i class='fa fa-trash'></i> Anular</a>
                                <?php }?>

                            </div>
                        </div>

                 </td>

             </tr>
             <?php
}
        ?>
         <tr>
            <td colspan="12">
                <span class="pull-right">
                    <?php
echo paginate($reload, $page, $total_pages, $adjacents);
        ?></span>
                </td>
            </tr>
        </table>
    </div>
    <?php
}
//Este else Fue agregado de Prueba de prodria Quitar
    else {
        ?>
    <div class="alert alert-warning alert-dismissible" role="alert" align="center">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Aviso!</strong> No hay Registro de Clientes
  </div>
  <?php
}
// fin else
}
?>