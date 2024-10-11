<?php
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
    $dbname = "perfect-skin";

    // Crea una conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recoge el correo electrónico del formulario
    $email = $_POST['email'];

    // Consulta para encontrar al usuario por correo electrónico
    $sql = "SELECT * FROM registros_clientes WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $token = bin2hex(random_bytes(50)); // Genera un token aleatorio

        // Actualiza el token en la base de datos
        $sql = "UPDATE registros_clientes SET token_recuperacion = '$token' WHERE email = '$email'";
        $conn->query($sql);

        // Envía el correo de recuperación
        $mail = new PHPMailer(true);
        try {
            // Configura el servidor de correo (para Gmail)
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'skingperfect@gmail.com'; // Cambia esto a tu dirección de correo
            $mail->Password = 'wzbu htbp hgpu ziko'; // Cambia esto a tu contraseña de Gmail
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Configuración del correo
            $mail->setFrom('skingperfect@gmail.com', 'Tu nombre');
            $mail->addAddress($email);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Recuperación de Contraseña';
            $mail->Body = "Hola,<br> Haz clic en el siguiente enlace para restablecer tu contraseña: 
               <a href='http://localhost/Perfect_Skin/restablecer.php?token=$token'>Restablecer contraseña</a>";

            $mail->send();
            echo "Correo enviado. Por favor, revisa tu bandeja de entrada para restablecer tu contraseña.";
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    } else {
        echo "No se encontró una cuenta con ese correo electrónico.";
    }

    $conn->close();
}
?>
