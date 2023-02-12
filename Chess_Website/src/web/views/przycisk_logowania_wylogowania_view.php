<?php

    if(isset($_SESSION['zalogowany'])){
        echo '<li><a href="wylogowanie.php">Wyloguj się</a></li>';
    }
    else{
         echo '<li><a href="logowanie_formularz.php">Zaloguj się</a></li>';
    }
                               
?>