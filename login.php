<?php
 if($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];


    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "sergi3359933599";
    $dbname = "sergimysql";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error()) {
        die("Error connecting ". $conn->connect_error);

    }

    $query = "SELECT * FROM login WHERE usuario =' $usuario' AND clave = '$clave';

    $result = $conn->query($query);

    if($result->run_rows == 1){
        exit();
        }else{
        exit();
        }

        $conn->close();
}

?>