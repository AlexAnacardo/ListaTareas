<?php
    define('MAX_CADENA', 3000);
    define('MIN_CADENA', 1);
    define('OBLIGATORIO', 1);

    if(isset($_REQUEST['botonConfirmarAñadir'])){
        if(validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcionTarea'], MAX_CADENA, MIN_CADENA, OBLIGATORIO)==null){            
            if(TareaPDO::añadirTarea($_REQUEST['descripcionTarea'])){
                $_SESSION['mensaje'] = 'Usuario añadido';

                $_SESSION['paginaEnCurso'] = 'mantenimientoTareas';                    
                $_SESSION['CabeceraPaginaEnCurso'] = 'Mantenimiento Tareas';
                header('Location: index.php');
                exit();
            }
            else{
                echo "<script type='text/javascript'>alert('Error al añadir la tarea');</script>";
            }
        }
    }
    
    if(isset($_REQUEST['botonCancelarAñadir'])){
        $_SESSION['paginaEnCurso'] = 'mantenimientoTareas';    
        $_SESSION['CabeceraPaginaEnCurso']='Mantenimiento Tareas';
        header('Location: index.php');
        exit();
    }

    require_once $view['layout'];
?>