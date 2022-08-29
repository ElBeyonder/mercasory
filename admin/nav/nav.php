

    <?php
        $content_nav = '
                    <li><a href="#!">Dashboard</a></li>
                    <li><a href="'.$link_general.'admin/mod-prospecto/prospectos/">Prospectos</a></li>
                    <li><a href="'.$link_general.'admin/mod-prospecto/eventos/">Eventos</a></li>
                    <li><a href="'.$link_general.'admin/mod-usuario/usuarios/">Usuarios</a></li>
                    <li><a href="#!">Salir</a></li>
                    ';
    ?>

    <nav class="nav-bar-principal" style="background:#448aff;">
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo"><img src="<?php echo $link_general; ?>admin/nav/dom/img/logo.jpg" alt="logo"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="menu-items right hide-on-med-and-down"><?php echo $content_nav; ?></ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo"><?php echo $content_nav; ?></ul>









