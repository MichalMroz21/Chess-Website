<?php

    session_start();

    $ile = count($_SESSION['nazwyObrazkow']);
    
        for($i=0; $i<$ile; $i++){

            $flaga = 1;
    
            $nazwa = $_SESSION['nazwyObrazkow'][$i];
    
            if(!isset($_POST[('box' . $i)])){
                $flaga = 0;
            }
    
            if($flaga && $nazwa != 'null'){
    
                $index = 0;
    
                for($j=0; $j<count($_SESSION['koszyk']); $j++){
                    if($nazwa == $_SESSION['koszyk'][$j]) {$j = count($_SESSION['koszyk']); $index--;}
                    $index++;
                }
    
                array_splice($_SESSION['koszyk'], $index, 1);
    
            }
    
        }
    

    header('Location: galeria.php');

?>