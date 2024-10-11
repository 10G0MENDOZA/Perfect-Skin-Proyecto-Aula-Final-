<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/LOGO.jpeg">
    <link rel="stylesheet" href="css/login_admin.css">
    <title>Login Administrador - Perfect-Skin</title>
    <style>
        body {
            background: url(img/capaadministrador.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            height: 80vh;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    
    <div class="login-container">
        <h2>Administrador</h2>
        <form action="procesa_administrador.php" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su usuario" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            
            <!-- Mostrar el mensaje de error si existe -->
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger mt-3">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>
            
            <div class="form-text">
                <a href="recuperar.php">¿Olvidó su contraseña?</a>
            </div>
        </form>
    </div>
    
    <script src="js/inactividad.js"></script>
</body>

</html>
