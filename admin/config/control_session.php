<?php

    if (isset($_SESSION['login']) && $_SESSION['login'] === 'yes'){

    }else{
        header('location: '.$link_general);
    }

?>








