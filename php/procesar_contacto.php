<?php
// Función para procesar el formulario de contacto y soporte técnico
function procesarContacto($nombre, $correoElectronico, $mensaje, $archivosAdjuntos) {
    // Validación del formato del correo electrónico
    if (!filter_var($correoElectronico, FILTER_VALIDATE_EMAIL)) {
        return "El correo electrónico no es válido.";
    }
    
    // Validación de al menos un archivo adjunto
    if (count($archivosAdjuntos['name']) === 0) {
        return "Debes adjuntar al menos un archivo.";
    }

    // Aquí puedes agregar código para el registro de la consulta y manejo de archivos adjuntos

    // Muestra un mensaje de confirmación
    return "¡Consulta enviada con éxito! Gracias por ponerte en contacto.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correoElectronico = $_POST["correo_electronico"];
    $mensaje = $_POST["mensaje"];
    $archivosAdjuntos = $_FILES["archivos_adjuntos"];

    // Procesa el formulario utilizando la función procesarContacto
    $resultado = procesarContacto($nombre, $correoElectronico, $mensaje, $archivosAdjuntos);

    // Redirige a la página de confirmación con el resultado
    header("Location: confirmacion_contacto.php?mensaje=" . urlencode($resultado));
    exit();
}
?>
