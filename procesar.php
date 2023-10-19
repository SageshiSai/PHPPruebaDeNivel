<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "jokoa";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

function checkUser($contrasena, $usuario){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "jokoa";

    $conn = new mysqli($servername, $username, $password, $database);

    $sql = "SELECT 
            erabiltzailea, pasahitza
            FROM
            jokalariak
            WHERE
            erabiltzailea = '.$usuario.' AND pasahitza ='.$contrasena' ";
    $resultado = mysqli_query($conn, $sql);

    while ( $result =mysqli_fetch_array($resultado) ) {

        if ( $usuario == $result['erabiltzailea'] && $contrasena == $result['pasahitza'] ) {
            
            $_SESSION['erab'] = $usuario;
            $_SESSION['ph'] = $contrasena;

        }
    }
}
?>
