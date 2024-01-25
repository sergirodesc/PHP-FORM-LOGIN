<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inicia la sesión
session_start();

// Función para procesar el inicio de sesión
function procesarInicioSesion($nombreUsuario, $contrasena) {
    // Asegúrate de que existe una contraseña hasheada en la sesión
    if (!isset($_SESSION['contrasena_hash'])) {
        return "Error interno de autenticación. Por favor, intenta nuevamente.";
    }

    // Compara la contraseña proporcionada con la contraseña hasheada almacenada
    if (password_verify($contrasena, $_SESSION['contrasena_hash'])) {
        // Inicio de sesión exitoso, redirige al usuario a la página de bienvenida
        $_SESSION['logged_in'] = true;
        header("Location: ../html/preferencias.html");
        exit();
    } else {
        // Credenciales incorrectas, muestra un mensaje de error
        return "Nombre de usuario o contraseña incorrectos.";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];
    // Procesa el inicio de sesión utilizando la función procesarInicioSesion
    $resultado = procesarInicioSesion($nombreUsuario, $contrasena);
    // Si hay un resultado, muestra un menspaje de error
    if ($resultado) {
        echo $resultado;
    }
}

?>
