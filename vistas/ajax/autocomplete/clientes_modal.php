<?php
if (isset($_REQUEST['id_cliente'])) {
    include "../../db.php";
    include "../../php_conexion.php";
    $return_arr = array();
/* If connection to database, run sql statement. */
    if ($conexion) {
        

        //$termino=mysqli_real_escape_string($conexion, ($_REQUEST['id_cliente']));
        $termino = intval($_REQUEST['id_cliente']);
        $fetch = mysqli_query($conexion, "SELECT * FROM clientes where id_cliente like '%$termino%' LIMIT 0 ,50");
        $row = mysqli_fetch_row($fetch);
        $cliente[] = array('id_cliente' => $row['nombre_cliente']);

        /* Retrieve and store in array the results of the query.*/
        //while ($row = mysqli_fetch_row($fetch)) {
            
           
           
           
           
           /* $id_cliente                  = $row['id_cliente'];
            $row_array['value']          = $row['nombre_cliente'];
            $row_array['id_cliente']     = $id_cliente;
            $row_array['nombre_cliente'] = $row['nombre_cliente'];
            $row_array['fiscal_cliente'] = $row['fiscal_cliente'];
            $row_array['email_cliente']  = $row['email_cliente'];
            array_push($return_arr, $row_array);*/
        //}

    }

/* Free connection resources. */
    mysqli_close($conexion);

/* Toss back results as json encoded array. */

    echo json_encode($cliente);

}
