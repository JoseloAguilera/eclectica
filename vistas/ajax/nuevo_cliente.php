<?php
include 'is_logged.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/
if (empty($_POST['nombre_cliente'])) {
    $errors[] = "Nombre vacío";
} else if (empty($_POST['fiscal_cliente'])) {
    $errors[] = "RUC vacío";
} else if (empty($_POST['telefono_cliente'])) {
    $errors[] = "Teléfono vacío";
} else if (empty($_POST['email_cliente'])) {
    $errors[] = "Email vacío";
} else if (empty($_POST['direccion_cliente'])) {
    $errors[] = "Dirección vacío";
} else if (
    !empty($_POST['nombre_cliente']) &&
    !empty($_POST['fiscal_cliente']) &&
    !empty($_POST['telefono_cliente']) &&
    !empty($_POST['email_cliente']) &&
    !empty($_POST['direccion_cliente']) &&
    $_POST['status_cliente'] != ""
    ) {
    /* Connect To Database*/
    require_once "../db.php";
    require_once "../php_conexion.php";
    // escaping, additionally removing everything that could be (html/javascript-) code
    $nombre     = mysqli_real_escape_string($conexion, (strip_tags($_POST["nombre_cliente"], ENT_QUOTES)));
    $fiscal     = mysqli_real_escape_string($conexion, (strip_tags($_POST["fiscal_cliente"], ENT_QUOTES)));
    $telefono   = mysqli_real_escape_string($conexion, (strip_tags($_POST["telefono_cliente"], ENT_QUOTES)));
    $email      = mysqli_real_escape_string($conexion, (strip_tags($_POST["email_cliente"], ENT_QUOTES)));
    $direccion  = mysqli_real_escape_string($conexion, (strip_tags($_POST["direccion_cliente"], ENT_QUOTES)));
    $estado     = intval($_POST['status_cliente']);
    $date_added = date("Y-m-d H:i:s");
    $facebook   = mysqli_real_escape_string($conexion, (strip_tags($_POST["facebook"], ENT_QUOTES)));
    $instagram  = mysqli_real_escape_string($conexion, (strip_tags($_POST["instagram"], ENT_QUOTES)));
    $twitter    = mysqli_real_escape_string($conexion, (strip_tags($_POST["twitter"], ENT_QUOTES)));
    $tiktok     = mysqli_real_escape_string($conexion, (strip_tags($_POST["tiktok"], ENT_QUOTES)));
    $fec_nacimiento = date("Y-m-d H:i:s");
    $ciudad     = mysqli_real_escape_string($conexion, (strip_tags($_POST["ciudad"], ENT_QUOTES)));
    $canal_comunicacion  = mysqli_real_escape_string($conexion, (strip_tags($_POST["canal_comunicacion"], ENT_QUOTES)));
    $hijos      = mysqli_real_escape_string($conexion, (strip_tags($_POST["hijos"], ENT_QUOTES)));
    $pareja     = mysqli_real_escape_string($conexion, (strip_tags($_POST["pareja"], ENT_QUOTES)));
    $int_mayorista  = mysqli_real_escape_string($conexion, (strip_tags($_POST["int_mayorista"], ENT_QUOTES)));
    // check if user or email address already exists
    $sql                   = "SELECT * FROM clientes WHERE fiscal_cliente ='" . $fiscal . "';";
    $query_check_user_name = mysqli_query($conexion, $sql);
    $query_check_user      = mysqli_num_rows($query_check_user_name);
    if ($query_check_user == true) {
        $errors[] = "Lo sentimos , el documento ó la dirección de correo electrónico ya está en uso.";
    } else {
        // write new user's data into database
        $sql              = "INSERT INTO clientes (nombre_cliente, fiscal_cliente, telefono_cliente, email_cliente, direccion_cliente, status_cliente, date_added, facebook, instagram, twitter, tiktok, fec_nacimiento, ciudad, canal_comunicacion, hijos, pareja, int_mayorista) VALUES ('$nombre','$fiscal','$telefono','$email','$direccion','$estado','$date_added', '$facebook', '$instagram', '$twitter', '$tiktok', '$fec_nacimiento', '$ciudad', '$canal_comunicacion', '$hijos', '$pareja', '$int_mayorista')";
        $query_new_insert = mysqli_query($conexion, $sql);
        if ($query_new_insert) {
            $messages[] = "Cliente ha sido ingresado con Exito.";
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