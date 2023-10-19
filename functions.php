<?php
    include "procesar.php";
    function checkUser($contraseña, $usuario){
        $sql = "SELECT 
                erabiltzailea, pasahitza
                FROM
                jokalariak";
        $resultado = mysqli_query($conn, $sql);
    }
?>