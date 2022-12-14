<?php
    session_start();
    require_once '../../../../config.php';
    $opcion = $_POST['opcion'];
    $tabla = 'evento';


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
    if (isset($_POST['celular2'])){
        $celular2 = $conn->real_escape_string($_POST['celular2']);
    }else{
        $celular2 = '';
    }
    if (isset($_POST['programa_academico'])){
        $programa_academico = $conn->real_escape_string($_POST['programa_academico']);
    }else{
        $programa_academico = '';
    }
    if (isset($_POST['evento'])){
        $evento = $conn->real_escape_string($_POST['evento']);
    }else{
        $evento = '';
    }
    if (isset($_POST['fecha_evento'])){
        $fecha_evento = $conn->real_escape_string($_POST['fecha_evento']);
    }else{
        $fecha_evento = '';
    }
    if (isset($_POST['correo'])){
        $correo = $conn->real_escape_string($_POST['correo']);
    }else{
        $correo = '';
    }
    if (isset($_POST['autorizo_envio_informacion'])){
        $autorizo_envio_informacion = $conn->real_escape_string($_POST['autorizo_envio_informacion']);
    }else{
        $autorizo_envio_informacion = '';
    }
    if (isset($_POST['observacion'])){
        $observacion = $conn->real_escape_string($_POST['observacion']);
    }else{
        $observacion = '';
    }


    switch ($opcion){
        case 1:
            $output='';
            $sql = "INSERT INTO `evento`(`nombres`, `apellidos`, `correo`, `celular1`, `celular2`, `programa_academico`, `evento`, `fecha_evento`, `observacion`, `autorizo_envio_informacion`) 
                    VALUES ('".$nombres."','".$apellidos."','".$correo."', '".$celular1."','".$celular2."', '".$programa_academico."', '".$evento."', '".$fecha_evento."', '".$observacion."', '".$autorizo_envio_informacion."')";
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

            $sql = "DELETE FROM evento WHERE id='".$id."' ";
            if ($conn->query($sql) === TRUE) {
                $output='';
            } else {
                $output="Error deleting record: " . $conn->error;
            }
            echo json_encode($output);
            $conn->close();
            break; /* ELIMINAR */
        case 3:

            $sql = "SELECT * FROM evento WHERE id='".$id."' ";
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
            $sql = "UPDATE `evento` SET `nombres`='".$nombres."',`apellidos`='".$apellidos."',`correo`='".$correo."',`celular1`='".$celular1."',`celular2`='".$celular2."',
                    `programa_academico`='".$programa_academico."',`evento`='".$evento."',`fecha_evento`=$fecha_evento,`observacion`='".$observacion."',
                    `autorizo_envio_informacion`='".$autorizo_envio_informacion."'
                    WHERE id='".$id."' ";
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
                        OR '.$tabla.'.evento LIKE "%'.str_replace(' ', '%', $search).'%"
                        OR '.$tabla.'.programa_academico LIKE "%'.str_replace(' ', '%', $search).'%")
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
            $output = '<div class="col-12 col-sm-12"><label class="label label-primary">Item(s): '.$total_data.'</label></div>';
            $output.= '<table class="table table-scrollable table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" style="width: 50px;">N??</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Correo</th>
                                        <th class="text-center">programa academico</th>
                                        <th class="text-center">Evento</th>
                                        <th class="text-center">Fecha evento</th>
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
                                            <td class="text-left">'.$row['programa_academico'].'</td>
                                            <td class="text-left">'.$row['evento'].'</td>
                                            <td class="text-left">'.$row['fecha_evento'].'</td>
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
            header('Content-Disposition: attachment; filename=LISTA EVENTOS.xls');

            /* variables */
            $limit = 5;
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
                        OR '.$tabla.'.programa_academico LIKE "%'.str_replace(' ', '%', $search).'%")
                        ';
            }

            $query.=" ORDER BY ".$tabla.".id  ".$order." ";
            $statement = $connect->prepare($query);
            $statement->execute();
            $total_data = $statement->rowCount();
            $result = $statement->fetchAll();
            $total_filter_data = $statement->rowCount();
            $output = '<div class="col-12 col-sm-12"><label class="label label-primary">Item(s): '.$total_data.'</label></div>';
            $output.= '<table class="table table-scrollable table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" style="width: 50px;">N??</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Correo</th>
                                        <th class="text-center">celular 1</th>
                                        <th class="text-center">celular 2</th>
                                        <th class="text-center">programa academico</th>
                                        <th class="text-center">Evento</th>
                                        <th class="text-center">Fecha evento</th>
                                        <th class="text-center">Autorizo envio informacion</th>
                                        <th class="text-center">observacion</th>
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
                                            <td class="text-left">'.$row['celular1'].'</td>
                                            <td class="text-left">'.$row['celular2'].'</td>
                                            <td class="text-left">'.$row['programa_academico'].'</td>
                                            <td class="text-left">'.$row['evento'].'</td>
                                            <td class="text-left">'.$row['fecha_evento'].'</td>
                                            <td class="text-left">'.$row['autorizo_envio_informacion'].'</td>
                                            <td class="text-left">'.$row['observacion'].'</td>
                                            <td class="text-center">
                                                '.$row['fecha_creacion'].'
                                            </td>
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















