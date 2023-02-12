<?php

session_start();

use MongoDB\BSON\ObjectID;

require_once 'business.php';

if(isset($_POST['login'])){


    $login = $_POST['login'];
    $password = $_POST['password'];

    //tab[0] to true or false tzn login i haslo sie zgadzaja, tab[1] to id uzytkownika, _id dokumentu w kolekcji uzytkownicy

    $tab = checkLoginAndPassword($login, $password);

    if($tab[0]){

        $_SESSION['zalogowany'] = $tab[1];
        header('Location: index.php');
        
    }
    else{

        $_SESSION['blad_log'] = '<p style="color:red;">Błędny login lub hasło!</p>';
        header('Location: logowanie_formularz.php');
    }

}

else{
    header('Location: logowanie_formularz.php');
}


?>