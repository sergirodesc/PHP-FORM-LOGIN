<!-- confirmacion_contacto.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_confirmacion_contacto.css">
    <title>Confirmación de Consulta - Plataforma de Videojuegos</title>
</head>
<body>
    <div class="container">
        <h2>¡Consulta Enviada!</h2>
        <?php
            // Muestra el mensaje de confirmación
            if (isset($_GET["mensaje"])) {
                $mensaje = htmlspecialchars($_GET["mensaje"]);
                echo "<p>$mensaje</p>";
            }
        ?>
        
        <!-- Agrega un botón para ir a la sección de comentarios -->
        <a href="../php/comentarios_html.php"><button>Dejar un Comentario</button></a>
    </div>
</body>
</html>
