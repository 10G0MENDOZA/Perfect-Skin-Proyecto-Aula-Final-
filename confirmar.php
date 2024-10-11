<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perfect_skin";
$port = "3306";

// Crea una conexión con el puerto especificado
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica si el token está presente en la URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Busca el usuario con el token dado
    $sql = "SELECT * FROM registros_clientes WHERE token_verificacion = '$token' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si se encuentra el usuario, actualiza el campo "verificado"
        $sql_update = "UPDATE registros_clientes SET verificado = 1 WHERE token_verificacion = '$token'";

        if ($conn->query($sql_update) === TRUE) {
            echo "Correo verificado exitosamente. Ya puedes iniciar sesión.";
        } else {
            echo "Error al verificar el correo: " . $conn->error;
        }
    } else {
        echo "Token inválido o ya utilizado.";
    }
} else {
    echo "No se ha proporcionado ningún token.";
}
$conn->close();
?>