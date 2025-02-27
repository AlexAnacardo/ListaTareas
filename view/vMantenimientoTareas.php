<main>
    <div id="mantenimientoTareas">
        <?php
            if($_SESSION['totalTareas'][$_SESSION['opcionTabla']]==0){
                echo("<p id='mensajeTablaVacia'>Todavia no hay hay ninguna tarea</p>");
            }
            else{
                cargarTabla($_SESSION['opcionTabla']); 
            
            
        ?> 
        <form id="paginacion" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" novalidate>            
            <input type="submit" class="primeraPagina" name="primeraPagina" value="primeraPagina"/>            
            <input type="submit" class="anteriorPagina" name="anteriorPagina" value="anteriorPagina"/> 
            <p>Pagina <?php echo(floatval($_SESSION['paginaTablaEnCurso'])+1); ?> de <?php echo(floatval($_SESSION['ultimaPaginaTabla'][$_SESSION['opcionTabla']])+1); ?></p>
            <input type="submit" class="siguientePagina" name="siguientePagina" value="siguientePagina"/>            
            <input type="submit" class="ultimaPagina" name="ultimaPagina" value="ultimaPagina"/>                    
        </form>
        <?php
        }
        ?>
        <form method="post" novalidate>
            <input type="submit" id="botonCerrarSesion" name="botonCerrarSesion" value="Cerrar Sesion">
            <?php
                if($_SESSION['opcionTabla']=='activos'){
                    echo('<input type="submit" id="botonMostrarCompletadas" name="botonMostrarCompletadas" value="Mostrar Completadas">');
                    echo('<input type="submit" id="botonAñadirTarea" name="botonAñadirTarea" value="Añadir tarea">');
                }
                else{
                    echo('<input type="submit" id="botonMostrarActivas" name="botonMostrarActivas" value="Mostrar Activas">');
                }
            ?>
        </form>
    </div>
</main>