<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_confirmacion_preferencias.css">
    <title>Confirmación de Preferencias - Plataforma de Videojuegos</title>
</head>
<body>
    <div class="container">
        <h2>¡Gracias por tus preferencias!</h2>
        <?php
            // Muestra el mensaje de agradecimiento
            if (isset($_GET["mensaje"])) {
                $mensaje = htmlspecialchars($_GET["mensaje"]);
                echo "<p>$mensaje</p>";
            }
        ?>
        <form action="../html/contacto.html"> <!-- Aquí redirige al formulario de contacto -->
            <button type="submit">Formulario de Contacto</button>
        </form>
    </div>
</body>
</html>
