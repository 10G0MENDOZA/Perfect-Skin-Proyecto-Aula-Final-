document.querySelector('.close').onclick = function() {
    document.getElementById('subscriptionModal').style.display = 'none';
}

// También cerrar si hacen clic fuera del modal
window.onclick = function(event) {
    if (event.target == document.getElementById('subscriptionModal')) {
        document.getElementById('subscriptionModal').style.display = 'none';
    }
}