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

// Consultar todas las citas
$sql = "SELECT * FROM citas_agendadas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Citas Agendadas</title>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/citas_agendadas.css">
</head>
<body>
    <h2>Citas Agendadas</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Correo</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Servicio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['cedula']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['correo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['fecha']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['hora']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['servicio']) . "</td>";
                    echo "<td>
                            <form action='editar_citas.php' method='post' style='display:inline;'>
                                <input type='hidden' name='cedula' value='" . htmlspecialchars($row['cedula']) . "'>
                                <button type='submit'>Editar</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay citas agendadas.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    // Cerrar la conexión
    $conn->close();
    ?>
</body>
</html>
