<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/producto.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="img/LOGO.jpeg">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Servicios</title>
</head>
<body>
<header>
    <a href="index.php">
        <img src="img/1-2.png" alt="Logo" class="logo">
    </a>
    <div class="background-container">
        <img src="img/hero-circle.png" alt="Primera Imagen" class="first-image">
        <img src="img/mujer-home-slide.png" alt="Segunda Imagen" class="second-image">
        <img src="img/hero-green-leaf.png" alt="tercera Imagen" class="tercer-image">
        <img src="img/hero-three-shapes.png" alt="Estrella Animada" class="star-image">
    </div>
</header>

<div class="container-wrapper">
    <div class="container">
        <div class="card-group" id="group1">
            <div class="card" id="card1">
                <img src="img/protectorsolar.jpg" alt="Jet Lag S.O.S" >
                <h3>Protector Solar</h3>
                <button onclick="showModal('modal1')">Ver más</button>
            </div>
            <div class="card" id="card2">
                <img src="img/antiarrugas.png" alt="Masaje con nuez de coco" class="imagen1">
                <h3>Antiarrugas</h3>
                <button onclick="showModal('modal2')">Ver más</button>
            </div>
            <div class="card" id="card3">
                <img src="img/aguamiselar.jpg" alt="Luminous Face">
                <h3>Agua micelar</h3>
                <button onclick="showModal('modal3')">Ver más</button>
            </div>
        </div>

        <div class="card-group" id="group2" style="display:none;">
            <div class="card" id="card4">
                <img src="img/hydrobost.jpg" alt="Luminous Face">
                <h3>Serum Hidratante</h3>
                <button onclick="showModal('modal4')">Ver más</button>
            </div>
            <div class="card" id="card5">
                <img src="img/gellimpiador.jpg" alt="Masaje Relajante">
                <h3>Gel Limpiador Facial</h3>
                <button onclick="showModal('modal5')">Ver más</button>
            </div>
            <div class="card" id="card6">
                <img src="img/desmaquillante.jpg" alt="Hidralips">
                <h3>Toallitas desmaquillantes faciales</h3>
                <button onclick="showModal('modal6')">Ver más</button>
            </div>
        </div>

        <div class="paginator">
            <span class="dot active" onclick="showGroup(1)"></span>
            <span class="dot" onclick="showGroup(2)"></span>
        </div>
    </div>
</div>

<!-- Modales para cada tarjeta -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <img src="img/protectorsolar.jpg" alt="Jet Lag S.O.S" class="modal-img">
        <span class="close" onclick="hideModal('modal1')">&times;</span>
        <h2>Protector solar</h2>
        <p class="benefits-title">Beneficios:</p>
        <ul class="benefits-list">
            <li>Reduce la aparición de poros y arrugas.</li>
            <li>Mejora la textura y la elasticidad de la piel.</li>
            <li>Deja la piel con un aspecto más suave y radiante.</li>
        </ul>
        <p class="price"><span class="cost">$80.000 COP</span></p>
        <a href="agendar_citas.php?servicio=Facial%20Clásico&precio=166600" class="button">Comprar</a>
    </div>
</div>

<div id="modal2" class="modal">
    <div class="modal-content">
        <img src="img/antiarrugas.png" alt="Facial Diamante" class="modal-img">
        <span class="close" onclick="hideModal('modal2')">&times;</span>
        <h2>Antiarrugas</h2>
        <p class="benefits-title">Beneficios:</p>
        <ul class="benefits-list">
            <li>Reduce la aparición de poros y arrugas.</li>
            <li>Mejora la textura y la elasticidad de la piel.</li>
            <li>Deja la piel con un aspecto más suave y radiante.</li>
        </ul>
        <p class="price"><span class="cost">$80.000 COP</span></p>
        <a href="agendar_citas.php?servicio=Facial%20Diamante&precio=70.000" class="button">Comprar</a>
    </div>
</div>

<div id="modal3" class="modal">
    <div class="modal-content">
        <img src="img/aguamiselar.jpg" alt="Luminous Face" class="modal-img">
        <span class="close" onclick="hideModal('modal3')">&times;</span>
        <h2>Agua miselar</h2>
        <p class="benefits-title">Beneficios:</p>
        <ul class="benefits-list">
            <li>Reduce la aparición de poros y arrugas.</li>
            <li>Mejora la textura y la elasticidad de la piel.</li>
            <li>Deja la piel con un aspecto más suave y radiante.</li>
        </ul>
        <p class="price"><span class="cost">$80.000 COP</span></p>
        <a href="agendar_citas.php?servicio=Luminous%20Face&precio=.100.000" class="button">Comprar</a>
    </div>
</div>

<div id="modal4" class="modal">
    <div class="modal-content">
        <img src="img/hydrobost.jpg" alt="Dermaplaning" class="modal-img">
        <span class="close" onclick="hideModal('modal4')">&times;</span>
        <h2>Hydrobost</h2>
        <p class="benefits-title">Beneficios:</p>
        <ul class="benefits-list">
            <li>Reduce la aparición de poros y arrugas.</li>
            <li>Mejora la textura y la elasticidad de la piel.</li>
            <li>Deja la piel con un aspecto más suave y radiante.</li>
        </ul>
        <p class="price"><span class="cost">$80.000 COP</span></p>
        <a href="agendar_citas.php?servicio=Dermaplaning&precio=90.000" class="button">Comprar</a>
    </div>
</div>

<div id="modal5" class="modal">
    <div class="modal-content">
        <img src="img/gellimpiador.jpg" alt="Masaje Relajante" class="modal-img">
        <span class="close" onclick="hideModal('modal5')">&times;</span>
        <h2>Gel limpiador</h2>
        <p class="benefits-title">Beneficios:</p>
        <ul class="benefits-list">
            <li>Reduce la aparición de poros y arrugas.</li>
            <li>Mejora la textura y la elasticidad de la piel.</li>
            <li>Deja la piel con un aspecto más suave y radiante.</li>
        </ul>
        <p class="price"><span class="cost">$80.000 COP</span></p>
        <a href="agendar_citas.php?servicio=Masaje%20Relajante&precio=120.000" class="button">Comprar</a>
    </div>
</div>

<div id="modal6" class="modal">
    <div class="modal-content">
        <img src="img/desmaquillante.jpg" alt="Hidralips" class="modal-img">
        <span class="close" onclick="hideModal('modal6')">&times;</span>
        <h2>Desmaquillante</h2>
        <p class="benefits-title">Beneficios:</p>
        <ul class="benefits-list">
            <li>Reduce la aparición de poros y arrugas.</li>
            <li>Mejora la textura y la elasticidad de la piel.</li>
            <li>Deja la piel con un aspecto más suave y radiante.</li>
        </ul>
        <p class="price"><span class="cost">$80.000 COP</span></p>
        <a href="agendar_citas.php?servicio=Hidralips&precio=85.000" class="button">comprar</a>
    </div>
</div>

<script src="js/gestionar_modales_y_tarjetas.js"></script>
<script>
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
</script>

</body>
</html>
