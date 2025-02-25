<?php

    require_once 'model/DBPDO.php';
    require_once 'model/UsuarioPDO.php';
    require_once 'model/Usuario.php';
    require_once 'model/ErrorApp.php';
    require_once 'model/Tarea.php';
    require_once 'model/TareaPDO.php';
    
    $controller=[
        'mantenimientoTareas' => 'controller/cMantenimientoTareas.php',
        'login' => 'controller/cLogin.php',
        'registrarse' => 'controller/cRegistrarse.php',
        'error' => 'controller/cError.php'
    ];

    $view=[
        'mantenimientoTareas' => 'view/vMantenimientoTareas.php',
        'login' => 'view/vLogin.php',
        'registrarse' => 'view/vRegistrarse.php',
        'layout' => 'view/layout.php',
        'error' => 'view/vError.php'
    ];
?>