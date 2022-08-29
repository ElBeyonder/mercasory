<?php
    require_once '../../config.php';

    if (isset($_POST['usuario'])){
        $usuario  = $conn->real_escape_string($_POST['usuario']);
        $usuario  = htmlspecialchars($usuario);
        $usuario  = htmlentities($usuario);
    }

    if (isset($_POST['password'])){
        $password = $conn->real_escape_string($_POST['password']);
        $password = htmlspecialchars($password);
        $password = htmlentities($password);
    }


    $output='';
    $sql="SELECT id, password FROM usuario WHERE usuario ='".$usuario."' OR correo='".$usuario."' ;";
    $result = $conn->query($sql);
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])){

            $output='';
            session_start();
            $_SESSION['login'] = 'yes';
            $_SESSION['u_id'] = $row['id'];

        }else{
            $output='e';
        }
    } else {
        $output=3;
    }
    echo json_encode($output);
    $conn->close();



















