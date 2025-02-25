<?php
    require_once("config/confDBPDO.php");
    require_once("config/confAPP.php");

    session_start();

    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso'] = 'login';
        $_SESSION['paginaAnterior'] = 'login';
        $_SESSION['CabeceraPaginaEnCurso']='Iniciar Sesion';
    }
    
    if(isset($_SESSION["usuarioActivo"])){
        $_SESSION['paginaEnCurso'] = 'mantenimientoTareas';
        $_SESSION['paginaAnterior'] = 'mantenimientoTareas';
        $_SESSION['CabeceraPaginaEnCurso']='Mantenimiento de tareas';
    }
    
    
    require_once $controller[$_SESSION['paginaEnCurso']];
?>