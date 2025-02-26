<?php
    class TareaPDO{
        public static function listarTareas($codigoUsuario, $opcion, $paginaTabla=0){
            switch($opcion){
                case 'activos':
                    $sentenciaSQL = <<< FIN
                        select * from Tareas where CodUsuario= ? and FechaTareaRealizada is null limit  {$paginaTabla}, 5
                        FIN;
                break;
                
                case 'completados':
                    $sentenciaSQL = <<< FIN
                        select * from Tareas where CodUsuario= ? and FechaTareaRealizada is not null limit  {$paginaTabla}, 5
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
        
        public static function añadirTarea($descripcion){
            $codigoUsuarioActivo=$_SESSION["usuarioActivo"]->getCodUsuario();
            $sentenciaSQL = <<< FIN
                                Insert into Tareas (CodUsuario, DescripcionTarea, FechaCreacion, FechaTareaRealizada)
                                values (?,?,now(),null);                    
                                FIN;
            
            if(DBPDO::ejecutaConsulta($sentenciaSQL, [$codigoUsuarioActivo, $descripcion])){
                return true;
            }
            else{
                return false;
            }
        }
        
        public static function eliminarTarea($codigoTarea){
            $codigoUsuarioActivo=$_SESSION["usuarioActivo"]->getCodUsuario();
            $sentenciaSQL = <<< FIN
                                delete from Tareas where CodTarea = ? and CodUsuario = ? 
                                FIN;
            if(DBPDO::ejecutaConsulta($sentenciaSQL, [$codigoTarea, $codigoUsuarioActivo])){
                return true;
            }
            else{
                return false;
            }
        }
        
        public static function marcarTareaComoCompletada($codigoTarea){
            $codigoUsuarioActivo=$_SESSION["usuarioActivo"]->getCodUsuario();
            $sentenciaSQL = <<< FIN
                                update Tareas set FechaTareaRealizada = now() where CodTarea = ? and CodUsuario = ?;
                                FIN;
            if(DBPDO::ejecutaConsulta($sentenciaSQL, [$codigoTarea, $codigoUsuarioActivo])){
                return true;
            }
            else{
                return false;
            }
        }
        
        public static function contarTareas($opcion){
            switch($opcion){
                case 'activos':
                    $codigoUsuarioActivo=$_SESSION["usuarioActivo"]->getCodUsuario();
                    $sentenciaSQL = <<< FIN
                                select count(*) as total from Tareas where CodUsuario= ? and FechaTareaRealizada is null
                                FIN;
                    $totalTareas= DBPDO::ejecutaConsulta($sentenciaSQL,[$codigoUsuarioActivo]);
                break;
                
                case 'completados':
                    $codigoUsuarioActivo=$_SESSION["usuarioActivo"]->getCodUsuario();
                    $sentenciaSQL = <<< FIN
                                select count(*) as total from Tareas where CodUsuario= ? and FechaTareaRealizada is not null
                                FIN;
                    $totalTareas= DBPDO::ejecutaConsulta($sentenciaSQL,[$codigoUsuarioActivo]);
                break;
            }
            return floatval($totalTareas->fetchObject()->total);
        }
    }
?>

