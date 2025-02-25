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
                
            } finally {
                // Finalizamos la conexión a la base de datos
                unset($miDB);
            }
        }
    }
?>