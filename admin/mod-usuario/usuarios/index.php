<?php
    session_start();
    require_once '../../../config.php';

?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Usuarios</title>


    <!-- links css -->
    <?php require_once '../../../alinks.php'; ?>
    <link rel="stylesheet" href="dom/usuario.css">

</head>
<body>
    <!-- barra de navegacion -->
    <?php require_once '../../nav/nav.php'; ?>


   <div class="row center mt-10">
       <div class="col s12">
           <div class="center">
               <h1>Usuarios</h1>
           </div>
       </div>
       <div class="col s12 z-depth-2 content-block-table">
           <div class="header-content-table">
               <div class="input-field">
                   <input id="buscar" type="text" class="validate">
                   <label for="buscar">Buscar</label>
               </div>
               <button data-target="modal_crear" class="left btn waves-effect waves-light modal-trigger" type="button">crear
                   <i class="fal fa-plus-circle"></i>
               </button>
           </div>
          <div class="content-table" id="content_lista"></div>
           <div class="footer-contetn-table"></div>
       </div>
   </div>

    <?php require_once 'modales.php'; ?>
    <!-- scripts js -->
    <?php require_once '../../../ascript.php'; ?>
    <script src="apli/usuario.js"></script>
</body>
</html>