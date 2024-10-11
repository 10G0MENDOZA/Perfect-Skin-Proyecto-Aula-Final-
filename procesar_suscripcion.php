<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Instancia de PHPMailer
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
            $mail->setFrom('skingperfect@gmail.com', 'Nombre Remitente');
            $mail->addAddress($email); // Destinatario del correo

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Confirma tu suscripción';
            $mail->Body    = '<p>Gracias por suscribirte. Por favor, <a href="https://tusitio.com/confirmar.php?email=' . urlencode($email) . '">haz clic aquí</a> para confirmar tu suscripción.</p>';
            $mail->AltBody = 'Gracias por suscribirte. Por favor, haz clic en el siguiente enlace para confirmar tu suscripción: https://tusitio.com/confirmar.php?email=' . urlencode($email);

            $mail->send();
            
            // Redirigir a la página de suscripción exitosa
            header('Location: suscripcion_exitosa.php');
            exit();
        } catch (Exception $e) {
            echo "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
        }
    } else {
        echo 'Por favor ingresa un correo electrónico válido.';
    }
} else {
    echo 'Método no permitido';
}
?>
