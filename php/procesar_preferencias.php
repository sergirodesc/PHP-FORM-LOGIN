<?php
// Función para procesar las preferencias de videojuegos
function procesarPreferencias($preferencias) {
    // Registra las preferencias para el jugador (puedes personalizar esta parte según tu base de datos u otro sistema)
    // En este ejemplo, simplemente mostraremos las preferencias en la página de confirmación
    $mensaje = "Gracias por seleccionar los siguientes géneros de videojuegos: " . implode(", ", $preferencias);
    
    // Redirige al jugador a la página de confirmación
    header("Location: confirmacion_preferencias.php?mensaje=" . urlencode($mensaje));
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila las preferencias de videojuegos seleccionadas
    $preferencias = isset($_POST["preferencias"]) ? $_POST["preferencias"] : array();

    // Procesa las preferencias utilizando la función procesarPreferencias
    procesarPreferencias($preferencias);
}
?>
