<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "perfect-skin";

    // Crea una conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Actualiza la contraseña en la base de datos
    $sql = "UPDATE registros_clientes SET password = '$new_password', token_recuperacion = NULL WHERE token_recuperacion = '$token'";
    if ($conn->query($sql) === TRUE) {
        echo "Contraseña actualizada exitosamente.";
    } else {
        echo "Error al actualizar la contraseña: " . $conn->error;
    }

    $conn->close();
}
?>