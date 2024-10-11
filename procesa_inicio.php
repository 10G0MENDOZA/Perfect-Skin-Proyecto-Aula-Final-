<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perfect_skin";
$port = "3306";

$conn = new mysqli($servername, $username, $password, $dbname , $port);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta para encontrar al usuario por correo electrónico
    $sql = "SELECT * FROM registros_clientes WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Mostrar la contraseña almacenada para depuración
        echo "Contraseña almacenada: " . $row['password'] . "<br>";

        // Verificar si el correo ha sido confirmado
        if ($row['verificado'] == 1) {
            // Mostrar la contraseña ingresada para depuración
            echo "Contraseña ingresada: " . $password . "<br>";

            // Comparar la contraseña ingresada con la almacenada en texto plano
            if ($password === $row['password']) {
                // Iniciar sesión
                $_SESSION['usuario'] = $row['nombre'];
                echo "Inicio de sesión exitoso. ¡Bienvenido " . $row['nombre'] . "!";
                
                // Redirigir al usuario al dashboard o página de inicio
                header('Location: cliente.php');
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Debes verificar tu correo electrónico antes de iniciar sesión.";
        }
    } else {
        echo "No se encontró una cuenta con ese correo electrónico.";
    }
}

$conn->close();
?>
