<main>    
    <div id="registrarse">
        <form method="post" novalidate>
            <section>
                <label for="codigoUsuario">Codigo del usuario</label>
                <input type="text" id="codigoUsuario" name="codigoUsuario" value="<?php echo (isset($_REQUEST['codigoUsuario']) ? $_REQUEST['codigoUsuario'] : ''); ?>">
                <?php if (!empty($aErrores["codigoUsuario"])) { ?>
                    <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                    <p style="color: red"><?php echo $aErrores["codigoUsuario"]; ?></p>
                <?php } ?>
            </section>
            <section>
                <label for="nombreUsuario">Nombre del usuario</label>
                <input type="text" id="nombreUsuario" name="nombreUsuario" value="<?php echo (isset($_REQUEST['nombreUsuario']) ? $_REQUEST['nombreUsuario'] : ''); ?>">
                <?php if (!empty($aErrores["nombreUsuario"])) { ?>
                    <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                    <p style="color: red"><?php echo $aErrores["nombreUsuario"]; ?></p>
                <?php } ?>
            </section>
            <section>
                <label for="contraseñaUsuario">Contraseña</label>
                <input type="text" id="contraseñaUsuario" name="contraseñaUsuario" value="<?php echo (isset($_REQUEST['contraseñaUsuario']) ? $_REQUEST['contraseñaUsuario'] : ''); ?>">
                <?php if (!empty($aErrores["contraseñaUsuario"])) { ?>
                    <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                    <p style="color: red"><?php echo $aErrores["contraseñaUsuario"]; ?></p>
                <?php } ?>
            </section>
            <section>
                <input type="submit" id="botonCrear" name="botonCrear" value="Crear usuario">
                <input type="submit" id="botonVolver" name="botonVolver" value="Cancelar">
            </section>
        </form>
    </div>
</main>