<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administradoor</title>
    <link rel="stylesheet" href="css/administrador.css">
    <link rel="icon" href="img/LOGO.jpeg" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="menu-button-container">
        <button id="show-options-button" onclick="toggleOptions()">
            <i class="fas fa-bars"></i> Menú
        </button>
    </div>
    <div class="options" id="options">
        <a href="buscar_clientes.php">
            <i class="fas fa-search"></i> Buscar clientes
        </a>
        <a href="crear_usuario.php">
            <i class="fas fa-user-plus"></i> Crear Usuarios
        </a>
        <a href="ver_citas.php">
            <i class="fas fa-calendar-check"></i> Ver citas agendadas
        </a>
    </div>
    <script src="js/administrador.js"></script>
    <script src="js/inactividad.js"></script>
</body>

</html>
