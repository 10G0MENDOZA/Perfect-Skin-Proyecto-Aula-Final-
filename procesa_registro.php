<?php
// Cargar las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "perfect_skin";
    $port = "3306"; // Se especifica el puerto correcto

    // Crea una conexión con el puerto especificado
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recoge los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $cc = $_POST['cc'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Contraseña en texto plano
    $token = bin2hex(random_bytes(50)); // Genera un token aleatorio

    // Inserta el usuario en la base de datos
    $sql = "INSERT INTO registros_clientes (nombre, apellido, edad, cc, email, password, token_verificacion) 
            VALUES ('$nombre', '$apellido', '$edad', '$cc', '$email', '$password', '$token')";

    if ($conn->query($sql) === TRUE) {
        // Envía el correo de confirmación
        $mail = new PHPMailer(true);
        try {
            // Configura el servidor de correo (para Gmail)
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'skingperfect@gmail.com'; // Cambia esto a tu dirección de correo
            $mail->Password = 'wzbu htbp hgpu ziko'; // Cambia esto a tu contraseña de Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Para mayor seguridad
            $mail->Port = 587;

            // Configuración del correo
            $mail->setFrom('skingperfect@gmail.com', 'Perfect-Skin');
            $mail->addAddress($email);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Confirma tu correo electrónico';
            $mail->Body = "Hola $nombre,<br> Haz clic en el siguiente enlace para confirmar tu correo electrónico: 
               <a href='http://localhost/Perfect_Skin/confirmar.php?token=$token'>Confirmar correo</a>";

            $mail->send();
            echo "Correo enviado. Por favor, verifica tu bandeja de entrada para confirmar.";
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }

    $conn->close();
}
?>
