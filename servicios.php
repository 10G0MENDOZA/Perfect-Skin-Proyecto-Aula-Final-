<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/servicios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Facial Diamante</title>
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
            <!-- Primera fila de tarjetas (primer grupo de 3) -->
            <div class="card-group" id="group1">
                <!-- Tarjeta 1 -->
                <div class="card" id="card1">
                    <img src="img/facialclasico.jpg" alt="Jet Lag S.O.S">
                    <h3>Facial Clásico</h3>
                    <button onclick="showModal('modal1')">Ver más</button>
                </div>

                <!-- Tarjeta 2 -->
                <div class="card" id="card2">
                    <img src="img/diamante.jpg" alt="Masaje con nuez de coco">
                    <h3>Facial Diamante</h3>
                    <button onclick="showModal('modal2')">Ver más</button>
                </div>

                <!-- Tarjeta 3 -->
                <div class="card" id="card3">
                    <img src="img/luminous.jpg" alt="Luminous Face">
                    <h3>Luminous Face</h3>
                    <button onclick="showModal('modal3')">Ver más</button>
                </div>
            </div>

            <!-- Segunda fila de tarjetas (segundo grupo de 3) -->
            <div class="card-group" id="group2" style="display:none;">
                <!-- Tarjeta 4 -->
                <div class="card" id="card4">
                    <img src="img/Dermaplaning-Facial.jpg" alt="Luminous Face">
                    <h3>Dermaplaning</h3>
                    <button onclick="showModal('modal4')">Ver más</button>
                </div>

                <!-- Tarjeta 5 -->
                <div class="card" id="card5">
                    <img src="img/masaje.jpg" alt="Masaje Relajante">
                    <h3>Masaje Relajante</h3>
                    <button onclick="showModal('modal5')">Ver más</button>
                </div>

                <!-- Tarjeta 6 -->
                <div class="card" id="card6">
                    <img src="img/hidralips.webp" alt="Hidralips">
                    <h3>Hidralips</h3>
                    <button onclick="showModal('modal6')">Ver más</button>
                </div>
            </div>

            <!-- Paginador para cambiar entre las tarjetas -->
            <div class="paginator">
                <span class="dot active" onclick="showGroup(1)"></span>
                <span class="dot" onclick="showGroup(2)"></span>
            </div>
        </div>
    </div>

    <!-- Modales para cada tarjeta -->
    <!-- Modal 1 -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <img src="img/facialclasico.jpg" alt="Jet Lag S.O.S" class="modal-img">
            <span class="close" onclick="hideModal('modal1')">&times;</span>
            <h2>Facial Clásico</h2>
            <p>Descripción del servicio Facial Clásico.</p>
            <p>40 MINUTOS - $166.600 COP</p>
            <a href="cliente.php?servicio=Facial Clásico" class="button">Reservar</a>
        </div>
    </div>

    <!-- Modal 2 -->
    <div id="modal2" class="modal">
        <div class="modal-content">
            <img src="img/diamante.jpg" alt="Facial Diamante" class="modal-img">
            <span class="close" onclick="hideModal('modal2')">&times;</span>
            <h2>Facial Diamante</h2>
            <p>Descripción detallada del servicio Facial Diamante.</p>
            <p>40 MINUTOS - $150.000 COP</p>
            <a href="cliente.php?servicio=Facial Diamante" class="button">Reservar</a>
        </div>
    </div>

    <!-- Modal 3 -->
    <div id="modal3" class="modal">
        <div class="modal-content">
            <img src="img/luminous.jpg" alt="Luminous Face" class="modal-img">
            <span class="close" onclick="hideModal('modal3')">&times;</span>
            <h2>Luminous Face</h2>
            <p>Descripción detallada del servicio Luminous Face.</p>
            <p>40 MINUTOS - $140.000 COP</p>
            <a href="cliente.php?servicio=Luminous Face" class="button">Reservar</a>
        </div>
    </div>
    <div id="modal4" class="modal">
        <div class="modal-content">
            <img src="img/Dermaplaning-Facial.jpg" alt="Luminous Face" class="modal-img">
            <span class="close" onclick="hideModal('modal4')">&times;</span>
            <h2>Dermaplaning</h2>
            <p>Descripción detallada del servicio Dermaplaning.</p>
            <p>40 MINUTOS - $140.000 COP</p>
            <a href="cliente.php?servicio=Luminous Face" class="button">Reservar</a>
        </div>
    </div>

    <div id="modal5" class="modal">
        <div class="modal-content">
            <img src="img/masaje.jpg" alt="Luminous Face" class="modal-img">
            <span class="close" onclick="hideModal('modal5')">&times;</span>
            <h2>Masaje Relajante</h2>
            <p>Descripción detallada del servicio Masaje relajante.</p>
            <p>40 MINUTOS - $140.000 COP</p>
            <a href="cliente.php?servicio=Luminous Face" class="button">Reservar</a>
        </div>
    </div>

    <div id="modal6" class="modal">
        <div class="modal-content">
            <img src="img/hidralips.webp" alt="Luminous Face" class="modal-img">
            <span class="close" onclick="hideModal('modal6')">&times;</span>
            <h2>Hidralips</h2>
            <p>Descripción detallada del servicio Masaje relajante.</p>
            <p>40 MINUTOS - $140.000 COP</p>
            <a href="cliente.php?servicio=Luminous Face" class="button">Reservar</a>
        </div>
    </div>

        <script src="js/gestionar_modales_y_tarjetas.js"></script>
</body>

</html>