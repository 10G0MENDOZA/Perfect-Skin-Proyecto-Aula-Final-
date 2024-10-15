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
    // Obtener y limpiar los datos del formulario
    $username = htmlspecialchars(trim($_POST['username']));
    $password = $_POST['password']; // No limpiamos la contraseña, ya que será encriptada

    // Consulta para verificar si el usuario existe
    $sql = "SELECT * FROM usuarios_admin WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Si el usuario existe, obtener la contraseña almacenada
        $admin = $result->fetch_assoc();
        $hash_password = $admin['contraseña']; // Asegúrate de que en la BD la contraseña esté encriptada con password_hash()

        // Verificar la contraseña
        if (password_verify($password, $hash_password)) {
            // Si la contraseña es correcta, iniciar sesión
            $_SESSION['admin'] = $username;
            header("Location: administrador.php"); // Redirigir a la página del administrador
            exit();
        } else {
            // Contraseña incorrecta
            $error = "Usuario o contraseña incorrecto";
            header("Location: login_admin.php?error=" . urlencode($error));
            exit();
        }
    } else {
        // Usuario no encontrado
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
