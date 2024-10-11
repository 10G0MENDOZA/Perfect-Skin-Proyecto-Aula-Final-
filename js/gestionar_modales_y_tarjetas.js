function showModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
}

// Función para ocultar el modal
function hideModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Función para cambiar entre los grupos de tarjetas
function showGroup(groupNumber) {
    const group1 = document.getElementById('group1');
    const group2 = document.getElementById('group2');
    const dots = document.querySelectorAll('.dot');

    if (groupNumber === 1) {
        group1.style.display = 'flex';
        group2.style.display = 'none';
        dots[0].classList.add('active');
        dots[1].classList.remove('active');
    } else {
        group1.style.display = 'none';
        group2.style.display = 'flex';
        dots[0].classList.remove('active');
        dots[1].classList.add('active');
    }
}

// Cerrar el modal cuando se hace clic fuera del contenido
window.onclick = function(event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(function(modal) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
}