<main>
    <div id="añadirTarea">
        <form method="post" novalidate>
            <section>
                <label for="descripcionTarea">Descripcion de la tarea</label>
                <input type="text" id="descripcionTarea" name="descripcionTarea">
            </section>
            <section>
                <input type="submit" id="botonConfirmarAñadir" name="botonConfirmarAñadir" value="Confirmar">
                <input type="submit" id="botonCancelarAñadir" name="botonCancelarAñadir" value="Cancelar">
            </section>
        </form>
        <form id="formularioTareaCreada" style="display: <?php echo($tareaCreada ? 'flex' : 'none') ?>">
            <section>
                <p>Tarea añadida</p>
                <input type="submit" id="aceptarTareaCreada" name="aceptarTareaCreada" value="Aceptar">
            </section>
        </form>

        <form id="formularioError" style="display: <?php echo($errorTarea ? 'flex' : 'none') ?>">
            <section>
                <p>Error al añadir tarea</p>
                <input type="submit" id="aceptarErrorTarea" name="aceptarErrorTarea" value="Aceptar">
            </section>
        </form>
    </div>
</main>