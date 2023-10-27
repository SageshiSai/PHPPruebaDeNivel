<?php
include 'bista.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <table>
            <tr>
    <?php


        $erabiltzaileak_puntuazioak = [];
        if (isset($result)) {
            foreach ($result as $info) {
                $erabiltzaileak_puntuazioak[ $info[ 'erabiltzailea' ] ] = $info[ 'puntuazio_max' ];
            }

        } 
        


        $loginBista = new Login_Bista();
        $loginBista->HasierakoFormularioa();
        ?>     
        </table>
    </body>
    </html>
    