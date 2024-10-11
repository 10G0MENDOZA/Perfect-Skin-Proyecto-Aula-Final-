<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="css/administrador.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="icon" href="img/LOGO.jpeg" type="image/png">
</head>

<body>
    <div class="menu-button-container">
        <button id="show-options-button" onclick="toggleOptions()"><i class='bx bx-menu'></i> Menú</button>
    </div>
    <div class="options" id="options">
        
        <a href="servicios.php"><i class='bx bx-wrench'></i> Buscar clientes</a>
        <a href="configuracion.php"><i class='bx bx-cog'></i> Configuración</a>
        <a href="crear_usuario.php"><i class='bx bx-user'></i> Crear Usuarios</a>
        <a href="ver_citas.php"><i class='bx bx-user'></i>ver citas agendadas</a>
    </div>
    <script src="js/administrador.js"></script>
    <script src="js/inactividad.js"></script>
</body>

</html>