let tiempoInactivo = 0;
const tiempoInactivoMaximo = 1 * 60 * 1000; 

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
