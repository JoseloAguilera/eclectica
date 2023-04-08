<?php
/*-----------------------
Autor: Delmar Lopez
http://www.softwys.com
----------------------------*/
include 'is_logged.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/* Connect To Database*/
require_once "../db.php";
require_once "../php_conexion.php";
//Inicia Control de Permisos
include "../permisos.php";
$user_id = $_SESSION['id_users'];
get_cadena($user_id);
$modulo = "Ventas";
permisos($modulo, $cadena_permisos);
/*Inicia validacion del lado del servidor*/
if (empty($_POST['id_factura'])) {
    $errors[] = "ID vacío";
} else if (
    !empty($_POST['id_factura'])

) {
    $id_factura = intval($_POST['id_factura']);
    $origen     = ($_POST['origen']);
    if ($anular = mysqli_query($conexion, "UPDATE facturas_ventas SET estado_factura=2  WHERE id_factura='$id_factura' and estado_factura=1")) {
    
        //ELIMINA DE LA TABLA DETALLE(FACTURA)
        //$delete = mysqli_query($conexion, "DELETE FROM facturas WHERE numero_factura='" . $numero_factura . "'");
        $anul = mysqli_query($conexion, "UPDATE detalle_fact_ventas SET importe_venta=0 WHERE id_factura='$id_factura'");
        if($reponer = mysqli_query($conexion, "select * from detalle_fact_ventas WHERE id_factura='" . $id_factura . "'")){
            while ($row_repo = mysqli_fetch_array($reponer)) {
                $producto   = $row_repo['id_producto'];
                $stock      = $row_repo['cantidad'];
                $stck_origen = mysqli_query($conexion, "select stock_producto from $origen where id_producto='" . $producto . "'");
                $canti = mysqli_fetch_array($stck_origen);
                $cant = $canti['stock_producto'] + $stock;
                $repocision = mysqli_query($conexion, "UPDATE $origen SET stock_producto=$cant WHERE id_producto='" . $producto . "'");
            }
        }
        
        
        //FIN
        ?>

       <div class="alert alert-success alert-dismissible" role="alert">
          <strong>Aviso!</strong> Factura Anulada exitosamente.
      </div>
      <?php
} else {
        ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
      <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
  </div>
  <?php

    }

} else {
    $errors[] = "Error desconocido.";
}

if (isset($errors)) {

    ?>
    <div class="alert alert-danger" role="alert">
        <strong>Error!</strong>
        <?php
foreach ($errors as $error) {
        echo $error;
    }
    ?>
    </div>
    <?php
}

?>