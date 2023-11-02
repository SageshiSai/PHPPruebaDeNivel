<?php
include 'bista.php';
include 'procesar.php';
include 'functions.php';

if(!isset($_SESSION[ 'erab' ])){
    if( !checkUser($_POST[ 'ph' ], $_POST[ 'erab' ]  ) ){
    header( "Location: index.php" );
    }
}
if( isset($_POST["jokatu_botoia"]) && $_POST["jokatu_botoia"] == "BIDALI"){
    findOutAnswer();
};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <?php
    $loginBista = new Login_Bista();
    
    if( !isset($_POST[ "opcion" ]) ) {
        $loginBista->Aukera_Eman();
    } else {

        switch ($_POST[ 'opcion' ]) {

            case 'zerrenda':
                $select_puntuaciones = getPoints();
                $loginBista->zerrendatu($select_puntuaciones);
                $loginBista->Aukera_Eman();
                break;
                
            case 'jokatu':
                $select_preguntas = getQuestions();
                $loginBista->galdera_erantzunak_marraztu($select_preguntas);
                $loginBista->Aukera_Eman();
                break;

        }
    } 

    ?>
</head>
<body>
    
</body>
</html>