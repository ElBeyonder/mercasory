<?php
    session_start();
    if (isset($_SESSION['login']) && $_SESSION['login'] === 'yes'){
        header('location: '.$link_general.'admin/mod-usuario/usuarios/');
    }else{

    }
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Mercadeo</title>

    <link rel="stylesheet" href="login/dom/login.css">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


</head>
<body>
<nav class="navbar-principal">
    <h1>Mercadeo Uniconfacauca</h1>
</nav>
<div class="row">
    <div class="col s12 m6">
        <div class="content-login">
            <form class="p-5" id="form_login" method="post">
                <div class="row p-5">
                    <div class="col s12 center">
                        <h1>Login !!</h1>
                    </div>
                    <div class="input-field col s12">
                        <input required id="usuario" name="usuario" type="text" class="validate">
                        <label for="usuario">Usuario</label>
                    </div>
                    <div class="input-field col s12">
                        <input required id="password" name="password" type="password" class="validate">
                        <label for="password">Contraseña</label>
                    </div>
                    <div class="input-field col s12">
                        <a class="m-0 p-0" href="#!">Recuperar contraseña!</a>
                    </div>
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" type="submit">
                            Entrar!
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col s12 m6 hide-on-small-only">
        <div class="content-img">
            <img class="img-confacauca" src="login/dom/img/fondo.JPG" alt="Logo confacauca">
        </div>
    </div>
</div>






<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="login/apli/login.js"></script>

</body>
</html>

