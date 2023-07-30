(function() {

    // Boton para mostrar el modal de crear tarea
    const nuevaTareaBtn = document.querySelector('#agregar-tarea');
    nuevaTareaBtn.addEventListener('click', mostrarFormulario);

    function mostrarFormulario() {
        const modal = document.createElement('DIV');
        modal.classList.add('modal');
        modal.innerHTML = `
            <form class="formulario nueva-tarea">
                <legend>Añade una nueva tarea</legend>
                <div class="campo">
                    <label>Tarea</label>
                    <input
                        type="text"
                        name="tarea"
                        placeholder="Añadir tarea al proyecto actual"
                        id="tarea"
                    />
                </div>
                <div class="opciones">
                    <input 
                        type="submit" 
                        class="submit-nueva-tarea" 
                        value="Añadir tarea"
                    />
                    <button type="button" class="cerrar-modal">Cancelar</button>
                </div>
            </form>
        `;

        setTimeout(() => {
            const formulario = document.querySelector('.formulario');
            formulario.classList.add('animar');
        }, 300);

        modal.addEventListener('click', function(e) {
            e.preventDefault();

            if(e.target.classList.contains('cerrar-modal')) {
                const formulario = document.querySelector('.formulario');
                formulario.classList.add('cerrar');

                setTimeout(() => {
                    modal.remove();
                }, 600);
            }

            if(e.target.classList.contains('submit-nueva-tarea')) {
                submitFormularioNuevaTarea();
            }
        })

        document.querySelector('.dashboard').appendChild(modal);
    }

    function submitFormularioNuevaTarea() {
        const tarea = document.querySelector('#tarea').value.trim();

        if(tarea === '') {
            // Mostar alerta de error
            mostrarAlerta('Ingrese el nombre de la tarea', 'error', document.querySelector('.formulario legend'));

            return;
        }

        agregarTarea(tarea);
    }

    function mostrarAlerta(mensaje, tipo, referencia) {
        // Previene la creacion de multiples alertas
        const alertaPrevia = document.querySelector('.alerta');

        if(alertaPrevia) {
            alertaPrevia.remove();
        }

        const alerta = document.createElement('DIV');
        alerta.classList.add('alerta', tipo);
        alerta.textContent = mensaje;

        // Insertar la alerta despues del legend
        referencia.parentElement.insertBefore(alerta, referencia.nextElementSibling);

        // Eliminar la alerta
        setTimeout(() => {
            alerta.remove();
        }, 5000);
    }

    async function agregarTarea(tarea) {
        // Construir la petición
        const datos = new FormData();
        datos.append('nombre', tarea);

        try {
            const url = 'http://localhost:3000/api/tarea';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });
            
            const resultado = await respuesta.json();
            console.log(resultado);
        } catch (error) {
            console.log(error);
        }
    }

})();