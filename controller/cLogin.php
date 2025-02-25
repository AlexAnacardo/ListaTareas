<?php
    if(isset($_SESSION['mensaje'])) {
        echo "<script type='text/javascript'>alert('" . $_SESSION['mensaje'] . "');</script>";
        unset($_SESSION['mensaje']);
    }

    if(isset($_REQUEST['botonLogin'])){
        $oUsuarioEnCurso=UsuarioPDO::validarUsuario($_REQUEST['codigo'], $_REQUEST['passwd']);
        if($oUsuarioEnCurso!=null){                       
            //Guardamos el objeto usuario en la sesion actual
            $_SESSION["usuarioActivo"] = $oUsuarioEnCurso;
            //Se nos redirecciona al programa            
            $_SESSION['paginaEnCurso'] = 'mantenimientoTareas';
            $_SESSION['CabeceraPaginaEnCurso']='Mantenimiento Tareas';
            header('Location: index.php');
            exit();
        }                
    }

    if(isset($_REQUEST['botonRegistro'])){
        $_SESSION['paginaEnCurso'] = 'registrarse';  
        $_SESSION['CabeceraPaginaEnCurso']='Registrarse';
        header('Location: index.php');
        exit();
    }

    require_once $view['layout'];
?>