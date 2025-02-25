<main>
    <div id="mantenimientoTareas">
        <?php cargarTabla($_SESSION['opcionTabla']); ?> 
        <form method="post" novalidate>
            <input type="submit" id="botonCerrarSesion" name="botonCerrarSesion" value="Cerrar Sesion">
            <?php
                if($_SESSION['opcionTabla']=='activos'){
                    echo('<input type="submit" id="botonMostrarCompletadas" name="botonMostrarCompletadas" value="Mostrar Completadas">');
                }
                else{
                    echo('<input type="submit" id="botonMostrarActivas" name="botonMostrarActivas" value="Mostrar Activas">');
                }
            ?>
        </form>
    </div>
</main>