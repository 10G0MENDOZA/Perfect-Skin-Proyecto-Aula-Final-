<?php
// Iniciar sesión para manejar variables de sesión
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "perfect_skin";
$port = "3306";

// Crear conexión
$conn = new mysqli($servername, $username_db, $password_db, $dbname, $port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Consulta para validar si el usuario y contraseña existen
    $sql = "SELECT * FROM administrador WHERE usuario = ? AND contraseña = MD5(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Si los datos coinciden, redirigir a la página del administrador
        $_SESSION['admin'] = $username; // Guardar el usuario en la sesión
        header("Location: administrador.php");
        exit();
    } else {
        // Si las credenciales son incorrectas, redirigir al formulario con un mensaje de error
        $error = "Usuario o contraseña incorrecto";
        header("Location: login_admin.php?error=" . urlencode($error));
        exit();
    }

    // Cerrar la conexión y la consulta
    $stmt->close();
    $conn->close();
} else {
    echo "Método de solicitud no permitido.";
}
?>