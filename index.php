<?php
    require_once("config/confDBPDO.php");
    require_once("config/confAPP.php");

    session_start();

    if(isset($_SESSION["usuarioActivo"])){
        $_SESSION['paginaEnCurso'] = 'mantenimientoTareas';
    }
    else{
        $_SESSION['paginaEnCurso'] = 'login';
    }

    require_once $controller[$_SESSION['paginaEnCurso']];
?>