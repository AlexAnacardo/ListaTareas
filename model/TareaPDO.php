<?php
    class TareaPDO{
        public static function listarTareas($codigoUsuario, $opcion){
            switch($opcion){
                case 'activos':
                    $sentenciaSQL = <<< FIN
                        select * from Tareas where CodUsuario= ? and FechaTareaRealizada is null
                        FIN;
                break;
                
                case 'completadas':
                    $sentenciaSQL = <<< FIN
                        select * from Tareas where CodUsuario= ? and FechaTareaRealizada is not null
                        FIN;
                break;
            }
            
            $parametros = [$codigoUsuario];

            // Ejecutamos la consulta SQL.
            $sql = DBPDO::ejecutaConsulta($sentenciaSQL, $parametros);

            // Guardamos el resultado de la consulta en un objeto.
            
            
            $aTareas=[];
            while ($oTarea = $sql->fetchObject()){
                if (isset($oTarea->CodTarea)) {
                    // Creamos un objeto Usuario con los datos obtenidos.
                    $aTareas[$oTarea->CodTarea] = new Tarea(
                        $oTarea->CodTarea,
                        $oTarea->CodUsuario,
                        $oTarea->DescripcionTarea,
                        $oTarea->FechaCreacion,
                        $oTarea->FechaTareaRealizada
                    );
                }
            }
            return $aTareas;
        }
    }
?>

