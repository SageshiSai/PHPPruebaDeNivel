<?php
function checkUser( $contrasena, $usuario ){

    global $conn;

    $sql = "SELECT 
            erabiltzailea, pasahitza
            FROM
            jokalariak
            WHERE
            erabiltzailea = '.$usuario.' AND pasahitza ='.$contrasena' ";

    $resultado = mysqli_query( $conn, $sql );

    $login = false;

    while ( $result =mysqli_fetch_array( $resultado ) ) {

        if ( $usuario == $result[ 'erabiltzailea' ] && $contrasena == $result[ 'pasahitza' ] ) {
            
            $_SESSION[ 'erab' ] = $usuario;
            $_SESSION[ 'ph' ] = $contrasena;
            $login = true;
        }
    }
}

if( !checkUser( $_POST( 'erab' ), $_POST( 'ph' ) ) ){
    header("Location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
</head>
<body>
    
</body>
</html>