<?php
    if(isset($_REQUEST['botonLogin'])){                       
        $oUsuarioEnCurso=UsuarioPDO::validarUsuario($_REQUEST['nombre'], $_REQUEST['passwd']);
        if($oUsuarioEnCurso!=null){                       
            //Guardamos el objeto usuario en la sesion actual
            $_SESSION["usuarioActivo"] = $oUsuarioEnCurso;
            //Se nos redirecciona al programa            
            $_SESSION['paginaEnCurso'] = 'mantenimientoTareas';
            header('Location: index.php');
            exit();
        }
        else{
            $_SESSION['paginaEnCurso'] = 'mantenimientoTareas';
            header('Location: index.php');
            exit();
        }
    }

    if(isset($_REQUEST['botonRegistro'])){
        $_SESSION['paginaEnCurso'] = 'registrarse';
        header('Location: index.php');
        exit();
    }

    require_once $view['layout'];
?>