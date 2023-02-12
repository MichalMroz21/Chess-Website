<?php

session_start();

use MongoDB\BSON\ObjectID;

require_once 'business.php';

if(isset($_POST['login'])){

    $flaga_rejestracja = 1;

    //sprawdzanie loginu
    $login = $_POST['login'];

    //alfanumeryczne
    if(!ctype_alnum($login)){
        $_SESSION['blad_login'] = (strlen($login)!=0) ? '<p style="color: red;">Login musi się skladać tylko ze znaków alfanumerycznych!</p>' : '<p style="color:red;">Należy wpisać login!</p>';
        $flaga_rejestracja = 0;
    }

    //dlugość
    if((strlen($login)<3 || strlen($login)>16) && strlen($login)!=0){
        if(strlen($login)!=0) $_SESSION['blad_login'] = '<p style="color:red;">Login musi mieć od 3 do 16 znaków!</p>';
        $flaga_rejestracja = 0;
    }

    //sprawdzanie emaila
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['blad_email'] = (strlen($email)!=0) ? '<p style="color:red;">Niepoprawny adres e-mail!</p>' : '<p style="color:red;">Należy wpisać adres e-mail!</p>';
        $flaga_rejestracja = 0;
    }

    //sprawdzanie hasła
    $haslo = $_POST['password'];
    $hasloR = $_POST['passwordR'];

    //czy są różne
    if($haslo!=$hasloR){
        if(strlen($haslo)!=0 && strlen($hasloR)!=0) $_SESSION['blad_haslo'] = '<p style="color:red;">Hasła są różne!</p>';
        $flaga_rejestracja = 0;
    }

    //czy ma mniej niż 8 lub więcej niż 30
    if(strlen($haslo)<8 || strlen($haslo)>30){
        if(strlen($haslo)!=0 && strlen($hasloR)!=0) $_SESSION['blad_haslo'] = '<p style="color:red;">Hasło ma mieć od 8 do 30 znaków!</p>';
        $flaga_rejestracja = 0;
    }

    if(strlen($haslo)==0){
        $_SESSION['blad_haslo'] = '<p style="color:red;">Należy uzupełnić pole "Hasło"!</p>';
        $flaga_rejestracja = 0;  
    }
    if(strlen($hasloR)==0){
        $_SESSION['blad_hasloR'] = '<p style="color:red;">Należy uzupełnić pole "Powtórz Hasło"!</p>';
        $flaga_rejestracja = 0;  
    }

    //hashowanie hasła
    $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);

    //sprawdzenie powtarzania się loginu lub emaila
    if(checkEmailAndLogin($email, $login)){
        $_SESSION['bladPowt'] = '<p style="color:red;">Podany email lub login są już zajęte!</p>';
        $flaga_rejestracja = 0;
    }

    //wszystko git? rejestruj.
    if($flaga_rejestracja){

        insertUser($email, $login, $haslo_hash);
        $_SESSION['powodzenieRejestracji'] = '<p style="color:green;">Rejestracja powiodła się!</p>';
        header('Location: rejestracja_formularz.php');
    }

    else{
        $_SESSION['niepowodzenieRejestracji'] = '<p style="color: red;">Rejestracja nie powiodła się!</p>';
        header('Location: rejestracja_formularz.php');
    }
    



}
else{
    header('Location: rejestracja_formularz.php');
}


?>