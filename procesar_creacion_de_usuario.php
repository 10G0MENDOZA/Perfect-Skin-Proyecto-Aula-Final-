<?php
// Conectar a la base de datos
$host = "localhost"; // Cambia esto si tu base de datos está en otro lugar
$user = "root"; // Usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$dbname = "perfect_skin"; // Nombre de la base de datos
$port = "3306";
// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname, $port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$contrasena = mysqli_real_escape_string($conn, $_POST['contrasena']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$rol = mysqli_real_escape_string($conn, $_POST['rol']);

// Encriptar la contraseñaS
$hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

// Consulta para insertar el nuevo usuario en la base de datos
$sql = "INSERT INTO usuarios (username, email, password, role) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $usuario, $email, $hashed_password, $rol);

if ($stmt->execute()) {
    // Redirigir a la página de éxito
    header("Location: usuario_creado_exitosamente.php");
    exit();
} else {
    // Manejar errores en la inserción
    echo "Error al crear el usuario: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
