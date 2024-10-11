window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar-second');
    var carrito = document.querySelector('.carrito'); // El carrito de compras en el navbar-one
    
    // Verificar que los elementos existan
    if (navbar && carrito) {
        if (window.scrollY > 50) {
            // Añadir la clase 'scrolled' al navbar-second
            navbar.classList.add('scrolled');
            
            // Hacer que el carrito también se vuelva sticky
            carrito.classList.add('sticky');
        } else {
            // Quitar la clase 'scrolled' del navbar-second
            navbar.classList.remove('scrolled');
            
            // Quitar el estado sticky del carrito
            carrito.classList.remove('sticky');
        }
    }
});