window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar-second');
  
    
    // Verificar que los elementos existan
    if (navbar ) {
        if (window.scrollY > 50) {
            // Añadir la clase 'scrolled' al navbar-second
            navbar.classList.add('scrolled');
            
           
        } else {
            // Quitar la clase 'scrolled' del navbar-second
            navbar.classList.remove('scrolled');
            
<<<<<<< HEAD
            // Quitar el estado sticky del carrito
            carrito.classList.remove('sticky');z
=======
          
>>>>>>> 408a870c09e2a5cb92b76d2832f5c321ab31b420
        }
    }
});