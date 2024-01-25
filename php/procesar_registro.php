<?php
// Inicia la sesión
session_start();

// Función para procesar el registro de nuevos jugadores
function procesarRegistro($nombreUsuario, $correoElectronico, $contrasena)
{
    // Validación del formato del correo electrónico
    if (!filter_var($correoElectronico, FILTER_VALIDATE_EMAIL)) {
        return "El correo electrónico no es válido.";
    }

    // Hashea la contraseña antes de almacenarla
    $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Guarda los datos del nuevo jugador en la sesión
    $_SESSION['nombre_usuario'] = $nombreUsuario;
    $_SESSION['correo_electronico'] = $correoElectronico;
    $_SESSION['contrasena_hash'] = $contrasenaHash;

    // Inicia sesión después del registro
    $_SESSION['logged_in'] = true;

    // Redirige al jugador a la página de inicio de sesión
    header("Location:  ../html/inicio_sesion.html");
    exit();
}


// Inicializa la variable $resultado para evitar problemas de "indefinido"
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST["nombre_usuario"];
    $correoElectronico = $_POST["correo_electronico"];
    $contrasena = $_POST["contrasena"];
    // Procesa el registro utilizando la función procesarRegistro
    $resultado = procesarRegistro($nombreUsuario, $correoElectronico, $contrasena);
}

// Muestra el resultado (puede ser un mensaje de error o estar vacío si la validación es exitosa)
echo $resultado;
?>
