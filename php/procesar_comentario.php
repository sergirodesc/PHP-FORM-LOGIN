<?php
// Función para procesar los comentarios y feedback
function procesarComentario($nombre, $correoElectronico, $comentario, $tokenCSRF) {
    // Validación del formato del correo electrónico
    if (!filter_var($correoElectronico, FILTER_VALIDATE_EMAIL)) {
        return "El correo electrónico no es válido.";
    }
    // Validación del comentario no vacío
    if (empty($comentario)) {
        return "Debes proporcionar un comentario.";
    }
    // Validación del token CSRF
    session_start();
    $tokenAlmacenado = $_SESSION["token_csrf"];
    if ($tokenCSRF !== $tokenAlmacenado) {
        return "Error de seguridad: Token CSRF no válido.";
    }
    // Registro exitoso del comentario (puedes agregar código para el registro en la base de datos u otro almacenamiento)
    // Muestra un mensaje de agradecimiento
    return "Gracias por tu comentario. ¡Apreciamos tu feedback!";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correoElectronico = $_POST["correo_electronico"];
    $comentario = $_POST["comentario"];
    $tokenCSRF = $_POST["token_csrf"];
    // Procesa el comentario utilizando la función procesarComentario
    $resultado = procesarComentario($nombre, $correoElectronico, $comentario, $tokenCSRF);
    // Muestra el resultado con estilos CSS en línea
    echo '<div style="font-family: \'Roboto\', sans-serif; background: linear-gradient(90deg, #0f0c29, #302b63, #24243e); text-align: center; margin: 0; display: flex; align-items: center; justify-content: center; height: 100vh; color: #ffffff;">';
    echo '<div style="width: 100%; max-width: 600px; margin: 20px; background: #1a1a1a; border-radius: 10px; padding: 20px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);">';
    echo '<h2 style="text-transform: uppercase; margin-bottom: 20px; letter-spacing: 2px; color: #ffffff;">Resultado</h2>';
    echo '<p style="font-size: 18px; line-height: 1.6; margin-bottom: 20px; color: #ffffff;">' . $resultado . '</p>';
    // Agrega un botón para ir a la siguiente página
    echo '<a href="../html/enviar_mensaje.html"><button style="background: linear-gradient(45deg, #78ffd6, #a8ff78); color: #121212; cursor: pointer; border: none; border-radius: 8px; padding: 12px 20px; font-weight: bold; transition: background 0.3s ease-in-out;">Ir a la siguiente página</button></a>';
    echo '</div></div>';
}
?>
