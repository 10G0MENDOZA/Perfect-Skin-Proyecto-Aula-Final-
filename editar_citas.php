<?php
// Iniciar sesión
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perfect_skin";
$port = "3306";

$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se envió una cédula
if (isset($_POST['cedula'])) {
    $cedula = $_POST['cedula'];

    // Consultar la cita por cédula
    $sql = "SELECT * FROM citas_agendadas WHERE cedula = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $cedula);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Obtener los datos de la cita
    } else {
        echo "No se encontró ninguna cita con esa cédula.";
        exit();
    }
} else {
    echo "No se proporcionó ninguna cédula.";
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Cita</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/editar_citas.css">
</head>

<body>
    <h2>Editar Cita</h2>
    <form id="editarCitaForm" method="post" action="guardar_cambios_citas.php">
        <label for="cedula">Cédula:</label>
        <input type="text" id="cedula" name="cedula" value="<?php echo htmlspecialchars($row['cedula']); ?>" readonly>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($row['correo']); ?>" required>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo htmlspecialchars($row['fecha']); ?>" required>

        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora" value="<?php echo htmlspecialchars($row['hora']); ?>" required>

        <label for="servicio">Servicio:</label>
        <input type="text" id="servicio" name="servicio" value="<?php echo htmlspecialchars($row['servicio']); ?>" required>

        <button type="submit">Guardar cambios</button>
    </form>

    <div id="message" style="display:none;">Cita actualizada con éxito.</div>
    <button id="backButton" style="display:none;" onclick="window.location.href='ver_clientes.php';">Volver</button>

    <script src="js/editarcitas.js"></script>
    <script src="js/inactividad.js"></script>
</body>

</html>

<?php
// Cerrar la conexión
$conn->close();
?>
