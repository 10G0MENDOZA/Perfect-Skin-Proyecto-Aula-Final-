<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "perfect_skin";
    $port = "3306";
    // Crea una conexión
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO mensajes_contacto (nombre, correo, telefono, mensaje) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $nombre, $correo, $telefono, $mensaje);

    // Ejecutar la consulta y verificar
    if ($stmt->execute()) {
        // Redirigir a la página de éxito
        header("Location: contacto_exitoso.php");
        exit();
    } else {
        echo "Error al enviar el mensaje: " . $conn->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "Método de solicitud no permitido.";
}
?>
