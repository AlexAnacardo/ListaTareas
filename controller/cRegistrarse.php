<?php 
    if(isset($_REQUEST['botonVolver'])){
        $_SESSION['paginaEnCurso'] = 'login';    
        $_SESSION['paginaAnterior'] = 'registrarse';
        $_SESSION['CabeceraPaginaEnCurso']='Iniciar Sesion';
        header('Location: index.php');
        exit();
    }

    if(isset($_REQUEST['botonCrear'])){
        $oUsuario=new Usuario($_REQUEST['codigoUsuario'], $_REQUEST['contraseñaUsuario'], $_REQUEST['nombreUsuario']);
        
        $resultado=UsuarioPDO::añadirUsuario($oUsuario);   
    }
    require_once $view['layout'];
?>