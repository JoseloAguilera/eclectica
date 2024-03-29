<?php

include 'is_logged.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
$session_id = session_id();
/* Connect To Database*/
require_once "../db.php";
require_once "../php_conexion.php";
//Archivo de funciones PHP
require_once "../funciones.php";
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['cantidad'])) {$cantidad = $_POST['cantidad'];}
if (isset($_POST['or'])) {$or = $_POST['or'];}
if (isset($_POST['des'])) {$des = $_POST['des'];}

if (!empty($id) and !empty($cantidad) and !empty($or) and !empty($des)) {
    // consulta para comparar el stock con la cantidad resibida
    $sql_st = "select stock_producto from $or where id_producto = '$id'";
    $query = mysqli_query($conexion, $sql_st);
    $rw    = mysqli_fetch_array($query);
    $stock = $rw['stock_producto'];

    //Comprobamos si ya agregamos ese producto a la tabla tmp_transferencia, si existe, suma stock
    $sql_org = "select * from tmp_transferencia, $or where $or.id_producto = tmp_transferencia.id_producto and tmp_transferencia.id_producto='" . $id . "' and tmp_transferencia.session_id='" . $session_id . "'";

    $comprobar = mysqli_query($conexion, $sql_org);
    if ($row = mysqli_fetch_array($comprobar)) {
        $cant = $row['cantidad_tmp'] + $cantidad;
    // condicion si el stock e menor que la cantidad requerida
        if ($cant > $row['stock_producto']) {
            echo "<script>swal('LA CANTIDAD SUPERA AL STOCK', 'INTENTAR NUEVAMENTE', 'error')
            $('#resultados').load('../ajax/agregar_tmp_trans.php');
            </script>";
            exit;
        } else {
            $sql          = "UPDATE tmp_transferencia SET cantidad_tmp='" . $cant . "' WHERE id_producto='" . $id . "' and session_id='" . $session_id . "'";
            $query_update = mysqli_query($conexion, $sql);
            echo "<script> $.Notification.notify('success','bottom center','NOTIFICACIÓN', 'PRODUCTO AÑADIDO CORRECTAMENTE')</script>";
         }
        // fin codicion cantaidad

    } else {
    // condicion si el stock e menor que la cantidad requerida
        if ($cantidad > $stock) {
            echo "<script>swal('LA CANTIDAD SUPERA AL STOCK', 'INTENTAR NUEVAMENTE', 'error')
             $('#resultados').load('../ajax/agregar_tmp_trans.php');
            </script>";
            exit;
        } else {
            $insert_tmp = mysqli_query($conexion, "INSERT INTO tmp_transferencia (id_producto,cantidad_tmp,session_id) VALUES ('$id','$cantidad','$session_id')");
            echo "<script> $.Notification.notify('success','bottom center','NOTIFICACIÓN', 'PRODUCTO AÑADIDO CORRECTAMENTE')</script>";
        }
        // fin codicion cantaidad
    }

       //probar ocultar columnas
       $sql_count= "SELECT count(*) AS numrows FROM tmp_transferencia";
       $count_query = mysqli_query($conexion,  $sql_count);
       $rowq        = mysqli_fetch_array($count_query);
       $numrows     = $rowq['numrows'];

}
if (isset($_GET['id'])) //codigo elimina un elemento del array
{
    $id_tmp = intval($_GET['id']);
    $delete = mysqli_query($conexion, "DELETE FROM tmp_transferencia WHERE id_tmp='" . $id_tmp . "'");
}
//$simbolo_moneda = get_row('perfil', 'moneda', 'id_perfil', 1);

?>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead class="thead-default">
                <tr>
                    <th class='text-center'>COD</th>
                    <th></th>
                    <th class='text-center'>CANT.</th>
                    <th class='text-center'>DESCRIP.</th>
                    
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

    $sql        = mysqli_query($conexion, "select * from productos, tmp_transferencia where productos.id_producto=tmp_transferencia.id_producto and tmp_transferencia.session_id='" . $session_id . "'");
    $rowt = mysqli_fetch_array($sql);
                    if( $rowt == null){
                        ?>
                            <script type="text/javascript">
                                var origen = document.getElementById('id_origen'); 
                                origen.removeAttribute("disabled");

                                var desti = document.getElementById('id_destino'); 
                                desti.removeAttribute("disabled");
                            </script>
                        <?php
                    }else{
                        ?>
                            <script type="text/javascript">
                                var e = document.getElementById('id_origen'); 
                                e.setAttribute('disabled', 'true');

                                var d = document.getElementById('id_destino'); 
                                d.setAttribute('disabled', 'true');
                            </script>
                        <?php
                    } 
    $sql            = mysqli_query($conexion, "select * from productos, tmp_transferencia where productos.id_producto=tmp_transferencia.id_producto and tmp_transferencia.session_id='" . $session_id . "'");
    while ($row = mysqli_fetch_array($sql)) {
        $id_tmp          = $row["id_tmp"];
        $codigo_producto = $row['codigo_producto'];
        $id_producto     = $row['id_producto'];
        $cantidad        = $row['cantidad_tmp'];
        $nombre_producto = $row['nombre_producto'];
        $image_path      = $row['image_path'];
        
        ?>
        <tr>
            <td class='text-center'><?php echo $codigo_producto; ?></td>
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
            <td class='text-center'><?php echo $cantidad; ?></td>
            <td class='text-center'><?php echo $nombre_producto; ?></td>
            <td class='text-center'>
                <a href="#" class='btn btn-danger btn-sm waves-effect waves-light' onclick="eliminar('<?php echo $id_tmp ?>')"><i class="fa fa-remove"></i>
                </a>
            </td>
        </tr>
        <?php
    }

    ?>
    </tbody>
    </table>
    </div>
    <script>
     //Inicia Control de Permisos
    include "../permisos.php";
    $user_id = $_SESSION['id_users'];
    get_cadena($user_id);
    $modulo = "Productos";
    permisos($modulo, $cadena_permisos);
    //Finaliza Control de Permisos
    //var_dump($permisos_eliminar);
    ?>
    <input type="hidden" id="permiso" value="<?php echo $permisos_eliminar; ?>">
    <script>
        $(document).ready(function () {
            permiso = document.getElementById('permiso').value;
            $('.txt_desc').off('blur');
            $('.txt_desc').on('blur',function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
            // if(keycode == '13'){
                id_tmp = $(this).attr("id");
                desc = $(this).val();
                
       /*  $.ajax({
            type: "POST",
            url: "../ajax/editar_desc_venta.php",
            data: "id_tmp=" + id_tmp + "&desc=" + desc,
            success: function(datos) {
               $("#resultados").load("../ajax/agregar_tmp.php");
               $.Notification.notify('success','bottom center','EXITO!', 'DESCUENTO ACTUALIZADO CORRECTAMENTE')
           }
       }); */
            // }
        });
         /* $(".employee_id").on("change", function(event) {
             id_tmp = $(this).attr("id");
            precio = $(this).val();
            $.ajax({
                type: "POST",
                url: "../ajax/editar_precio_venta.php",
                data: "id_tmp=" + id_tmp + "&precio=" + precio,
                success: function(datos) {
                   $("#resultados").load("../ajax/agregar_tmp.php");
                   $.Notification.notify('success','bottom center','EXITO!', 'PRECIO ACTUALIZADO CORRECTAMENTE')
               }
           });
        }); */

        });
    </script>