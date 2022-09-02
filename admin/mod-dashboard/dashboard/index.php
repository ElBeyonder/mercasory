<?php
    session_start();
    require_once '../../../config.php';
    require_once '../../config/control_session.php';

?>
<!doctype html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dashboard</title>

    <!-- links css -->
    <?php require_once '../../../alinks.php'; ?>
    <link rel="stylesheet" href="dom/dashboard.css">

</head>
<body>
    <!-- barra de navegacion -->
    <?php require_once '../../nav/nav.php'; ?>

    <div class="row">
        <div style="min-width: 200px;" class="col s12 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <?php
                    $total_inscritos=0;
                    $sql = "SELECT * FROM inscrito ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $total_inscritos=$result->num_rows;
                        while($row = $result->fetch_assoc()) {

                        }
                    } else {
                        $total_inscritos=0;
                    }
                    ?>
                    <span class="card-title"><?php echo $total_inscritos; ?></span>
                </div>
                <div class="card-action">
                    <a href="#">Total inscritos</a>
                </div>
            </div>
        </div>
        <div style="min-width: 200px;" class="col s12 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <?php
                    $total_inscritos=0;
                    $sql = "SELECT * FROM interesado ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $total_inscritos=$result->num_rows;
                        while($row = $result->fetch_assoc()) {

                        }
                    } else {
                        $total_inscritos=0;
                    }
                    ?>
                    <span class="card-title"><?php echo $total_inscritos; ?></span>
                </div>
                <div class="card-action">
                    <a href="#">Total Interesados</a>
                </div>
            </div>
        </div>
        <div style="min-width: 200px;" class="col s12 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <?php
                    $total_inscritos=0;
                    $sql = "SELECT * FROM evento ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $total_inscritos=$result->num_rows;
                        while($row = $result->fetch_assoc()) {

                        }
                    } else {
                        $total_inscritos=0;
                    }
                    ?>
                    <span class="card-title"><?php echo $total_inscritos; ?></span>
                </div>
                <div class="card-action">
                    <a href="#">Total Eventos</a>
                </div>
            </div>
        </div>
        <div style="min-width: 200px;" class="col s12 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <?php
                    $total_inscritos=0;
                    $sql = "SELECT * FROM usuario ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $total_inscritos=$result->num_rows;
                        while($row = $result->fetch_assoc()) {

                        }
                    } else {
                        $total_inscritos=0;
                    }
                    ?>
                    <span class="card-title"><?php echo $total_inscritos; ?></span>
                </div>
                <div class="card-action">
                    <a href="#">Total Usuarios</a>
                </div>
            </div>
        </div>
    </div>

    <!-- scripts js -->
    <?php require_once '../../../ascript.php'; ?>
    <script src="apli/dashboard.js"></script>
</body>
</html>