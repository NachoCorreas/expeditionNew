<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php'; // Asegúrate de incluir la biblioteca PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["lname"];
    $telefono = $_POST["lphone"];
    $email = $_POST["lemail"];
    $mensaje = $_POST["lmessage"];

    $mail = new PHPMailer(true);
    
    try {
        // Configura el servidor SMTP y la autenticación
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'icorreas.ig@gmail.com';
        $mail->Password = 'Igco4577877';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configura el remitente y el destinatario
        $mail->setFrom($email, $nombre);
        $mail->addAddress('icorreas.ig@gmail.com');

        // Configura el asunto y el contenido del correo
        $mail->Subject = 'Nuevo mensaje de formulario de contacto';
        $mail->Body = "Nombre: $nombre\nTeléfono: $telefono\nEmail: $email\nMensaje:\n$mensaje";

        // Envía el correo electrónico
        $mail->send();

        // Redirige de vuelta a la página de origen o muestra un mensaje de confirmación
        header("Location: index.html");
        exit;
    } catch (Exception $e) {
        echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
    }
}
?>
