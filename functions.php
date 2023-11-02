<?php
    session_start(  );
    session_create_id( 'hola' );

    include "procesar.php";
    function checkUser( $contrasena, $usuario ){
        global $conn;
    
        $sql = "SELECT 
                erabiltzailea, pasahitza
                FROM
                jokalariak
                WHERE
                erabiltzailea = '".$usuario."' AND pasahitza ='".$contrasena."' ";
        $resultado = mysqli_query( $conn, $sql );
        $login = false;
    
        while ( $result = mysqli_fetch_array( $resultado ) ) {
            
            if ( $usuario == $result[ 'erabiltzailea' ] && $contrasena == $result[ 'pasahitza' ] ) {
                
                $_SESSION[ 'erab' ] = $usuario;
                $_SESSION[ 'ph' ] = $contrasena;
                $login = true;
            }
        }
        return $login;
    }

    function getPoints(){
        global $conn;

        $sql = "SELECT 
                erabiltzailea, puntuazio_max as puntos
                FROM
                jokalariak
                ORDER BY 
                puntos DESC";
        $resultado = mysqli_query( $conn, $sql );

        $array_points = [];
        while ( $result = mysqli_fetch_array( $resultado ) ) {
            $array_points[$result[ 'erabiltzailea' ]] = $result[ 'puntos' ];
        }

        return $array_points;
    }

    function getQuestions(){
        $galdera_erantzunen_arraya = array(
            "Pregunta 1" => array(
                "Respuesta 1",
                "Respuesta 2",
                "Respuesta 3",
                "Respuesta correcta"
            ),
            "Pregunta 2" => array(
                "Respuesta 1",
                "Respuesta correcta",
                "Respuesta 3",
                "Respuesta 4"
            )
        );
        return $galdera_erantzunen_arraya;
    }

    function findOutAnswer(){
        global $conn;
        $puntos_sumar = 0;
        $sql = "SELECT 
                puntuazio_max as puntos
                FROM
                jokalariak
                WHERE erabiltzailea ='".$_SESSION['erab']."'";
        $resultado = mysqli_query( $conn, $sql );
        $puntos_old = mysqli_result( $resultado ,0 ,'puntos' );
        $puntos_sumar = $puntos_old;
        for( $num = 0; $num < 2; $num++ ){
            $respuestas = $_POST[ 'galdera'.$num ];

            if($respuestas == "Respuesta correcta" ){
                $puntos_sumar = $puntos_sumar + 1000;
            }

        }
        $sql = "UPDATE jokalariak SET `puntuazio_max` = ".$puntos_sumar." WHERE erabiltzailea = '".$_SESSION['erab']."'";
        mysqli_query( $conn, $sql );
    }

    //FUNCION PARA RECOGER EXCLUSIVAMENTE UN PARAMETRO DEL sql Y AGREGARLO COMO VARIABLE
    function mysqli_result($result, $row, $field = 0) {
        if ($result->data_seek($row)) {
            $row = $result->fetch_array();
            if (isset($row[$field])) {
                return $row[$field];
            }
        }
        return false;
    }
?>