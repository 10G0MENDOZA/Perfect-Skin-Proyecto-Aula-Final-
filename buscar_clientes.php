<?php
session_start(); // Inicia la sesión

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

// Inicializar la variable para la búsqueda
$cedula = isset($_POST['cedula']) ? $_POST['cedula'] : '';

// Consultar los clientes
if ($cedula) {
    $sql = "SELECT * FROM clientes WHERE cedula = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cedula);
} else {
    $sql = "SELECT * FROM clientes";
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ver Clientes</title>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/ver_clientes.css">
    <link rel="icon" href="img/LOGO.jpeg">
</head>
<body>
    <h2>Ver Clientes</h2>

    <form method="post" action="">
        <label for="cedula">Buscar por Cédula:</label>
        <input type="text" name="cedula" id="cedula" value="<?php echo htmlspecialchars($cedula); ?>">
        <button type="submit">Buscar</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Accioness</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['cedula']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['correo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['telefono']) . "</td>";
                    echo "<td>
                            <form action='editar_cliente.php' method='post' style='display:inline;'>
                                <input type='hidden' name='cedula' value='" . htmlspecialchars($row['cedula']) . "'>
                                <button type='submit'>Editar</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay clientes registrados.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    // Cerrar la conexión
    $stmt->close();
    $conn->close();
    ?>
</body>
</html>
