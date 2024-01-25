<?php
session_start();

function procesarContenido($archivos) {
    // Directorio de carga de contenido
    $directorioCarga = "../uploads/";

    // Lista de formatos permitidos (puedes ampliarla según tus necesidades)
    $formatosPermitidos = array('jpg', 'jpeg', 'png', 'gif');

    // Array para almacenar nombres de archivos cargados
    $nombresArchivos = array();

    // Crea el directorio si no existe
    if (!file_exists($directorioCarga)) {
        mkdir($directorioCarga, 0777, true);
    }

    // Itera sobre cada archivo
    for ($i = 1; $i <= 3; $i++) {
        $nombreArchivo = $archivos["archivo" . $i]["name"];
        $tipoArchivo = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

        // Verifica si se ha cargado un archivo y si el formato es permitido
        if (!empty($nombreArchivo) && in_array($tipoArchivo, $formatosPermitidos)) {
            // Genera un nuevo nombre único para el archivo
            $nuevoNombre = uniqid("contenido_", true) . "." . $tipoArchivo;

            // Mueve el archivo al directorio de carga
            move_uploaded_file($archivos["archivo" . $i]["tmp_name"], $directorioCarga . $nuevoNombre);

            // Agrega el nombre del archivo al array
            $nombresArchivos[] = $nombreArchivo;
        }
    }

    // Muestra el resultado con estilos CSS en línea
    echo '<div style="font-family: \'Roboto\', sans-serif; background: linear-gradient(90deg, #0f0c29, #302b63, #24243e); text-align: center; margin: 0; display: flex; align-items: center; justify-content: center; height: 100vh; color: #ffffff;">';
    echo '<div style="width: 100%; max-width: 600px; margin: 20px; background: #1a1a1a; border-radius: 10px; padding: 20px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);">';
    echo '<h2 style="text-transform: uppercase; margin-bottom: 20px; letter-spacing: 2px; color: #ffffff;">Resultado</h2>';
    echo '<p style="font-size: 18px; line-height: 1.6; margin-bottom: 20px; color: #ffffff;">Contenido cargado exitosamente:</p>';
    
    // Mostrar cada nombre de archivo en una lista ordenada
    echo '<ul style="list-style-type: none; padding: 0; color: #ffffff;">';
    foreach ($nombresArchivos as $nombre) {
        echo '<li>' . $nombre . '</li>';
    }
    echo '</ul>';

    // Agregar enlace de agradecimiento
    echo '<a href="../html/pagina_agradecimiento.html" style="display: inline-block; margin-top: 20px; text-decoration: none; background: linear-gradient(45deg, #78ffd6, #a8ff78); color: #121212; cursor: pointer; border: none; border-radius: 8px; padding: 12px 20px; font-weight: bold; transition: background 0.3s ease-in-out;">Finalizar test</a>';

    echo '</div></div>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesa el contenido utilizando la función procesarContenido
    procesarContenido($_FILES);
}
?>
