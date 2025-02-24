<?php
    class UsuarioPDO{
        public static function validarUsuario($nombreUsuario, $password) {        
            // Concatenamos el código de usuario y la contraseña, luego la codificamos con SHA-256.
            $contraseñaCodificada = hash('sha256', $password);

            $sentenciaSQL = <<< FIN
                                select * from Usuarios where Nombre= ? and contraseña= ?
                                FIN;
            $parametros = [$nombreUsuario, $contraseñaCodificada];

            // Ejecutamos la consulta SQL.
            $sql = DBPDO::ejecutaConsulta($sentenciaSQL, $parametros);

            // Guardamos el resultado de la consulta en un objeto.
            $oResultado = $sql->fetchObject();

            //Si existe un usuario con el codigo que hemos proporcionado, entraremos en este "if"
            if (isset($oResultado->T01_CodUsuario)) {
                // Creamos un objeto Usuario con los datos obtenidos.
                $oUsuarioEnCurso = new Usuario(
                    $oResultado->CodUsuario,
                    $oResultado->Nombre,
                    $oResultado->Contraseña
                );

                // Si el objeto Usuario se crea correctamente, actualizamos la conexión y retornamos el usuario.
                if ($oUsuarioEnCurso) {                    
                    return $oUsuarioEnCurso;
                } else {
                    return null;
                }
            }
        }
    }
?>