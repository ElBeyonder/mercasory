<?php
    session_start();
    require_once '../../../../config.php';
    $opcion = $_POST['opcion'];
    $tabla = 'inscrito';


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
    if (isset($_POST['programa_interes'])){
        $programa_interes = $conn->real_escape_string($_POST['programa_interes']);
    }else{
        $programa_interes = '';
    }
    if (isset($_POST['identificacion'])){
        $identificacion = $conn->real_escape_string($_POST['identificacion']);
    }else{
        $identificacion = '';
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
    if (isset($_POST['fecha_entevista'])){
        $fecha_entevista = $conn->real_escape_string($_POST['fecha_entevista']);
    }else{
        $fecha_entevista = '';
    }
    if (isset($_POST['direccion'])){
        $direccion = $conn->real_escape_string($_POST['direccion']);
    }else{
        $direccion = '';
    }
    if (isset($_POST['municipio'])){
        $municipio = $conn->real_escape_string($_POST['municipio']);
    }else{
        $municipio = '';
    }
    if (isset($_POST['estado'])){
        $estado = $conn->real_escape_string($_POST['estado']);
    }else{
        $estado = '';
    }
    if (isset($_POST['correo'])){
        $correo = $conn->real_escape_string($_POST['correo']);
    }else{
        $correo = '';
    }
    if (isset($_POST['pago_inscrito'])){
        $pago_inscrito = $conn->real_escape_string($_POST['pago_inscrito']);
    }else{
        $pago_inscrito = '';
    }
    if (isset($_POST['estado_documento'])){
        $estado_documento = $conn->real_escape_string($_POST['estado_documento']);
    }else{
        $estado_documento = '';
    }
    if (isset($_POST['postula_comfabeca'])){
        $postula_comfabeca = $conn->real_escape_string($_POST['postula_comfabeca']);
    }else{
        $postula_comfabeca = '';
    }
    if (isset($_POST['fecha_envio_comfabeca'])){
        $fecha_envio_comfabeca = $conn->real_escape_string($_POST['fecha_envio_comfabeca']);
    }else{
        $fecha_envio_comfabeca = '';
    }
    if (isset($_POST['modalidad_pago'])){
        $modalidad_pago = $conn->real_escape_string($_POST['modalidad_pago']);
    }else{
        $modalidad_pago = '';
    }
    if (isset($_POST['matricula_financiera'])){
        $matricula_financiera = $conn->real_escape_string($_POST['matricula_financiera']);
    }else{
        $matricula_financiera = '';
    }
    if (isset($_POST['matricula_academica'])){
        $matricula_academica = $conn->real_escape_string($_POST['matricula_academica']);
    }else{
        $matricula_academica = '';
    }
    if (isset($_POST['convenio'])){
        $convenio = $conn->real_escape_string($_POST['convenio']);
    }else{
        $convenio = '';
    }
    if (isset($_POST['como_entero'])){
        $como_entero = $conn->real_escape_string($_POST['como_entero']);
    }else{
        $como_entero = '';
    }
    if (isset($_POST['observacion'])){
        $observacion = $conn->real_escape_string($_POST['observacion']);
    }else{
        $observacion = '';
    }


    switch ($opcion){
        case 1:
            $output='';
            $sql = " INSERT INTO `inscrito`(`nombres`, `apellidos`, `programa_interes`, `identificacion`, `celular1`, `celular2`, `fecha_entrevista`, `direccion`,
                        `municipio`, `estado`, `correo`, `pago_inscrito`, `estado_documento`, `postula_comfabeca`, `fecha_envio_comfabeca`, 
                        `modalidad_pago`, `matricula_financiera`, `matricula_academica`, `convenio`, `como_entero`, `observacion`) 
                    VALUES ('".$nombres."', '".$apellidos."', '".$programa_interes."', '".$identificacion."', '".$celular1."', '".$celular2."', '".$fecha_entevista."', '".$direccion."',
                    '".$municipio."', '".$estado."', '".$correo."', '".$pago_inscrito."', '".$estado_documento."', '".$postula_comfabeca."', '".$fecha_envio_comfabeca."',
                    '".$modalidad_pago."', '".$matricula_financiera."', '".$matricula_academica."', '".$convenio."', '".$como_entero."', '".$observacion."') ";
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
            $sql = "UPDATE `inscrito` SET `nombres`='".$nombres."',`apellidos`='".$apellidos."',`programa_interes`='".$programa_interes."',`identificacion`='".$identificacion."',`celular1`='".$celular1."',
                      `celular2`='".$celular2."',`fecha_entrevista`='".$fecha_entevista."',`direccion`='".$direccion."',`municipio`='".$municipio."',`estado`='".$estado."',
                      `correo`='".$correo."',`pago_inscrito`='".$pago_inscrito."',`estado_documento`='".$estado_documento."',`postula_comfabeca`='".$postula_comfabeca."',
                      `fecha_envio_comfabeca`='".$fecha_envio_comfabeca."', `modalidad_pago`='".$modalidad_pago."',`matricula_financiera`='".$matricula_financiera."',`matricula_academica`='".$matricula_academica."',
                      `convenio`='".$convenio."',`como_entero`='".$como_entero."',`observacion`='".$observacion."'
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


            $query=" SELECT * FROM ".$tabla."  ";
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
                                            <td class="text-left">'.$row['celular1'].'</td>
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
            header('Content-Disposition: attachment; filename=LISTA INSCRITOS.xls');

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
                                        <th class="text-center">Identificacion</th>
                                        <th class="text-center">Correo</th>
                                        <th class="text-center">Celular 1</th>
                                        <th class="text-center">Celular 2</th>
                                        <th class="text-center">Direccion</th>
                                        <th class="text-center">programa interes</th>
                                        <th class="text-center">Fecha entrevista</th>
                                        <th class="text-center">Municipio</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">pago inscrito</th>
                                        <th class="text-center">Estado documento</th>
                                        <th class="text-center">Postula confabeca</th>
                                        <th class="text-center">Fecha envio confabeca</th>
                                        <th class="text-center">Modalidad pago</th>
                                        <th class="text-center">Matricula financiera</th>
                                        <th class="text-center">Matricula academica</th>
                                        <th class="text-center">Convenio</th>
                                        <th class="text-center">Como se entero?</th>
                                        <th class="text-center">Observacion</th>
                                        <th class="text-center">Fecha Creacion</th>
                                    </tr>
                                </thead>
                            <tbody>';


            if ($total_data > 0) {
                foreach ($result as $row) {

                    $output.='<tr>
                                            <td class="text-center" style="width: 50px;">'.$row['id'].'</td>
                                            <td class="text-left">'.$row['nombres'].' '.$row['apellidos'].'</td>
                                            <td class="text-left">'.$row['identificacion'].'</td>
                                            <td class="text-left">'.$row['correo'].'</td>
                                            <td class="text-left">'.$row['celular1'].'</td>
                                            <td class="text-left">'.$row['celular2'].'</td>
                                            <td class="text-left">'.$row['direccion'].'</td>
                                            <td class="text-left">'.$row['programa_interes'].'</td>
                                            <td class="text-left">'.$row['fecha_entrevista'].'</td>
                                            <td class="text-left">'.$row['municipio'].'</td>
                                            <td class="text-left">'.$row['estado'].'</td>
                                            <td class="text-left">'.$row['pago_inscrito'].'</td>
                                            <td class="text-left">'.$row['estado_documento'].'</td>
                                            <td class="text-left">'.$row['postula_comfabeca'].'</td>
                                            <td class="text-left">'.$row['fecha_envio_comfabeca'].'</td>
                                            <td class="text-left">'.$row['modalidad_pago'].'</td>
                                            <td class="text-left">'.$row['matricula_financiera'].'</td>
                                            <td class="text-left">'.$row['matricula_academica'].'</td>
                                            <td class="text-left">'.$row['convenio'].'</td>
                                            <td class="text-left">'.$row['como_entero'].'</td>
                                            <td class="text-left">'.$row['observacion'].'</td>
                                            <td class="text-left">'.$row['fecha_creacion'].'</td>
                                            
                                            <td class="text-center">
                                                
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















