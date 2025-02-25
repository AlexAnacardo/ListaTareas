<?php
    class UsuarioPDO{
        public static function validarUsuario($codigoUsuario, $password) {        
            // Concatenamos el código de usuario y la contraseña, luego la codificamos con SHA-256.
            $contraseñaCodificada = hash('sha256', $password);

            $sentenciaSQL = <<< FIN
                                select * from Usuarios where CodUsuario= ? and contraseña= ?
                                FIN;
            $parametros = [$codigoUsuario, $contraseñaCodificada];

            // Ejecutamos la consulta SQL.
            $sql = DBPDO::ejecutaConsulta($sentenciaSQL, $parametros);

            // Guardamos el resultado de la consulta en un objeto.
            $oResultado = $sql->fetchObject();

            //Si existe un usuario con el codigo que hemos proporcionado, entraremos en este "if"
            if (isset($oResultado->CodUsuario)) {
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
        
        public static function añadirUsuario($oUsuario){
            $contraseñaCodificada = hash('sha256', $oUsuario->getPassword());
            $sentenciaSQL = <<< FIN
                                Insert into Usuarios values(?,?,?);
                                FIN;
            $parametros = [$oUsuario->getCodUsuario(), $oUsuario->getNombreUsuario(), $contraseñaCodificada];

            // Ejecutamos la consulta SQL.
            $sql = DBPDO::ejecutaConsulta($sentenciaSQL, $parametros);
        }
    }
?>