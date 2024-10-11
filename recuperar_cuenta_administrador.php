<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="icon" href="img/LOGO.jpeg">
    
    <title>Recuperar Contraseña</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="css/recuperar.css">
    <script src="https://kit.fontawesome.com/a81368914c.js" crossorigin="anonymous"></script>

</head>

<body>
    <section class="general">
        <div class="login-content">
            <form action="procesar_recuperacion_correo.php" method="POST">
                <h2 class="title">Recuperar Contraseña</h2>
                <p class="subtitle">Ingresa el correo electrónico asociado a tu cuenta y recibirás un enlace para
                    restablecer tu contraseña.</p>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <input type="email" name="email" class="input" placeholder="Correo Electrónico" required>
                    </div>
                </div>
                <div class="links">
                    <a href="inicia.php" class="left-link">Volver al inicio de sesión</a>
                </div>
                <button type="submit" class="btn">Enviar</button>
            </form>

        </div>
    </section>
    <script src="js/efectos.js"></script>
    <script src="js/inactividad.js"></script>
</body>

</html>