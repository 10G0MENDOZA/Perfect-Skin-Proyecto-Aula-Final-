<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Usuario - Perfect-Skin</title>
    <link rel="icon" href="img/LOGO.jpeg">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/crear_usuario.css">
</head>

<body>
    <header>
        <h1>Crear Usuario</h1>
    </header>

    <main>
        <form action="procesar_creacion_de_usuario.php" method="POST" class="container mt-5">
            <div class="input-group mb-3">
                <span class="input-group-text" id="usuario-addon"><i class="fas fa-user"></i></span>
                <input type="text" id="usuario" name="usuario" class="form-control" required
                    placeholder="Ingrese su nombre de usuario" aria-describedby="usuario-addon">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="password-addon"><i class="fas fa-lock"></i></span>
                <input type="password" id="contrasena" name="contrasena" class="form-control" required
                    placeholder="Ingrese su contraseña" aria-describedby="password-addon">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="role-addon"><i class="fas fa-user-tag"></i></span>
                <select name="rol" id="rol" class="form-select" aria-describedby="role-addon">
                    <option value="" disabled selected>Seleccione un rol</option>
                    <option value="administrador">Administrador</option>
                </select>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block">Crear Usuario</button>
            </div>
        </form>
    </main>

    <script src="https://kit.fontawesome.com/a81368914c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>