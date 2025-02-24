<?php
    class DBPDO{
        public static function ejecutaConsulta($sentenciaSQL, $parametros = null){
            try{
                // Creamos la conexion usando las variables constantes del archivo confDBPDO
                $miDB = new PDO(CONEXION, USUARIO, CONTRASEÑA);
                
                // Preparamos la sentencia SQL
                $sql = $miDB->prepare($sentenciaSQL);
                
                // Ejecutamos la consulta con los parámetros proporcionados
                $sql->execute($parametros);
                
                // Devolvemos el objeto PDOStatement
                return $sql;
            } catch (PDOException $ex) {
                // Si se produce un error, se crea un objeto de la clase ErrorApp
                $error = new ErrorApp(
                    $ex->getCode(),
                    $ex->getMessage(),
                    $ex->getFile(),
                    $ex->getLine(),
                    $_SESSION['paginaAnterior']
                );
                //Guardamos el objeto ErrorApp en la sesion
                $_SESSION['error'] = $error;
                $_SESSION['paginaEnCurso'] = 'error';
                
                // Redirigir al usuario a la página de error
                header('Location: index.php');
                exit();
            } finally {
                // Finalizamos la conexión a la base de datos
                unset($miDB);
            }
        }
    }
?>