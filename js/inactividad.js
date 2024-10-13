let tiempoInactivo = 0;
const tiempoInactivoMaximo = 5 * 60 * 1000; // Cambiado a 5 minutos

function reiniciarTiempoInactivo() {
    tiempoInactivo = 0;
}

function verificarInactividad() {
    tiempoInactivo += 1000; 
    if (tiempoInactivo >= tiempoInactivoMaximo) {
        window.location.href = 'index.php';
    }
}

document.addEventListener('mousemove', reiniciarTiempoInactivo);
document.addEventListener('keypress', reiniciarTiempoInactivo);

setInterval(verificarInactividad, 1000);
