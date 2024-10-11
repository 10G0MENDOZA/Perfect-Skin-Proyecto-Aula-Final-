<?php
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

// Procesar la actualización del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $servicio = $_POST['servicio'];

    // Actualizar la cita
    $sql_update = "UPDATE citas_agendadas SET correo=?, fecha=?, hora=?, servicio=? WHERE cedula=?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param('sssss', $correo, $fecha, $hora, $servicio, $cedula);

    if ($stmt->execute()) {
        header("Location: exito_actualizado.php"); // Redirige a exito_actualizado.php
        exit();
    } else {
        echo "Error al actualizar la cita: " . $conn->error;
    }
}

$conn->close();
?>
