<!-- mensajes_jugadores.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_mensajes_final.css">
    <title>Mensajes de Jugadores - Plataforma de Videojuegos</title>
</head>

<body>
    <div class="container">
        <h2>Mensajes de Jugadores</h2>

        <?php
        session_start();

        // Función para enviar mensajes
        function enviarMensaje($destinatario, $mensaje)
        {
            // Simulación de almacenamiento de mensajes (puedes reemplazar esto con una base de datos u otro sistema)
            $mensajesAlmacenados = isset($_SESSION['mensajes']) ? $_SESSION['mensajes'] : [];

            // Verifica si hay mensajes almacenados para el destinatario actual
            if (!isset($mensajesAlmacenados[$destinatario])) {
                $mensajesAlmacenados[$destinatario] = [];
            }

            // Agrega el mensaje a los mensajes almacenados del destinatario
            $mensajesAlmacenados[$destinatario][] = $mensaje;

            // Actualiza la sesión con los nuevos mensajes
            $_SESSION['mensajes'] = $mensajesAlmacenados;

            // Retorna un mensaje de confirmación
            return "Mensaje enviado a " . $destinatario . ": " . $mensaje;
        }

        // Función para obtener el historial de mensajes de un destinatario
        function obtenerHistorialMensajes($destinatario)
        {
            $mensajesAlmacenados = isset($_SESSION['mensajes']) ? $_SESSION['mensajes'] : [];

            if (isset($mensajesAlmacenados[$destinatario])) {
                return $mensajesAlmacenados[$destinatario];
            } else {
                return [];
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $destinatario = $_POST["destinatario"];
            $mensaje = $_POST["mensaje"];

            // Procesa el mensaje utilizando la función enviarMensaje
            $resultado = enviarMensaje($destinatario, $mensaje);

            // Muestra el resultado
            echo $resultado;
        }

        // Obtiene el historial de mensajes del destinatario actual
        $destinatarioActual = "jugador1"; // Puedes cambiar esto según tus necesidades
        $historialMensajes = obtenerHistorialMensajes($destinatarioActual);

        // Muestra los mensajes
        if (!empty($historialMensajes)) {
            echo "<ul>";
            foreach ($historialMensajes as $mensaje) {
                echo "<li>$mensaje</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No hay mensajes disponibles.</p>";
        }
        ?>

        <!-- Agrega un botón para ir a la siguiente página -->
        <form action="../html/cargar_contenido.html" method="get">
            <button type="submit">Ir al contenido</button>
        </form>
    </div>
</body>

</html>
