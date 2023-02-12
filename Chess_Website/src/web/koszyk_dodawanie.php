<?php

    session_start();

    $ile = count($_SESSION['nazwyObrazkow']);

    for($i=0; $i<$ile; $i++){

        $nazwa = $_SESSION['nazwyObrazkow'][$i];

        $flaga = 1;

        for($j=0; $j<count($_SESSION['koszyk']); $j++){

            if($_SESSION['koszyk'][$j]==$nazwa) $flaga = 0;

        }

        if(!isset($_POST[('box' . $i)])){
            $flaga = 0;
        }

        if($flaga){

            array_push($_SESSION['koszyk'], $nazwa);

        }

    }

    header('Location: galeria.php');

?>