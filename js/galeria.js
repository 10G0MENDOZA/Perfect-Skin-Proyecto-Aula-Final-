let indice = 0;
const imagenes = document.querySelectorAll('.galeria-item');
const totalImagenes = imagenes.length;
const galeriaContainer = document.querySelector('.galeria-imagenes');

// Carrusel
document.querySelector('.next1').addEventListener('click', function() {
    indice = (indice + 1) % totalImagenes;
    galeriaContainer.style.transform = `translateX(-${indice * 100}%)`;
});

document.querySelector('.prev1').addEventListener('click', function() {
    indice = (indice - 1 + totalImagenes) % totalImagenes;
    galeriaContainer.style.transform = `translateX(-${indice * 100}%)`;
});
