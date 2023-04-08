<?php
include 'is_logged.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/
if (empty($_POST['mod_id'])) {
    $errors[] = "ID vacío";
} else if (empty($_POST['mod_nombre'])) {
    $errors[] = "Nombre vacío";
} else if ($_POST['mod_estado'] == "") {
    $errors[] = "Selecciona el estado del cliente";
} else if (
    !empty($_POST['mod_id']) &&
    !empty($_POST['mod_nombre']) &&
    $_POST['mod_estado'] != ""
) {
    /* Connect To Database*/
    require_once "../db.php";
    require_once "../php_conexion.php";
    // escaping, additionally removing everything that could be (html/javascript-) code
    $nombre    = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_nombre"], ENT_QUOTES)));
    $fiscal    = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_fiscal"], ENT_QUOTES)));
    $web       = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_web"], ENT_QUOTES)));
    $direccion = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_direccion"], ENT_QUOTES)));
    $contacto  = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_contacto"], ENT_QUOTES)));
    $email     = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_email"], ENT_QUOTES)));
    $telefono  = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_telefono"], ENT_QUOTES)));
    $facebook  = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_facebook"], ENT_QUOTES)));
    $instagram = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_instagram"], ENT_QUOTES)));
    $twitter   = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_twitter"], ENT_QUOTES)));
    $tiktok    = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_tiktok"], ENT_QUOTES)));
    $rubro     = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_rubro"], ENT_QUOTES)));
    $especialidad= mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_especialidad"], ENT_QUOTES)));
    $estado    = intval($_POST['mod_estado']);

    $id_proveedor = intval($_POST['mod_id']);
  
    $sql          = "UPDATE proveedores SET nombre_proveedor    ='" . $nombre . "',
                                            fiscal_proveedor    ='" . $fiscal . "',
                                            web_proveedor       ='" . $web . "',
                                            direccion_proveedor ='" . $direccion . "',
                                            contacto_proveedor  ='" . $contacto . "',
                                            email_proveedor     ='" . $email . "',
                                            estado_proveedor    ='" . $estado . "',
                                            facebook            ='" . $facebook . "',
                                            instagram           ='" . $instagram . "',
                                            twitter             ='" . $twitter . "',
                                            tiktok              ='" . $tiktok . "',
                                            rubro               ='" . $rubro  . "',
                                            telefono_proveedor  ='" . $telefono  . "',
                                            especialidad        ='" . $especialidad  . "'
                                            WHERE id_proveedor  ='" . $id_proveedor . "'";
    //echo $sql;
    $query_update = mysqli_query($conexion, $sql);
    if ($query_update) {
        $messages[] = "Proveedor ha sido actualizado con Exito.";
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