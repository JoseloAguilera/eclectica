<?php
include 'is_logged.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/
if (empty($_POST['nombre'])) {
    $errors[] = "Nombre vacío";
} else if (empty($_POST['fiscal'])) {
    $errors[] = "Fiscal vacío";
} else if (empty($_POST['contacto'])) {
    $errors[] = "Contacto vacío";
} else if ($_POST['estado'] == "") {
    $errors[] = "Selecciona el estado del producto";
} else if (
    !empty($_POST['nombre']) &&
    !empty($_POST['fiscal']) &&
    !empty($_POST['contacto']) &&
    $_POST['estado'] != ""
) {
    /* Connect To Database*/
    require_once "../db.php";
    require_once "../php_conexion.php";
    // escaping, additionally removing everything that could be (html/javascript-) code
    $nombre     = mysqli_real_escape_string($conexion, (strip_tags($_POST["nombre"], ENT_QUOTES)));
    $fiscal     = mysqli_real_escape_string($conexion, (strip_tags($_POST["fiscal"], ENT_QUOTES)));
    $web        = mysqli_real_escape_string($conexion, (strip_tags($_POST["web"], ENT_QUOTES)));
    $direccion  = mysqli_real_escape_string($conexion, (strip_tags($_POST["direccion"], ENT_QUOTES)));
    $rubro      = mysqli_real_escape_string($conexion, (strip_tags($_POST["rubro"], ENT_QUOTES)));
    $especialidad = mysqli_real_escape_string($conexion, (strip_tags($_POST["especialidad"], ENT_QUOTES)));
    $contacto   = mysqli_real_escape_string($conexion, (strip_tags($_POST["contacto"], ENT_QUOTES)));
    $email      = mysqli_real_escape_string($conexion, (strip_tags($_POST["email"], ENT_QUOTES)));
    $telefono   = mysqli_real_escape_string($conexion, (strip_tags($_POST["telefono"], ENT_QUOTES)));
    $estado     = intval($_POST['estado']);
    $date_added = date("Y-m-d H:i:s");
    //cambios
    $facebook   = mysqli_real_escape_string($conexion, (strip_tags($_POST["facebook"], ENT_QUOTES)));
    $instagram  = mysqli_real_escape_string($conexion, (strip_tags($_POST["instagram"], ENT_QUOTES)));
    $twitter    = mysqli_real_escape_string($conexion, (strip_tags($_POST["twitter"], ENT_QUOTES)));
    $tiktok     = mysqli_real_escape_string($conexion, (strip_tags($_POST["tiktok"], ENT_QUOTES)));
    // hasta aca
    // check if user or email address already exists
    $sql                   = "SELECT * FROM proveedores WHERE fiscal_proveedor ='" . $fiscal . "';";
    $query_check_user_name = mysqli_query($conexion, $sql);
    $query_check_user      = mysqli_num_rows($query_check_user_name);
    if ($query_check_user == true) {
        $errors[] = "Lo sentimos , el documento ó la dirección de correo electrónico ya está en uso.";
    } else {
        // write new user's data into database
        $sql              = "INSERT INTO proveedores (nombre_proveedor, fiscal_proveedor, web_proveedor, direccion_proveedor, contacto_proveedor, email_proveedor, telefono_proveedor, date_added, estado_proveedor, facebook, instagram, twitter, tiktok, rubro, especialidad) 
            VALUES ('$nombre','$fiscal','$web','$direccion','$contacto','$email','$telefono','$date_added','$estado', '$facebook', '$instagram', '$twitter', '$tiktok', '$rubro', '$especialidad')";
        $query_new_insert = mysqli_query($conexion, $sql);
        if ($query_new_insert) {
            $messages[] = "Proveedor ha sido ingresado con Exito.";
        } else {
            $errors[] = "Lo siento algo ha salido mal intenta nuevamente." . mysqli_error($conexion);
        }
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