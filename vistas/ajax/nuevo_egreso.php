<?php
include 'is_logged.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/
if (empty($_POST['fecha'])) {
    $errors[] = "Inserte fecha";
} else if (empty($_POST['cuenta_contable'])) {
    $errors[] = "Seleccione Cuenta Contable";
} else if (empty($_POST['proveedor'])) {
    $errors[] = "Seleccione Proveedor";
} else if ($_POST['nro_comprobante'] == "") {
    $errors[] = "Seleccione comprobante";
} else if ($_POST['medio_pago'] == "") {
    $errors[] = "Seleccione Medio de Pago";
} else if ($_POST['importe'] == "") {
    $errors[] = "Ingrese Importe";
}else if (
    !empty($_POST['fecha']) &&
    !empty($_POST['cuenta_contable']) &&
    !empty($_POST['proveedor']) &&
    !empty($_POST['concepto']) &&
    !empty($_POST['nro_comprobante']) &&
    !empty($_POST['medio_pago']) &&
    !empty($_POST['importe']) 
) {
    /* Connect To Database*/
    require_once "../db.php";
    require_once "../php_conexion.php";
    // escaping, additionally removing everything that could be (html/javascript-) code
    $fecha_str              = strtotime($_POST["fecha"]);
    $fecha                  = date("Y-m-d", $fecha_str);
    $cuenta_contable        = intval($_POST['cuenta_contable']);
    $proveedor              = intval($_POST['proveedor']);
    $concepto               = mysqli_real_escape_string($conexion, (strip_tags($_POST["concepto"], ENT_QUOTES)));
    $nro_comprobante        = mysqli_real_escape_string($conexion, (strip_tags($_POST["nro_comprobante"], ENT_QUOTES)));
    $medio_pago             = mysqli_real_escape_string($conexion, (strip_tags($_POST["medio_pago"], ENT_QUOTES)));
    $importe                = $_POST["importe"];
   
    // write new user's data into database
    $sql              = "INSERT INTO egresos (fecha, cuenta_contable, proveedor, concepto, nro_comprobante, medio_pago, importe) 
                        VALUES ('$fecha','$cuenta_contable','$proveedor','$concepto','$nro_comprobante','$medio_pago','$importe')";
    $query_new_insert = mysqli_query($conexion, $sql);
    if ($query_new_insert) {
        $messages[] = "Egreso ha sido ingresado con Exito.";
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