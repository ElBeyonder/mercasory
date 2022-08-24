<?php
    setlocale(LC_TIME,"spanish");
    date_default_timezone_set("America/Bogota");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mercasory";


    $link_general='http://localhost/mercasory/';


    $conn = new mysqli($servername, $username, $password, $dbname);
    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    if ($conn->connect_error) {
        die("Error en conexion : " . $conn->connect_error);
    }

    function paginador($total_links, $page){
    $output='';
    $output.='<br><ul class="pagination  justify-content-end mt-2">';
    $previous_link = '';
    $next_link = '';
    $page_link = '';
    if ($total_links > 5) {
        if ($page < 5) {
            for ($count = 1; $count <= 5; $count++) {
                $page_array[] = $count;
            }
            $page_array[] = '...';
            $page_array[] = $total_links;
        } else {
            $end_limit = $total_links - 5;
            if ($page > $end_limit) {
                $page_array[] = 1;
                $page_array[] = '...';
                for ($count = $end_limit; $count <= $total_links; $count++) {
                    $page_array[] = $count;
                }
            } else {
                $page_array[] = 1;
                $page_array[] = '...';
                for ($count = $page - 1; $count <= $page + 1; $count++) {
                    $page_array[] = $count;
                }
                $page_array[] = '...';
                $page_array[] = $total_links;
            }
        }
    } else {
        for ($count = 1; $count <= $total_links; $count++) {
            $page_array[] = $count;
        }
    }

    if (!empty($page_array)) {
        for ($count = 0, $countMax = count($page_array); $count < $countMax; $count++) {
            if ($page == $page_array[$count]) {
                $page_link.='<li class="page-item active"><a class="disabled page-link " href="#OnderSoft">'.$page_array[$count].'</a></li>';

                $previous_id = $page_array[$count] - 1;
                if ($previous_id > 0) {
                    $previous_link='<li class="page-item"><a class="page-link page-pase" href="javascript:void(0)" data-page="'.$previous_id.'"><i class="fad fa-chevron-left"></i></a></li>';
                } else {
                    $previous_link='<li class="page-item disabled"><a class="page-link disabled" href="#OnderSoft"><i class="fad fa-chevron-left"></i></a></li>';
                }
                $next_id = $page_array[$count] + 1;
                if ($next_id > $total_links) {
                    $next_link = '<li class="disabled page-item"><a class="page-link disabled" href="#OnderSoft"><i class="fad fa-chevron-right"></i></a></a></li>';
                } else {

                    $next_link = '<li class="page-item"><a class="page-link page-pase" href="javascript:void(0)" data-page="'.$next_id.'"><i class="fad fa-chevron-right"></i></a></li>';
                }
            } else {

                if ($page_array[$count] === '...') {
                    $page_link.= '<li class="page-item disabled"><a class="page-link" href="#OnderSoft">...</a></li>';
                } else {
                    $page_link.='<li class="page-item"><a class="page-link page-pase" href="javascript:void(0)" data-page="'.$page_array[$count].'">'.$page_array[$count].'</a></li>';
                }
            }
        }
    }
    $output.=$previous_link.$page_link.$next_link;
    $output.='</ul>';
    return $output;
}






