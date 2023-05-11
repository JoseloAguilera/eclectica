<?php
/*-------------------------
Autor: Delmar Lopez
Web: www.softwys.com
Mail: softwysop@gmail.com
---------------------------*/
include 'is_logged.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/* Connect To Database*/
require_once "../db.php";
require_once "../php_conexion.php";
require_once "../funciones.php";

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    // escaping, additionally removing everything that could be (html/javascript-) code
    $q        = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['t'], ENT_QUOTES)));
    $o        = ($_GET['org']);
    $aColumns = array('productos.codigo_producto', 'productos.nombre_producto'); //Columnas de busqueda
    $sTable   = "productos";
    if($o == 'productos'){
        $sWhere   = "WHERE (STOCK_PRODUCTO > 0";
    }else{
        $sWhere   = "WHERE ($o.id_producto = productos.id_producto and $o.STOCK_PRODUCTO > 0 ";
    }
    if ($_GET['t'] != "") {
        $sWhere .= " and (";
        for ($i = 0; $i < count($aColumns); $i++) {
            $sWhere .= $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
        }
        
        $sWhere = substr_replace($sWhere, "", -3);
        $sWhere .= ")";
       
    }
    $sWhere .= ')';

    include 'pagination.php'; //include pagination file
    //pagination variables
    $page      = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page  = 5; //how much records you want to show
    $adjacents = 4; //gap between pages after number of adjacents
    $offset    = ($page - 1) * $per_page;
    //Count the total number of row in your table*/
    $count_query = mysqli_query($conexion, "SELECT count(*) AS numrows FROM $o where stock_producto >0");
    $row         = mysqli_fetch_array($count_query);
    $numrows     = $row['numrows'];
    $total_pages = ceil($numrows / $per_page);
    $reload      = '../venta/prueba.php';
    //main query to fetch the data
    if($o == 'productos'){
        $sql   = "SELECT * FROM  $o $sWhere LIMIT $offset,$per_page";
    }else{
        $sql   = "SELECT $o.id_feria, $o.id_producto, $o.stock_producto stock_origen,  productos.* FROM  $o, productos $sWhere LIMIT $offset,$per_page";
    }
    
    $query = mysqli_query($conexion, $sql);
    //loop through fetched data
    if ($numrows > 0) {
        ?>
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-sm">
                <tr  class="info">
                    <th></th>
                    <th>COD.</th>
                    <th class='text-center'>PRODUCTOS</th>
                    <th class='text-center'>STOCK</th>
                    <th class='text-center'>CANT</th>
                    <th class='text-center' style="width: 36px;"></th>
                </tr>
                <?php
        while ($row = mysqli_fetch_array($query)) {
            $id_producto     = $row['id_producto'];
            $codigo_producto = $row['codigo_producto'];
            $nombre_producto = $row['nombre_producto'];
            if($o !== 'productos'){
                $stock_producto  = $row['stock_origen'];
            }else{
                $stock_producto  = $row['stock_producto'];
            }
            
            //$precio_venta    = $row["valor1_producto"];
            //$precio_venta    = number_format($precio_venta, 0, '', '');
            //$precio_costo    = $row['costo_producto'];
            $image_path      = $row['image_path'];

            //Obtener descripcion del proveedor
           /*  $sql_prod = "Select * from productos where id_producto = $id_producto";
            $query_prod = mysqli_query($conexion, $sql_prod);
            $row_prod = mysqli_fetch_array($query_prod);
            $codigo_producto = $row_prod['codigo_producto'];
            $nombre_producto = $row_prod['nombre_producto'];
            $precio_venta    = $row_prod["valor1_producto"];
            $precio_venta    = number_format($precio_venta, 0, '', '');
            $precio_costo    = $row_prod['costo_producto'];
            $image_path      = $row_prod['image_path']; */

            ?>
                    <tr>
                        <td class='text-center'>
                            <?php
                                if ($image_path == null) {
                                    echo '<img src="../../img/productos/default.jpg" class="" width="60">';
                                } else {
                                    echo '<img src="' . $image_path . '" class="" width="60">';
                                }
                            ?>
                            <!--<img src="<?php echo $image_path; ?>" alt="Product Image" class='rounded-circle' width="60">-->
                        </td>
                        <td><?php echo $codigo_producto; ?></td>
                        <td><?php echo $nombre_producto; ?></td>
                        <td class="text-center"><?php echo stock($stock_producto); ?></td>
                        <td class='col-xs-1' width="15%">
                        <div class="pull-right">
                        <input type="text" class="form-control" style="text-align:center" id="cantidad_<?php echo $id_producto; ?>"  value="1" >
                        </div>
                        </td>
                        <td class='text-center'>
                        <a class='btn btn-success' href="#" title="Transferir" onclick="agregar('<?php echo $id_producto ?>')"><i class="fa fa-plus"></i>
                        </a>
                        </td>
                    </tr>
                    <?php
}
        ?>
                <tr>
                    <td colspan=6><span class="pull-right">
                    <?php
echo paginate($reload, $page, $total_pages, $adjacents);
        ?></span></td>
                </tr>
              </table>
            </div>
            <?php
}
//Este else Fue agregado de Prueba de prodria Quitar
    else {
        ?>
    <div class="alert alert-warning alert-dismissible" role="alert" align="center">
      <strong>Aviso!</strong> No hay Registro de Producto
  </div>
  <?php
}
// fin else
}
?>