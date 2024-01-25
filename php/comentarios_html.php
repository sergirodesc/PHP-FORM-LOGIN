<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_comentarios.css">
    <title>Comentarios y Feedback - Plataforma de Videojuegos</title>
</head>
<body>
    <div class="container">
        <h2>Deja tus Comentarios</h2>
        <form action="../php/procesar_comentario.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <label for="correo_electronico">Correo Electrónico:</label>
            <input type="email" id="correo_electronico" name="correo_electronico" required>
            <br>
            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario" rows="4" required></textarea>
            <br>
            <!-- Campo oculto para protección CSRF -->
            <?php
                session_start();
                $tokenCSRF = bin2hex(random_bytes(32));
                $_SESSION["token_csrf"] = $tokenCSRF;
            ?>
            <input type="hidden" name="token_csrf" value="<?php echo $tokenCSRF; ?>">
            <!-- Fin del campo oculto CSRF -->
            <br>
            <input type="submit" value="Enviar Comentario">
        </form>
    </div>
</body>
</html>
