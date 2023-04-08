<?php
include 'is_logged.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/
if (empty($_POST['mod_id'])) {
    $errors[] = "ID vacío";
} else if (empty($_POST['mod_nombre'])) {
    $errors[] = "Nombre vacío";
} else if (empty($_POST['mod_fiscal'])) {
    $errors[] = "Ruc vacío";
} else if (empty($_POST['mod_telefono'])) {
    $errors[] = "Telefono vacío";
} else if (empty($_POST['mod_direccion'])) {
    $errors[] = "Direccion vacía";
} else if ($_POST['mod_estado'] == "") {
    $errors[] = "Selecciona el estado del cliente";
} else if (
    !empty($_POST['mod_id']) &&
    !empty($_POST['mod_nombre']) &&
    !empty($_POST['mod_fiscal']) &&
    !empty($_POST['mod_telefono']) &&
    !empty($_POST['mod_direccion']) &&
    $_POST['mod_estado'] != ""
) {
    /* Connect To Database*/
    require_once "../db.php";
    require_once "../php_conexion.php";
    // escaping, additionally removing everything that could be (html/javascript-) code
    $nombre    = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_nombre"], ENT_QUOTES)));
    $fiscal    = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_fiscal"], ENT_QUOTES)));
    $telefono  = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_telefono"], ENT_QUOTES)));
    $email     = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_email"], ENT_QUOTES)));
    $direccion = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_direccion"], ENT_QUOTES)));
    $facebook = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_facebook"], ENT_QUOTES)));
    $instagram = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_instagram"], ENT_QUOTES)));
    $twitter = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_twitter"], ENT_QUOTES)));
    $tiktok = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_tiktok"], ENT_QUOTES)));
    $fec_nacimiento = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_fec_nacimiento"], ENT_QUOTES)));
    $ciudad = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_ciudad"], ENT_QUOTES)));
    $canal_comunicacion = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_canal_comunicacion"], ENT_QUOTES)));
    //var_dump($fec_nacimiento);
    
    if(isset($_POST['mod_hijos'])){
        $hijos = "S";
    }else{
        $hijos = "N";
    }
    if(isset($_POST['mod_pareja'])){
        $pareja = "S";
    }else{
        $pareja = "N";
    }
    if(isset($_POST['mod_int_mayorista'])){
        $int_mayorista = "S";
    }else{
        $int_mayorista = "N";
    }
    /* $hijos = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_hijos"], ENT_QUOTES))); 
    $pareja = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_pareja"], ENT_QUOTES)));
    $int_mayorista = mysqli_real_escape_string($conexion, (strip_tags($_POST["mod_int_mayorista"], ENT_QUOTES)));*/
    $estado    = intval($_POST['mod_estado']);
    $id_cliente = intval($_POST['mod_id']);
  
    $sql        = "UPDATE clientes SET nombre_cliente='" . $nombre . "',
                                        fiscal_cliente='" . $fiscal . "',
                                        telefono_cliente='" . $telefono . "',
                                        email_cliente='" . $email . "',
                                        direccion_cliente='" . $direccion . "',
                                        facebook='" . $facebook . "',
                                        instagram='" . $instagram . "',
                                        twitter='" . $twitter . "',
                                        tiktok='" . $tiktok . "',
                                        fec_nacimiento='" . $fec_nacimiento . "',
                                        ciudad='" . $ciudad . "',
                                        canal_comunicacion='" . $canal_comunicacion . "',
                                        hijos='" . $hijos . "',
                                        pareja='" . $pareja . "',
                                        int_mayorista='" . $int_mayorista . "',
                                        status_cliente='" . $estado . "'
                                        WHERE id_cliente='" . $id_cliente . "'";
    //echo $sql;
    $query_update = mysqli_query($conexion, $sql);
    if ($query_update) {
        $messages[] = "Cliente ha sido actualizado con Exito.";
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