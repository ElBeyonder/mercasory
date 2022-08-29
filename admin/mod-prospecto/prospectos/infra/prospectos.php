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
    if (isset($_POST['nombre'])){
        $nombre = $conn->real_escape_string($_POST['nombre']);
    }else{
        $nombre = '';
    }


    switch ($opcion){
        case 1:
            $output='';
            $sql = "INSERT INTO `evento`(`nombre`, `id_usuario`) 
                    VALUES ('".$nombre."', 1)";
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
            $sql = "DELETE FROM `evento` WHERE id='".$id."' ";
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
            $sql = "SELECT * FROM `evento` WHERE id='".$id."' ";
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
                                        <th class="text-center">Evento</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                            <tbody>';


            if ($total_data > 0) {
                foreach ($result as $row) {

                    $output.='<tr>
                                            <td class="text-center" style="width: 50px;"><div class="table-content-center"><span>'.$row['id'].'</span></div></td>
                                            <td class="text-left justify-content-center font-w600 font-size-sm"><div class="table-content-center">'.$row['nombre'].'</div></td>
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















