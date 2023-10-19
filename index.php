<?php
    include 'procesar.php';
    include 'bista.php';

    session_start();
    session_create_id('hola');

    if(!isset($_SESSION['erab'])){
        $_SESSION['erab'] = "";
    }
    if(!isset($_POST['erab'])){
        $_POST['erab'] = "";
    }
    if(!isset($_POST['ph'])){
        $_POST['ph'] = "";
    }
    if(!isset($_POST['zerrenda'])){
        $_POST['zerrenda'] = "";
    }

    if((isset($_POST['erab']) || $_POST['erab'] != "") && (isset($_POST['ph']) || $_POST['ph'] != "")){

        $_SESSION['erab'] = $_POST['erab'];
        $_SESSION['ph'] = $_POST['ph'];

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
        <table>
            <tr>
    <?php


        $erabiltzaileak_puntuazioak = [];
        if (isset($result)) {
            foreach ($result as $info) {
                $erabiltzaileak_puntuazioak[$info['erabiltzailea']] = $info['puntuazio_max'];
            }

            var_dump($erabiltzaileak_puntuazioak);
            echo
        } 
        


        $loginBista = new Login_Bista();
        if (!$login){
            $loginBista->HasierakoFormularioa();
        } else {
            $loginBista->Aukera_Eman();
            if(isset($_POST['zerrenda'])){
                $loginBista->zerrendatu($erabiltzaileak_puntuazioak);
                ?>
        <?php
            }
        }
        ?>     
        </table>
    </body>
    </html>
    