<?php
    session_start();
    require_once '../../../../config.php';
    $opcion = $_POST['opcion'];
    $tabla = 'prospecto';

    if (isset($_SESSION['u_id'])){
        $id_usuario = $conn->real_escape_string($_SESSION['u_id']);
    }

    if (isset($_POST['id'])){
        $id = $conn->real_escape_string($_POST['id']);
    }
    if (isset($_POST['primer_nombre'])){
        $primer_nombre = $conn->real_escape_string($_POST['primer_nombre']);
    }else{
        $primer_nombre = '';
    }
    if (isset($_POST['segundo_nombre'])){
        $segundo_nombre = $conn->real_escape_string($_POST['segundo_nombre']);
    }else{
        $segundo_nombre = '';
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
    if (isset($_POST['direccion'])){
        $direccion = $conn->real_escape_string($_POST['direccion']);
    }else{
        $direccion = '';
    }
    if (isset($_POST['fecha_entrevista'])){
        $fecha_entrevista = $conn->real_escape_string($_POST['fecha_entrevista']);
    }else{
        $fecha_entrevista = '';
    }
    if (isset($_POST['municipio'])){
        $municipio = $conn->real_escape_string($_POST['municipio']);
    }else{
        $municipio = '';
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
    if (isset($_POST['postula_confabeca'])){
        $postula_confabeca = $conn->real_escape_string($_POST['postula_confabeca']);
    }else{
        $postula_confabeca = '';
    }
    if (isset($_POST['fecha_envio_confabeca'])){
        $fecha_envio_confabeca = $conn->real_escape_string($_POST['fecha_envio_confabeca']);
    }else{
        $fecha_envio_confabeca = '';
    }
    if (isset($_POST['matricula_financiera'])){
        $matricula_financiera = $conn->real_escape_string($_POST['matricula_financiera']);
    }else{
        $matricula_financiera = '';
    }
    if (isset($_POST['modalidad_pago'])){
        $modalidad_pago = $conn->real_escape_string($_POST['modalidad_pago']);
    }else{
        $modalidad_pago = '';
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


    switch ($opcion){
        case 1:
            $output='';
            $sql = "INSERT INTO `prospecto`(`primer_nombre`, `segundo_nombre`, `apellidos`, `celular_1`, `celular_2`, `direccion`, `fecha_entrevista`, `municipio`,
                        `correo`, `pago_inscrito`, `estado_documento`, `postula_confabeca`, `fecha_envio_confabeca`, `modalidad_pago`, `matricula_financiera`, `matricula_academica`, `convenio`, `como_entero`) 
                    VALUES ('".$primer_nombre."', '".$segundo_nombre."', '".$apellidos."', '".$celular1."', '".$celular2."', '".$direccion."', '".$fecha_entrevista."',
                     '".$municipio."', '".$correo."', '".$pago_inscrito."', '".$estado_documento."', '".$postula_confabeca."', '".$fecha_envio_confabeca."', '".$modalidad_pago."', '".$matricula_financiera."',
                      '".$matricula_academica."', '".$convenio."', '".$como_entero."')";
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
            $output='';
            $sql = "DELETE FROM `prospecto` WHERE id='".$id."' ";
            if ($conn->query($sql) === TRUE) {
                $output='';
            } else {
                $output='e';
                $output.="Error al eliminar el item: " . $conn->error;
            }
            echo json_encode($output);
            $conn->close();
            break; /* eliminar */
        case 3:
            $sql = "SELECT * FROM `prospecto` WHERE id='".$id."' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $output[]=$row;
                }
            } else {
                $output='';
            }
            echo json_encode($output);
            $conn->close();
            break; /* LEER */
        case 4:
            $sql = "UPDATE `evento` SET `nombre`='".$nombre."' WHERE id='".$id."' ";
            if ($conn->query($sql) === TRUE) {
                $output='';
            } else {
                $output='e';
                $output="Error al actualizar el item: " . $conn->error;
            }
            echo json_encode($output);
            $conn->close();
            break; /* actualizar */
        case 5:

            /* variables */
            if (isset($_POST['limit'])) {
                $limit = $_POST['limit'];
            } else {
                $limit = 5;
            }
            if (isset($_POST['order'])) {
                $order = $_POST['order'];
            } else {
                $order = 'DESC';
            }
            $page = 1;
            if ($_POST['page'] > 0) {
                $start = (($_POST['page'] - 1) * $limit);
                $page = $_POST['page'];
            } else {
                $start = 0;
            }
            if (isset($_POST['search'])){
                $search = $conn->real_escape_string($_POST['search']);
            }
            if (isset($_POST['tipo'])){
                $tipo = $conn->real_escape_string($_POST['tipo']);
            }
            /* variables (fin) */


            $query="SELECT * FROM ".$tabla."  ";
            if (!empty($search)){
                $query.=' WHERE ( '.$tabla.'.nombre LIKE "%'.str_replace(' ', '%', $search).'%" ) ';
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
                                        <th class="text-center" style="width: 50px;">N°</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Celular</th>
                                        <th class="text-center">Direccion</th>
                                        <th class="text-center">Fecha Entrevista</th>
                                        <th class="text-center">Municipio</th>
                                        <th class="text-center">correo</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                            <tbody>';

            if ($total_data > 0) {
                foreach ($result as $row) {

                    $output.='<tr>
                                <td class="text-center" style="width: 50px;"><div class="table-content-center"><span>'.$row['id'].'</span></div></td>
                                <td class="text-left justify-content-center"><div class="table-content-center">'.$row['primer_nombre'].' '.$row['segundo_nombre'].' '.$row['apellidos'].'</div></td>
                                <td class="text-left justify-content-center">'.$row['celular_1'].'</td>
                                <td class="text-left justify-content-center">'.$row['direccion'].'</td>
                                <td class="text-left justify-content-center">'.$row['fecha_entrevista'].'</td>
                                <td class="text-left justify-content-center">'.$row['municipio'].'</td>
                                <td class="text-left justify-content-center">'.$row['correo'].'</td>
                                <td class="text-center">
                                   <div class="table-content-center">
                                       <div class="btn-group">
                                           <button value="'.$row['id'].'" type="button" data-target="modal_editar" class="leer-item btn btn-sm btn-outline-success modal-trigger"><i class="fa fa-fw fa-pencil-alt"></i></button>
                                           <button value="'.$row['id'].'" type="button" class="eliminar btn btn-sm red"><i class="fad fa-trash-alt"></i></button>
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

            break; /* LISTA */
        default:
            echo json_encode('No hay accion');
    }















