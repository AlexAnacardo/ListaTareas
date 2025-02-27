<?php 
    define('MAX_CADENA', 3000);
    define('MIN_CADENA', 1);
    define('OBLIGATORIO', 1);
    
    $entradaOK=true;
    $usuarioCreado=false;
    $errorUsuario=false;
    
    if(isset($_REQUEST['botonVolver'])){
        $_SESSION['paginaEnCurso'] = 'login';    
        $_SESSION['paginaAnterior'] = 'registrarse';
        $_SESSION['CabeceraPaginaEnCurso']='Iniciar Sesion';
        header('Location: index.php');
        exit();
    }

    
    
   $aErrores = [//Array de errores
        'codigoUsuario' => '',
        'nombreUsuario' => '',
        'contraseñaUsuario' => '',
    ]; 
   
    if(isset($_REQUEST['botonCrear'])){
        
        $aErrores = [
            'codigoUsuario' => validacionFormularios::comprobarAlfabetico($_REQUEST['codigoUsuario'], MAX_CADENA, MIN_CADENA, OBLIGATORIO),            
            'nombreUsuario' => validacionFormularios::comprobarAlfabetico($_REQUEST['nombreUsuario'], MAX_CADENA, MIN_CADENA, OBLIGATORIO),
            'contraseñaUsuario' => validacionFormularios::comprobarAlfabetico($_REQUEST['contraseñaUsuario'], MAX_CADENA, MIN_CADENA, OBLIGATORIO),
        ];

        //Recorremos el array de errores 
        foreach ($aErrores as $clave => $valor) {
            if ($valor == !null) {
                $entradaOK = false;
                //Limpiamos el campo si hay un error
                unset($_REQUEST[$clave]);
            }
        }        
    }
    else{
        $entradaOK = false;
    }
    
    if($entradaOK){
        $oUsuario = new Usuario($_REQUEST['codigoUsuario'], $_REQUEST['contraseñaUsuario'], $_REQUEST['nombreUsuario']);

        if(UsuarioPDO::añadirUsuario($oUsuario)){
            $usuarioCreado=true;
        } else {
            $errorUsuario=true;
        }
    }
    
    if(isset($_REQUEST['aceptarUsuarioCreado'])){
        $_SESSION['paginaEnCurso'] = 'login';    
        $_SESSION['paginaAnterior'] = 'registrarse';
        $_SESSION['CabeceraPaginaEnCurso'] = 'Iniciar Sesion';
        header('Location: index.php');
        exit();
    }
    
    
    
    require_once $view['layout'];
?>