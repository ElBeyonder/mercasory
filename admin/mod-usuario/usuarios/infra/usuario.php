<?php
    session_start();
    require_once '../../../../config.php';
    $opcion = $_POST['opcion'];
    $tabla = 'usuario';


    if (isset($_SESSION['u_id'])){
        $id_usuario = $conn->real_escape_string($_SESSION['u_id']);
    }
    if (isset($_POST['id'])){
        $id = $conn->real_escape_string($_POST['id']);
    }
    if (isset($_POST['nombre_completo'])){
        $nombre_completo = $conn->real_escape_string($_POST['nombre_completo']);
    }else{
        $nombre_completo = '';
    }
    if (isset($_POST['correo'])){
        $correo = $conn->real_escape_string($_POST['correo']);
    }else{
        $correo = '';
    }
    if (isset($_POST['usuario'])){
        $usuario = $conn->real_escape_string($_POST['usuario']);
    }else{
        $usuario = '';
    }
    if (isset($_POST['password'])) {
        $password = $conn->real_escape_string($_POST['password']);
        $password = htmlspecialchars($password);
        $password = addslashes($password);
        $password = password_hash($password, PASSWORD_DEFAULT);
    }


    switch ($opcion){
        case 1:
            $output='';
            $sql = "INSERT INTO `usuario`(`nombre_completo`, `correo`, `usuario`, `password`) 
                    VALUES ('".$nombre_completo."', '".$correo."', '".$usuario."', '".$password."')";
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

            $sql = "DELETE FROM usuario WHERE id='".$id."' ";
            if ($conn->query($sql) === TRUE) {
                $output='';
            } else {
                $output="Error deleting record: " . $conn->error;
            }
            echo json_encode($output);
            $conn->close();
            break; /* ELIMINAR */
        case 3:

            $sql = "SELECT * FROM usuario WHERE id='".$id."' ";
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
            $sql = "UPDATE usuario SET nombre_completo='".$nombre_completo."', usuario='".$usuario."', correo='".$correo."' WHERE id='".$id."' ";
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
            if (isset($_POST['tipo'])){
                $tipo = $conn->real_escape_string($_POST['tipo']);
            }
            /* variables (fin) */


            $query="SELECT  * FROM ".$tabla."  ";
            if (!empty($search)){
                $query.=' 
                        WHERE ('.$tabla.'.nombre_completo LIKE "%'.str_replace(' ', '%', $search).'%"
                        OR '.$tabla.'.usuario LIKE "%'.str_replace(' ', '%', $search).'%"
                        OR '.$tabla.'.correo LIKE "%'.str_replace(' ', '%', $search).'%")
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
                                        <th class="text-center" style="width: 50px;">N°</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Usuario</th>
                                        <th class="text-center">correo</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                            <tbody>';


            if ($total_data > 0) {
                foreach ($result as $row) {

                    $output.='<tr>
                                            <td class="text-center" style="width: 50px;"><div class="table-content-center"><span>'.$row['id'].'</span></div></td>
                                            <td class="text-left justify-content-center font-w600 font-size-sm"><div class="table-content-center">'.$row['nombre_completo'].'</div></td>
                                            <td class="text-center font-w600 font-size-sm"><div class="table-content-center">'.$row['usuario'].'</div></td>
                                            <td class="text-left font-w600 font-size-sm"><div class="table-content-center">'.$row['correo'].'</div></td>
                                            <td class="text-center">
                                                <div class="table-content-center">
                                                    <div class="btn-group">
                                                        <button value="'.$row['id'].'" type="button" data-target="modal_editar" class="leer-item btn green modal-trigger"><i class="fa fa-fw fa-pencil-alt"></i></button>
                                                        <button value="'.$row['id'].'" type="button" class="change-password btn lime"><i class="fad fa-unlock-alt"></i></button>
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

            break; /* LISTA USUARIOS */
        case 6:
            $output=1;
            $sql = "SELECT password FROM usuario WHERE id='".$id_usuario."' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (password_verify($tu_passsword, $row['password'])){

                        $up = "UPDATE usuario 
                                   SET password='".$new_password."' WHERE id='".$id."'";
                        if ($conn->query($up) === TRUE) {
                            $output=0;
                        } else {
                            $output=4;
                            $output.="Error: " .$conn->error;
                        }

                    }else{
                        $output=2;
                    }
                }
            } else {
                $output=3;
            }
            echo json_encode($output);
            $conn->close();
            break; /* CAMBIAR CONTRASEÑA */
        case 7:

            header('Content-type:application/xls');
            header('Content-Disposition: attachment; filename=LISTA USUARIOS.xls');

            /* variables */
            $limit = 5;
            $order = 'DESC';
            if (isset($_POST['search'])){
                $search = $conn->real_escape_string($_POST['search']);
            }else{
                $search ='';
            }
            if (isset($_POST['tipo'])){
                $tipo = $conn->real_escape_string($_POST['tipo']);
            }
            /* variables (fin) */


            $query="SELECT  * FROM ".$tabla."  ";
            if (!empty($search)){
                $query.=' 
                        WHERE ('.$tabla.'.nombre_completo LIKE "%'.str_replace(' ', '%', $search).'%"
                        OR '.$tabla.'.usuario LIKE "%'.str_replace(' ', '%', $search).'%"
                        OR '.$tabla.'.correo LIKE "%'.str_replace(' ', '%', $search).'%")
                        ';
            }

            $query.=" ORDER BY ".$tabla.".id  ".$order." ";
            $statement = $connect->prepare($query);
            $statement->execute();
            $total_data = $statement->rowCount();
            $result = $statement->fetchAll();
            $total_filter_data = $statement->rowCount();
            $output = '<div class="col s12"><label class="badge ">Item(s): '.$total_data.'</label></div>';
            $output.= '<table class="table" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" style="width: 50px;">N°</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Usuario</th>
                                        <th class="text-center">correo</th>
                                        <th class="text-center">Fecha creacion</th>
                                    </tr>
                                </thead>
                            <tbody>';


            if ($total_data > 0) {
                foreach ($result as $row) {

                    $output.='<tr>
                                            <td class="text-center" style="width: 50px;"><div class="table-content-center"><span>'.$row['id'].'</span></div></td>
                                            <td class="text-left justify-content-center font-w600 font-size-sm"><div class="table-content-center">'.$row['nombre_completo'].'</div></td>
                                            <td class="text-center font-w600 font-size-sm"><div class="table-content-center">'.$row['usuario'].'</div></td>
                                            <td class="text-left font-w600 font-size-sm"><div class="table-content-center">'.$row['correo'].'</div></td>
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















