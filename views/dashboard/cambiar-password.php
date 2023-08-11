<?php include_once __DIR__ . '/header-dashboard.php'; ?>

<div class="contenedor-sm">
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <a href="/perfil" class="enlace">Volver al Perfil</a>


    <form action="/cambiar-password" method="POST" class="formulario">
        <div class="campo">
            <label for="nombre">Contraseña actual</label>
            <input 
                type="password"  
                name="password_actual" 
                placeholder="Tu contraseña actual"
            >
        </div>

        <div class="campo">
            <label for="email">Contraseña nueva</label>
            <input 
                type="password" 
                name="password_nuevo" 
                placeholder="Tu contraseña nueva"
            >
        </div>

        <input type="submit" value="Guardar Cambios">
    </form>
</div>

<?php include_once __DIR__ . '/footer-dashboard.php'; ?>