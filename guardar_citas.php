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
    $port = "3306";

    // Crea una conexión
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recoge los datos del formulario
    $cedula = $_POST['cedula']; // Captura la cédula
    $correo = $_POST['correo'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $servicio = $_POST['servicio'];

    // Prepara la consulta SQL para incluir la cédula
    $sql = "INSERT INTO citas_agendadas (cedula, correo, fecha, hora, servicio) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $cedula, $correo, $fecha, $hora, $servicio); // Asegúrate de incluir la cédula aquí

    // Ejecuta la consulta y verifica
    if ($stmt->execute()) {
        // Envía el correo de confirmación
        $mail = new PHPMailer(true);
        try {
            // Configura el servidor de correo (para Gmail)
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'skingperfect@gmail.com'; // Cambia esto a tu dirección de correo
            $mail->Password = 'wzbu htbp hgpu ziko'; // Cambia esto a tu contraseña de Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Configuración del correo
            $mail->setFrom('skingperfect@gmail.com', 'Perfect Skin');
            $mail->addAddress($correo);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Confirmación de tu cita en Perfect Skin';
            $mail->Body = "
                <p>Hola,</p>
                <p>Tu cita ha sido reservada exitosamente en Perfect Skin.</p>
                <p><strong>Detalles de la cita:</strong></p>
                <p><strong>Fecha:</strong> $fecha</p>
                <p><strong>Hora:</strong> $hora</p>
                <p><strong>Servicio:</strong> $servicio</p>
                <p>Por favor, llega con 10 minutos de anticipación. ¡Te esperamos!</p>
                <p>Saludos cordiales,<br>El equipo de Perfect Skin</p>
            ";

            // Envía el correo
            $mail->send();
            // Redirige a la página de confirmación después de enviar el correo
            header("Location: cita_agendada_con_exito.php");
            exit(); // Asegura que el script termine aquí para que la redirección funcione correctamente
        } catch (Exception $e) {
            echo "Cita reservada exitosamente, pero hubo un problema al enviar el correo: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error al reservar la cita: " . $stmt->error; // Cambié `$conn->error` a `$stmt->error` para mayor precisión
    }

    // Cierra la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "Método de solicitud no permitido.";
}
?>
