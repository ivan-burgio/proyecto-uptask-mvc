<div class="contenedor reestablecer">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php' ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Coloca una Contraseña Nueva</p>

        <form action="/reestablecer" class="formulario" method="POST">
            <div class="campo">
                <label for="password">Contraseña</label>
                <input 
                    type="password"
                    id="password"
                    placeholder="Tu contraseña"
                    name="password"
                >
            </div>

            <input type="submit" class="boton" value="Guardar contraseña">
        </form>

        <div class="acciones">
            <a href="/">¿Ya tienes cuenta? Inicia Sesión.</a>
            <a href="/crear">¿Aún no tienes cuenta? Crea una.</a>
        </div>
    </div>
</div>