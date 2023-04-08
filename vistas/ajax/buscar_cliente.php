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
//Inicia Control de Permisos
include "../permisos.php";
$user_id = $_SESSION['id_users'];
get_cadena($user_id);
$modulo = "Clientes";
permisos($modulo, $cadena_permisos);
//Finaliza Control de Permisos

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    $chk_h = ($_GET['chk_hijos']);
    $chk_p = ($_GET['chk_par']);
    $chk_m = ($_GET['chk_mayo']);
    // escaping, additionally removing everything that could be (html/javascript-) code
    $q        = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
    $aColumns = array('clientes.nombre_cliente', 'clientes.fiscal_cliente', 'ciudad.nombre_ciudad'); //Columnas de busqueda
    $sTable   = "clientes";
    $sWhere   = "";

    if ($_GET['q'] != "" || $chk_h=='true' || $chk_m=='true' || $chk_p=='true') {
        $sWhere = "WHERE (";
        if($chk_h=='true' && $chk_m=='true' && $chk_p=='true'){
            $sWhere .= "hijos='S' and pareja='S' and int_mayorista='S'";
            if($_GET['q'] != ""){
                $sWhere .= " AND ";
                for ($i = 0; $i < count($aColumns); $i++) {
                    $sWhere .=  $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
                }
                $sWhere = substr_replace($sWhere, "", -3);
            }
        }elseif($chk_h=='true' && $chk_p=='true' && $chk_m=='false'){
            $sWhere .= "hijos='S' and pareja='S'";
            if($_GET['q'] != ""){
                $sWhere .= " AND ";
                for ($i = 0; $i < count($aColumns); $i++) {
                    $sWhere .=  $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
                }
                $sWhere = substr_replace($sWhere, "", -3);
            }
        }elseif($chk_h=='true' && $chk_p=='false' && $chk_m=='false'){
            $sWhere .= "hijos='S'";
            if($_GET['q'] != ""){
                $sWhere .= " AND ";
                for ($i = 0; $i < count($aColumns); $i++) {
                    $sWhere .=  $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
                }
                $sWhere = substr_replace($sWhere, "", -3);
            }
        }elseif($chk_h=='false' && $chk_p=='true' && $chk_m=='false'){
            $sWhere .= "pareja='S'";
            if($_GET['q'] != ""){
                $sWhere .= " AND ";
                for ($i = 0; $i < count($aColumns); $i++) {
                    $sWhere .=  $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
                }
                $sWhere = substr_replace($sWhere, "", -3);
            }
        }elseif($chk_h=='false' && $chk_p=='true' && $chk_m=='true'){
            $sWhere .= "pareja='S' AND int_mayorista='S'";
            if($_GET['q'] != ""){
                $sWhere .= " AND ";
                for ($i = 0; $i < count($aColumns); $i++) {
                    $sWhere .=  $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
                }
                $sWhere = substr_replace($sWhere, "", -3);
            }
        }elseif($chk_h=='false' && $chk_p=='false' && $chk_m=='true'){
            $sWhere .= "int_mayorista='S'";
            if($_GET['q'] != ""){
                $sWhere .= " AND ";
                for ($i = 0; $i < count($aColumns); $i++) {
                    $sWhere .=  $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
                }
                $sWhere = substr_replace($sWhere, "", -3);
            }
        }elseif($chk_h=='true' && $chk_p=='false' && $chk_m=='true'){
            $sWhere .= "hijos='S' AND int_mayorista='S'";
            if($_GET['q'] != ""){
                $sWhere .= " AND ";
                for ($i = 0; $i < count($aColumns); $i++) {
                    $sWhere .=  $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
                }
                $sWhere = substr_replace($sWhere, "", -3);
            }
        }else{
            if($_GET['q'] != ""){
                for ($i = 0; $i < count($aColumns); $i++) {
                    $sWhere .=  $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
                }
                $sWhere = substr_replace($sWhere, "", -3);
            }
        }
        $sWhere .= ')';
    }
    $sWhere .= " order by id_cliente desc";
    include 'pagination.php'; //include pagination file
    //pagination variables
    $page      = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page  = 10; //how much records you want to show
    $adjacents = 4; //gap between pages after number of adjacents
    $offset    = ($page - 1) * $per_page;
    //Count the total number of row in your table*/
    $sqlcount = "SELECT count(*) AS numrows FROM $sTable LEFT JOIN ciudad ON $sTable.ciudad = ciudad.id_ciudad $sWhere";
    $count_query = mysqli_query($conexion, $sqlcount);
    $row         = mysqli_fetch_array($count_query);
    if($row != null){
        $numrows     = $row['numrows'];
    }else{
        $numrows     = 0;
    }
    
    $total_pages = ceil($numrows / $per_page);
    $reload      = '../html/clientes.php';
    //main query to fetch the data
    $sql   = "SELECT * FROM  $sTable LEFT JOIN ciudad ON $sTable.ciudad = ciudad.id_ciudad $sWhere LIMIT $offset,$per_page";
    //SELECT * FROM clientes a LEFT JOIN ciudad b ON a.ciudad = b.id_ciudad order by a.id_cliente desc LIMIT 0,10;
    $query = mysqli_query($conexion, $sql);
    //loop through fetched data
    if ($numrows > 0) {

        ?>
        <div class="table-responsive">
            <table class="table table-sm table-striped">
                <tr  class="info">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>RUC | CEDULA</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Nacimiento</th>
                    <th>Ciudad</th>
                   
                    <th>Facebook</th>
                    <th>Instagram</th>
                    <th>Twitter</th>
                    <th>Tiktok</th>
                    
                    <th>Canal</th>
                    <th>Hijos</th>
                    <th>Pareja</th>
                    <th>Mayorista</th>
                    <th>Estado</th>

                   
                    <th class='text-right'>Acciones</th>

                </tr>
                <?php
while ($row = mysqli_fetch_array($query)) {
            $id_cliente        = $row['id_cliente'];
            $nombre_cliente    = $row['nombre_cliente'];
            $fiscal_cliente    = $row['fiscal_cliente'];
            $telefono_cliente  = $row['telefono_cliente'];
            $email_cliente     = $row['email_cliente'];
            $direccion_cliente = $row['direccion_cliente'];
            $status_cliente    = $row['status_cliente'];
            $date_added        = date('d-m-Y', strtotime($row['date_added']));
            if ($status_cliente == 1) {
                $estado = "<span class='badge badge-success'>Activo</span>";
            } else {
                $estado = "<span class='badge badge-danger'>Inactivo</span>";
            }

            $facebook = $row['facebook'];
            $instagram = $row['instagram'];
            $twitter = $row['twitter'];
            $tiktok = $row['tiktok'];
            $fec_nacimiento = date('d-m-Y', strtotime($row['fec_nacimiento']));
            $fec_nacimiento2 = date('Y-m-d', strtotime($row['fec_nacimiento']));
             
            $ciudad = $row['ciudad'];
            $canal_comunicacion = $row['canal_comunicacion'];
            $hijos = $row['hijos'];
            $pareja = $row['pareja'];
            $int_mayorista = $row['int_mayorista'];
            $desc_ciudad = $row['nombre_ciudad'];
             //Obtener descripcion de ciudad

             /* if($ciudad != '' || $ciudad!= null){
                $sql_ciud = "Select nombre_ciudad from ciudad where id_ciudad = $ciudad";
                $query_ciud = mysqli_query($conexion, $sql_ciud);
                $row_ciud = mysqli_fetch_array($query_ciud);
                $desc_ciudad = $row_ciud['nombre_ciudad'];
             }else{
                $desc_ciudad = "";
             } */
            

            ?>

                    <input type="hidden" value="<?php echo $nombre_cliente; ?>" id="nombre_cliente<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $fiscal_cliente; ?>" id="fiscal_cliente<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $telefono_cliente; ?>" id="telefono_cliente<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $email_cliente; ?>" id="email_cliente<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $fec_nacimiento2; ?>" id="fec_nacimiento<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $ciudad; ?>" id="ciudad<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $direccion_cliente; ?>" id="direccion_cliente<?php echo $id_cliente; ?>">
                    

                    <input type="hidden" value="<?php echo $facebook; ?>" id="facebook<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $instagram; ?>" id="instagram<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $twitter; ?>" id="twitter<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $tiktok; ?>" id="tiktok<?php echo $id_cliente; ?>">
                    
                    <input type="hidden" value="<?php echo $canal_comunicacion; ?>" id="canal_comunicacion<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $hijos; ?>" id="hijos<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $pareja; ?>" id="pareja<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $status_cliente; ?>" id="status_cliente<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $int_mayorista; ?>" id="int_mayorista<?php echo $id_cliente; ?>">



                    <tr>
                        <td><span class="badge badge-purple"><?php echo $id_cliente; ?></span></td>
                        <td><?php echo $nombre_cliente; ?></td>
                        <td><?php echo $fiscal_cliente; ?></td>
                        <td ><?php echo $telefono_cliente; ?></td>
                        <td><?php echo $email_cliente; ?></td>
                        <td><?php echo $fec_nacimiento; ?></td>
                        <td><?php echo $desc_ciudad; ?></td>
                        

                        <td><?php echo $facebook; ?></td>
                        <td><?php echo $instagram; ?></td>
                        <td><?php echo $twitter; ?></td>
                        <td><?php echo $tiktok; ?></td>
                       
                        <td><?php echo $canal_comunicacion; ?></td>
                        <td><?php echo $hijos; ?></td>
                        <td><?php echo $pareja; ?></td>
                        <td><?php echo $int_mayorista; ?></td>

                        <td><?php echo $estado; ?></td>
                        

                        <td >
                            <div class="btn-group dropdown pull-right">
                                <button type="button" class="btn btn-warning btn-rounded btn-sm waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"> <i class='fa fa-cog'></i> <i class="caret"></i> </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                 <?php if ($permisos_editar == 1) {?>
                                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editarCliente" onclick="obtener_datos('<?php echo $id_cliente; ?>');"><i class='fa fa-edit'></i> Editar</a>
                                 <?php }
            if ($permisos_eliminar == 1) {?>
                                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $id_cliente; ?>"><i class='fa fa-trash'></i> Borrar</a>
                                 <?php }?>


                             </div>
                         </div>

                     </td>

                 </tr>
                 <?php
}
        ?>
             <tr>
                <td colspan="7">
                    <span class="pull-right">
                        <?php
echo paginate($reload, $page, $total_pages, $adjacents);
        ?></span>
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
          <strong>Aviso!</strong> No hay Registro de Clientes
      </div>
      <?php
}
// fin else
}
?>