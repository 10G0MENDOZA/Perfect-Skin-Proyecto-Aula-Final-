<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];
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

    // Consulta para verificar el token
    $sql = "SELECT * FROM registros_clientes WHERE token_recuperacion = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la consulta: " . $conn->error);
    }

    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        // Token válido, mostrar formulario para cambiar la contraseña
        echo '<form action="actualizar_password.php" method="POST">
                <input type="hidden" name="token" value="' . htmlspecialchars($token) . '">
                <div>
                    <label for="password">Nueva Contraseña:</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit">Actualizar Contraseña</button>
              </form>';
    } else {
        echo "Token inválido o expirado.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Token no proporcionado.";
}
?>