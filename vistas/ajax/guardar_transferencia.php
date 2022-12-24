<?php
include 'is_logged.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/

if (isset($_POST['or'])) {$or = $_POST['or'];}
if (isset($_POST['des'])) {$des = $_POST['des'];}
if (empty($_POST['or']) || empty($_POST['des'])) {
    //var_dump($_POST);
    $errors[] = "Origen y Destino VACIO";
} else if (!empty($_POST['or']) || !empty($_POST['des'])) {
    /* Connect To Database*/
    require_once "../db.php";
    require_once "../php_conexion.php";
    //Archivo de funciones PHP
    require_once "../funciones.php";
    $session_id     = session_id();
//Comprobamos si hay archivos en la tabla temporal
    $sql_count = mysqli_query($conexion, "select * from tmp_transferencia where session_id='" . $session_id . "'");
    $count     = mysqli_num_rows($sql_count);
    if ($count == 0) {
        echo "<script>
        swal({
          title: 'No hay Productos a transferir',
          text: 'Intentar nuevamente',
          type: 'error',
          confirmButtonText: 'ok'
      })</script>";
        exit;
    }
 
    $sql           = mysqli_query($conexion, "select * from tmp_transferencia where tmp_transferencia.session_id='" . $session_id . "'");
    while ($row = mysqli_fetch_array($sql)) {
        $id_tmp          = $row["id_tmp"];
        $id_producto     = $row['id_producto'];
        $cantidad        = $row['cantidad_tmp'];
        // ACTUALIZA EN EL STOCK
        //Obtiene stock del origen
        $sql2    = mysqli_query($conexion, "select * from $or where id_producto='" . $id_producto . "'");
        $rw      = mysqli_fetch_array($sql2);
        $old_stock_or = $rw['stock_producto']; //Cantidad encontrada en el inventario

        //obtiene stock del destino
        $sql3    = mysqli_query($conexion, "select * from $des where id_producto='" . $id_producto . "'");
        $rw3      = mysqli_fetch_array($sql3);
        if($rw3){
            $old_stock_des = $rw3['stock_producto']; //Cantidad encontrada en el inventario
        }else{
            //en teoria solo pasaria con ferias esto
            $old_stock_des = 0; 
            $insert_des = mysqli_query($conexion, "INSERT INTO $des VALUES (NULL,'$id_producto','$old_stock_des')");
            
        }
        $new_stock_or = $old_stock_or - $cantidad; //Nueva cantidad en el inventario
        $new_stock_des = $old_stock_des + $cantidad; //Nueva cantidad en el inventario

        $update_or      = mysqli_query($conexion, "UPDATE $or SET stock_producto='" . $new_stock_or . "' WHERE id_producto='" . $id_producto . "'"); //Actualizo la nueva cantidad en el inventario origen
        $update_des     = mysqli_query($conexion, "UPDATE $des SET stock_producto='" . $new_stock_des . "' WHERE id_producto='" . $id_producto . "'"); //Actualizo la nueva cantidad en el inventario destino
        //$nums++;
    }
    // Fin de la consulta Principal

    $delete = mysqli_query($conexion, "DELETE FROM tmp_transferencia WHERE session_id='" . $session_id . "'");
    // SI TODO ESTA CORRECTO
    if ($update_or && $update_des) {
       
        $messages[] = "Producto transferido Correctamente.";
    } else {
        $errors[] = "Lo siento algo ha salido mal intenta nuevamente." . mysqli_error($conexion);
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
if (isset($messages)) {

    ?>
    <div class="alert alert-success" role="alert">
        <strong>¡Bien hecho!</strong>
        <?php
foreach ($messages as $message) {
        echo $message;
    }
    ?>
    </div>
    <?php
}

?>
