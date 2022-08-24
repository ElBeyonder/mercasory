<?php

    /* comprobar que la session exista y este rellena con el valor ingresado en el login */
    if (isset($_SESSION['login']) && $_SESSION['login'] === 'yes'){

    }else{
        /* de ser falso, redirigira a la persona al login */
        header('location: '.$link_general);
    }

?>








