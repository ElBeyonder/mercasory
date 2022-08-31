<?php
    session_start();
    require_once '../../../../config.php';
    $opcion = $_POST['opcion'];
    $tabla = 'interesado';


    if (isset($_SESSION['u_id'])){
        $id_usuario = $conn->real_escape_string($_SESSION['u_id']);
    }
    if (isset($_POST['id'])){
        $id = $conn->real_escape_string($_POST['id']);
    }

    if (isset($_POST['nombres'])){
        $nombres = $conn->real_escape_string($_POST['nombres']);
    }else{
        $nombres = '';
    }
    if (isset($_POST['apellidos'])){
        $apellidos = $conn->real_escape_string($_POST['apellidos']);
    }else{
        $apellidos = '';
    }
    if (isset($_POST['celular1'])){
        $celular1 = $conn->real_escape_string($_POST['celular1']);
    }else{
        $celular1 = '';
    }
    if (isset($_POST['correo'])){
        $correo = $conn->real_escape_string($_POST['correo']);
    }else{
        $correo = '';
    }
    if (isset($_POST['programa_interes'])){
        $programa_interes = $conn->real_escape_string($_POST['programa_interes']);
    }else{
        $programa_interes = '';
    }
    if (isset($_POST['direccion'])){
        $direccion = $conn->real_escape_string($_POST['direccion']);
    }else{
        $direccion = '';
    }
    if (isset($_POST['asesor'])){
        $asesor = $conn->real_escape_string($_POST['asesor']);
    }else{
        $asesor = '';
    }
    if (isset($_POST['fecha1'])){
        $fecha1 = $conn->real_escape_string($_POST['fecha1']);
    }else{
        $fecha1 = '';
    }
    if (isset($_POST['1_contacto_seguimiento'])){
        $contacto_seguimiento_1 = $conn->real_escape_string($_POST['1_contacto_seguimiento']);
    }else{
        $contacto_seguimiento_1 = '';
    }
    if (isset($_POST['fecha2'])){
        $fecha2 = $conn->real_escape_string($_POST['fecha2']);
    }else{
        $fecha2 = '';
    }
    if (isset($_POST['2_contacto_seguimiento'])){
        $contacto_seguimiento_2 = $conn->real_escape_string($_POST['2_contacto_seguimiento']);
    }else{
        $contacto_seguimiento_2 = '';
    }
    if (isset($_POST['fecha3'])){
        $fecha3 = $conn->real_escape_string($_POST['fecha3']);
    }else{
        $fecha3 = '';
    }
    if (isset($_POST['3_contacto_seguimiento'])){
        $contacto_seguimiento_3 = $conn->real_escape_string($_POST['3_contacto_seguimiento']);
    }else{
        $contacto_seguimiento_3 = '';
    }


    switch ($opcion){
        case 1:
            $output='';
            $sql = "INSERT INTO `interesado`(`nombres`, `apellidos`, `celular`, `correo`, `programa_interes`, `direccion`, `asesor`, 
                         `fecha1`, `contacto_seguimiento_1`, `fecha2`, `contacto_seguimiento_2`, `fecha3`, `contacto_seguimiento_3`) 
                    VALUES ('".$nombres."', '".$apellidos."', '".$celular1."', '".$correo."', '".$programa_interes."', '".$direccion."', '".$asesor."',
                     '".$fecha1."', '".$contacto_seguimiento_1."', '".$fecha2."', '".$contacto_seguimiento_2."','".$fecha3."', '".$contacto_seguimiento_3."')";
            if ($conn->query($sql) === TRUE) {
                $output='';
            } else {
                $output='e';
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            echo json_encode($output);
            $conn->close();
            break; /* AGREGAR */
        case 2:

            $sql = "DELETE FROM ".$tabla." WHERE id='".$id."' ";
            if ($conn->query($sql) === TRUE) {
                $output='';
            } else {
                $output="Error deleting record: " . $conn->error;
            }
            echo json_encode($output);
            $conn->close();
            break; /* ELIMINAR */
        case 3:

            $sql = "SELECT * FROM ".$tabla." WHERE id='".$id."' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $output[]=$row;
                }
            } else {
                $output[]='';
            }
            echo json_encode($output);
            $conn->close();
            break; /* LEER */
        case 4:
            $sql = "UPDATE `interesado` SET `nombres`='".$nombres."',`apellidos`='".$apellidos."',`celular`='".$celular1."',`correo`='".$correo."',`programa_interes`='".$programa_interes."',
                        `direccion`='".$direccion."', `asesor`='".$asesor."', `fecha1`='".$fecha1."', `contacto_seguimiento_1`='".$contacto_seguimiento_1."',
                         `fecha2`='".$fecha2."', `contacto_seguimiento_2`='".$contacto_seguimiento_2."', `fecha3`='".$fecha3."', `contacto_seguimiento_3`='".$contacto_seguimiento_3."'
                    WHERE  id='".$id."' ";
            if ($conn->query($sql) === TRUE) {
                $output='';
            } else {
                $output="Error al actualizar el usuario: " . $conn->error;
            }
            echo json_encode($output);
            $conn->close();
            break; /* ACTUALIZAR */
        case 5:

            /* variables */
            $limit = 5;
            $order = 'DESC';
            $page = 1;
            if ($_POST['page'] > 0) {
                $start = (($_POST['page'] - 1) * $limit);
                $page = $_POST['page'];
            } else {
                $start = 0;
            }
            if (isset($_POST['search'])){
                $search = $conn->real_escape_string($_POST['search']);
            }else{
                $search ='';
            }
            /* variables (fin) */


            $query="SELECT  * FROM ".$tabla."  ";
            if (!empty($search)){
                $query.=' 
                        WHERE ('.$tabla.'.nombres LIKE "%'.str_replace(' ', '%', $search).'%"
                        OR '.$tabla.'.apellidos LIKE "%'.str_replace(' ', '%', $search).'%"
                        OR '.$tabla.'.programa_interes LIKE "%'.str_replace(' ', '%', $search).'%")
                        ';
            }

            $query.=" ORDER BY ".$tabla.".id  ".$order." ";
            $filter_query=$query.'LIMIT '.$start.', '.$limit.'';
            $statement = $connect->prepare($query);
            $statement->execute();
            $total_data = $statement->rowCount();
            $statement = $connect->prepare($filter_query);
            $statement->execute();
            $result = $statement->fetchAll();
            $total_filter_data = $statement->rowCount();
            $output = '<div class="col s12 text-left" style="margin-top: 1rem;"><span class="badge left left-align">Item(s): '.$total_data.'</span></div>';
            $output.= '<table class="table table-scrollable table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" style="width: 50px;">N°</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Correo</th>
                                        <th class="text-center">Celular</th>
                                        <th class="text-center">Direccion</th>
                                        <th class="text-center">programa interes</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                            <tbody>';


            if ($total_data > 0) {
                foreach ($result as $row) {

                    $output.='<tr>
                                            <td class="text-center" style="width: 50px;">'.$row['id'].'</td>
                                            <td class="text-left">'.$row['nombres'].' '.$row['apellidos'].'</td>
                                            <td class="text-left">'.$row['correo'].'</td>
                                            <td class="text-left">'.$row['celular'].'</td>
                                            <td class="text-left">'.$row['direccion'].'</td>
                                            <td class="text-left">'.$row['programa_interes'].'</td>
                                            <td class="text-center">
                                                <div class="table-content-center">
                                                    <div class="btn-group">
                                                        <button value="'.$row['id'].'" type="button" data-target="modal_editar" class="leer-item btn green modal-trigger"><i class="fa fa-fw fa-pencil-alt"></i></button>
                                                        <button value="'.$row['id'].'" type="button" class="eliminar btn red"><i class="fad fa-trash-alt"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                      </tr>
                                     ';
                }
            } else {
                $output.='<tr><td colspan="100%" class="text-sm-center">Sin resultados</td></tr>';
            }
            /* PAGINADOR */
            $total_links = ceil($total_data/$limit);
            $output.='</tbody></table><div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 center">';
            $output.= paginador($total_links, $page);
            $output.='</div>';
            echo $output;

            break; /* LISTA  */
        case 6:

            header('Content-type:application/xls');
            header('Content-Disposition: attachment; filename=LISTA INTERESADOS.xls');

            /* variables */
            $order = 'DESC';
            if (isset($_POST['search'])){
                $search = $conn->real_escape_string($_POST['search']);
            }else{
                $search ='';
            }
            /* variables (fin) */


            $query="SELECT  * FROM ".$tabla."  ";
            if (!empty($search)){
                $query.=' 
                        WHERE ('.$tabla.'.nombres LIKE "%'.str_replace(' ', '%', $search).'%"
                        OR '.$tabla.'.apellidos LIKE "%'.str_replace(' ', '%', $search).'%"
                        OR '.$tabla.'.programa_interes LIKE "%'.str_replace(' ', '%', $search).'%")
                        ';
            }

            $query.=" ORDER BY ".$tabla.".id  ".$order." ";
            $statement = $connect->prepare($query);
            $statement->execute();
            $total_data = $statement->rowCount();
            $result = $statement->fetchAll();
            $total_filter_data = $statement->rowCount();
            $output = '<div class="col s12 text-left" style="margin-top: 1rem;"><span class="badge left left-align">Item(s): '.$total_data.'</span></div>';
            $output.= '<table class="table table-scrollable table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" style="width: 50px;">N°</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Correo</th>
                                        <th class="text-center">Celular</th>
                                        <th class="text-center">Direccion</th>
                                        <th class="text-center">programa interes</th>
                                        <th class="text-center">Asesor</th>
                                        <th class="text-center">Fecha 1</th>
                                        <th class="text-center">1 Seguimiento</th>
                                        <th class="text-center">Fecha 2</th>
                                        <th class="text-center">2 Seguimiento</th>
                                        <th class="text-center">Fecha 3</th>
                                        <th class="text-center">3 Seguimiento</th>
                                        <th class="text-center">Fecha creacion</th>
                                    </tr>
                                </thead>
                            <tbody>';


            if ($total_data > 0) {
                foreach ($result as $row) {

                    $output.='<tr>
                                            <td class="text-center" style="width: 50px;">'.$row['id'].'</td>
                                            <td class="text-left">'.$row['nombres'].' '.$row['apellidos'].'</td>
                                            <td class="text-left">'.$row['correo'].'</td>
                                            <td class="text-left">'.$row['celular'].'</td>
                                            <td class="text-left">'.$row['direccion'].'</td>
                                            <td class="text-left">'.$row['programa_interes'].'</td>
                                            <td class="text-left">'.$row['asesor'].'</td>
                                            <td class="text-left">'.$row['fecha1'].'</td>
                                            <td class="text-left">'.$row['contacto_seguimiento_1'].'</td>
                                            <td class="text-left">'.$row['fecha2'].'</td>
                                            <td class="text-left">'.$row['contacto_seguimiento_2'].'</td>
                                            <td class="text-left">'.$row['fecha3'].'</td>
                                            <td class="text-left">'.$row['contacto_seguimiento_3'].'</td>
                                            <td class="text-center">'.$row['fecha_creacion'].'</td>
                                      </tr>
                                     ';
                }
            } else {
                $output.='<tr><td colspan="100%" class="text-sm-center">Sin resultados</td></tr>';
            }

            echo utf8_decode($output);
            break; /* EXPORTAR EXCEL */
        default:
            echo json_encode('No hay accion');
    }















