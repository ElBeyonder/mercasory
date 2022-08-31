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

    <title>Eventos</title>

    <!-- links css -->
    <?php require_once '../../../alinks.php'; ?>
    <link rel="stylesheet" href="dom/evento.css">

</head>
<body>
    <!-- barra de navegacion -->
    <?php require_once '../../nav/nav.php'; ?>


   <div class="row center mt-10">
       <div class="col s12">
           <div class="center">
               <h1>Eventos</h1>
           </div>
       </div>
       <div class="col s12 z-depth-2 content-block-table">
           <div class="header-content-table">
               <div style="margin-left: 1rem; margin-right: 1rem;" class="input-field">
                   <input id="buscar" type="text" class="validate">
                   <label for="buscar">Buscar</label>
               </div>
               <div style="margin-left: 1rem; margin-right: 1rem;" class="input-field">
                   <button data-target="modal_crear" class="left btn waves-effect waves-light modal-trigger" type="button">crear
                       <i class="fal fa-plus-circle"></i>
                   </button>
               </div>
               <div style="margin-left: 1rem; margin-right: 1rem;" class="input-field">
                   <button id="exportar_excel" class="left btn waves-effect waves-light" type="button">Exportar Excel</button>
               </div>

           </div>
          <div class="content-table" id="content_lista"></div>
           <div class="footer-contetn-table"></div>
       </div>
   </div>

    <?php require_once 'modales.php'; ?>
    <!-- scripts js -->
    <?php require_once '../../../ascript.php'; ?>
    <script src="apli/evento.js"></script>
</body>
</html>