<?php
    $_SESSION['ultimaPaginaTabla']=[        
        "activos"=> (floor(TareaPDO::contarTareas('activos')/5))*5,
        "completados"=> (floor(TareaPDO::contarTareas('completados')/5))*5
    ];
    
    if(!isset($_SESSION['paginaTablaEnCurso'])){
        $_SESSION['paginaTablaEnCurso']=0;
    }
    
    if(isset($_REQUEST['botonAñadirTarea'])){        
        $_SESSION['paginaEnCurso'] = 'añadirTarea';        
        $_SESSION['CabeceraPaginaEnCurso']='Añadir Tarea';        
        header('location: index.php');        
        exit();     
    }
    
    if(isset($_REQUEST['eliminarTarea'])){
        if(TareaPDO::eliminarTarea($_REQUEST['eliminarTarea'])){
            
        }
        else{
            echo "<script type='text/javascript'>alert('Error al eliminar la tarea');</script>";
        }
    }
    
    if(isset($_REQUEST['completarTarea'])){
        if(TareaPDO::marcarTareaComoCompletada($_REQUEST['completarTarea'])){
            
        }
        else{
            echo "<script type='text/javascript'>alert('Error al eliminar la tarea');</script>";
        }
    }
    
    if(isset($_REQUEST['botonCerrarSesion'])){
       session_destroy();      
       header('location: index.php');       
       exit();
    }
       
    if(!isset($_SESSION['opcionTabla'])){
        $_SESSION['opcionTabla']='activos';
    }
    
    if(isset($_REQUEST['botonMostrarCompletadas'])){
        $_SESSION['opcionTabla']='completados';
    }
    
    if(isset($_REQUEST['botonMostrarActivas'])){
        $_SESSION['opcionTabla']='activos';
    }
    
    if(isset($_REQUEST['primeraPagina']) && $_SESSION['paginaTablaEnCurso']!=0){        
        $_SESSION['paginaTablaEnCurso']=0;
    }

    if(isset($_REQUEST['anteriorPagina']) && $_SESSION['paginaTablaEnCurso']>=5){        
        $_SESSION['paginaTablaEnCurso']-=5;
    }

    if(isset($_REQUEST['siguientePagina']) && $_SESSION['paginaTablaEnCurso']<$_SESSION['ultimaPaginaTabla'][$_SESSION['opcionTabla']]){        
        $_SESSION['paginaTablaEnCurso']+=5;
    }

    if(isset($_REQUEST['ultimaPagina'])){        
        $_SESSION['paginaTablaEnCurso']=floatval($_SESSION['ultimaPaginaTabla'][$_SESSION['opcionTabla']]);
    }        
    
    function cargarTabla($opcion='activos'){
        if($opcion=='activos'){
            $aTareas= TareaPDO::listarTareas($_SESSION['usuarioActivo']->getCodUsuario(), $opcion, $_SESSION['paginaTablaEnCurso']);
            
            echo('<table> <thead> <tr> <th>Descripcion</th> <th>Fecha de creacion de la tarea</th> <th>Marcar como completada</th> <th>Eliminar tarea</th></tr> </thead> <tbody>');
        }
        elseif ($opcion=='completados') {
            $aTareas= TareaPDO::listarTareas($_SESSION['usuarioActivo']->getCodUsuario(), $opcion, $_SESSION['paginaTablaEnCurso']);
            
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
                echo('<td>'.$oTarea->getFechaTareaRealizada().'</td>');
                echo '<td><form method="post"><input type="submit" class="eliminarTarea" name="eliminarTarea" value="'. $oTarea->getCodTarea() .'"></input></form></td>';                
            }
            echo('</tr>');
        }
        
        echo('</tbody> </table>');
    }
    
    require_once $view['layout'];
?>