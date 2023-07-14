<div class="contenedor olvide">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php' ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Recuperar Cuenta</p>

        <form action="/olvide" class="formulario" method="POST">
            <div class="campo">
                <label for="email">Email</label>
                <input 
                    type="email"
                    id="email"
                    placeholder="Tu email"
                    name="email"
                >
            </div>

            <input type="submit" class="boton" value="Enviar email">
        </form>

        <div class="acciones">
            <a href="/">¿Ya tienes cuenta? Inicia Sesión.</a>
            <a href="/crear">¿Aún no tienes cuenta? Crea una.</a>
        </div>
    </div>
</div>