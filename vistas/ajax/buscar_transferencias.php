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
//Archivo de funciones PHP
include "../funciones.php";
//Inicia Control de Permisos
include "../permisos.php";
$user_id = $_SESSION['id_users'];
get_cadena($user_id);
$modulo = "Productos";
permisos($modulo, $cadena_permisos);
//Finaliza Control de Permisos
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    // escaping, additionally removing everything that could be (html/javascript-) code
    $q            = ($_GET['q']);
    $sTable       = "$q";
    include 'pagination.php'; //include pagination file
    //pagination variables
    $page      = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page  = 10; //how much records you want to show
    $adjacents = 4; //gap between pages after number of adjacents
    $offset    = ($page - 1) * $per_page;
    //Count the total number of row in your table*/
    $count_query = mysqli_query($conexion, "SELECT count(*) AS numrows FROM $sTable ");
    $row         = mysqli_fetch_array($count_query);
    //var_dump($row);
    $numrows     = $row['numrows'];
    $total_pages = ceil($numrows / $per_page);
    $reload      = '../html/transferencia.php';
    //main query to fetch the data
    $sql   = "SELECT * FROM  $sTable LIMIT $offset,$per_page";
    //var_dump($sql);
    $query = mysqli_query($conexion, $sql);
    //loop through fetched data
    if ($numrows > 0) {
        ?>
        <div class="table-responsive">
          <table class="table table-sm table-striped">
            <tr  class="info">
                
                <th>Producto</th>
                <th></th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                
            </tr>
            <?php
        while ($row = mysqli_fetch_array($query)) {
            //$id_feria           = $row['id_feria'];
            $id_producto        = $row['id_producto'];
            $stock_producto     = $row['stock_producto'];
           
            $sql_prod = "Select * from productos where id_producto = $id_producto";
            $query_prod = mysqli_query($conexion, $sql_prod);
            $row_prod = mysqli_fetch_array($query_prod);
            $desc_producto = $row_prod['nombre_producto'];
            $image_path    = $row_prod['image_path'];
           
           
            
            
            ?>
                <input type="hidden" value="<?php echo $id_producto; ?>" id="id_producto<?php  ?>">
                <input type="hidden" value="<?php echo $stock_producto; ?>" id="stock_producto<?php echo $stock_producto; ?>">
               
                <tr>
                    <td><?php echo $id_producto; ?></td>
                    <td class='text-center'>
                        <?php
                            if ($image_path == null) {
                                 echo '<img src="../../img/productos/default.jpg" class="" width="60">';
                            } else {
                                echo '<img src="' . $image_path . '" class="" width="60">';
                            }

            ?>
                       
                    </td>
                    <td><?php echo $desc_producto; ?></td>
                    <td ><?php echo $stock_producto; ?></td>
                    
                </tr>
           <?php
        }
        ?>
       <tr>
                <td colspan="7">
                    <span class="pull-right">
                        <?php
                            echo paginate($reload, $page, $total_pages, $adjacents);
                        ?>
                    </span>
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
      <strong>Aviso!</strong> No hay Registro de Producto
  </div>
  <?php
}
// fin else
}
?>