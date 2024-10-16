function showModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.classList.remove('show'); 
    modal.style.opacity = 0; 
    modal.style.display = 'block';
    setTimeout(function() {
        modal.classList.add('show');
        modal.style.opacity = 1; 
    }, 10);
}

function hideModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.opacity = 0; 
    setTimeout(function() {
        modal.classList.remove('show');
        modal.style.display = 'none';
    }, 500); 
}