  let contadorCarrito = 0;

    document.querySelectorAll('.btn-servicio').forEach(boton => {
        boton.addEventListener('click', function(event) {
            event.preventDefault();
            // Lógica para agregar el servicio al carrito
            contadorCarrito++;
            document.getElementById('contador-carrito').textContent = contadorCarrito;

            // Muestra notificación temporal o animación
            mostrarNotificacion("Producto añadido al carrito");
        });
    });

    function mostrarNotificacion(mensaje) {
        let notificacion = document.createElement('div');
        notificacion.className = 'notificacion-carrito';
        notificacion.textContent = mensaje;
        document.body.appendChild(notificacion);

        setTimeout(() => {
            notificacion.remove();
        }, 3000);
    }