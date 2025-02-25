<?php
    if(isset($_REQUEST['botonCerrarSesion'])){
       session_destroy();       
       header('location: index.php');       
       exit;
    }
    
    if(!isset($_SESSION['opcionTabla'])){
        $_SESSION['opcionTabla']='activos';
    }
    
    if(isset($_REQUEST['botonMostrarCompletadas'])){
        $_SESSION['opcionTabla']='completadas';
    }
    
    if(isset($_REQUEST['botonMostrarActivas'])){
        $_SESSION['opcionTabla']='activos';
    }
    
    
    function cargarTabla($opcion='activos'){
        if($opcion=='activos'){
            $aTareas= TareaPDO::listarTareas($_SESSION['usuarioActivo']->getCodUsuario(), $opcion);
            
            echo('<table> <thead> <tr> <th>Descripcion</th> <th>Fecha de creacion de la tarea</th> </tr> </thead> <tbody>');
        }
        elseif ($opcion=='completados') {
            $aTareas= TareaPDO::listarTareas($codigoUsuario, $opcion);
            
            echo('<table> <thead> <tr> <th>Descripcion</th> <th>Fecha de creacion de la tarea</th> <th>Fecha en la que la tarea se completo</th> </tr> </thead> <tbody>');
        }
        else{
            $aTareas=[];
        }
        
        foreach ($aTareas as $oTarea){
            echo('<tr>');
            echo('<td>'.$oTarea->getDescripcionTarea().'</td>');
            echo('<td>'.$oTarea->getFechaCreacion().'</td>');
            if($opcion=='activos'){                
                echo '<td><form method="post"><input type="submit" class="completarTarea" name="completarTarea" value="'. $oTarea->getCodTarea() .'"></input></form></td>';
                echo '<td><form method="post"><input type="submit" class="eliminarTarea" name="eliminarTarea" value="'. $oTarea->getCodTarea() .'"></input></form></td>';                
            }
            else{
                echo ('<td>ELIMINAR</td>');
            }
            echo('</tr>');
        }
        
        echo('</tbody> </table>');
    }
    
    require_once $view['layout'];
?>