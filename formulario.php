<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["lname"];
    $telefono = $_POST["lphone"];
    $email = $_POST["lemail"];
    $mensaje = $_POST["lmessage"];
    
    $destinatario = "icorreas.pro@gmail.com"; // Reemplaza esto con tu dirección de correo electrónico
    
    $asunto = "Nuevo mensaje de formulario de contacto";
    
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Teléfono: $telefono\n";
    $contenido .= "Email: $email\n";
    $contenido .= "Mensaje:\n$mensaje";
    
    // Envía el correo electrónico
    mail($destinatario, $asunto, $contenido);
    
    // Redirige de vuelta a la página de origen o muestra un mensaje de confirmación
    header("./index.html");
    exit;
}
?>
