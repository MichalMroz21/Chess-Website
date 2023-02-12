<?php

session_start();

use MongoDB\BSON\ObjectID;

//czy ktoś wszedł na stronę z formularza
if(isset($_POST["submit"])){

    $flagUpload = 1; //zmiana na 0 jak coś nie tak

    if(empty($_FILES["image"]['name'])){
        $_SESSION['blad_plik_wybranie'] = '<p style="color: red;">Należy wybrać plik!</p>';
        $flagUpload = 0;
        header('Location: galeria_formularz.php');
        exit;
    }

    //sprawdzenie czy został wpisany tekst w polu znak wodny
    if(strlen($_POST['znakwodny'])==0){
        $_SESSION['blad_znakwodny'] = '<p style="color: red;">Należy wpisać znak wodny</p>';
        $flagUpload = 0;
    }

    if(strlen($_POST['author'])==0){
        $_SESSION['blad_author'] = '<p style="color: red;">Należy wpisać autora</p>';
        $flagUpload = 0;
    }

    if(strlen($_POST['title'])==0){
        $_SESSION['blad_tytul'] = '<p style="color: red;">Należy wpisać tytuł</p>';
        $flagUpload = 0;
    }


    //target_dir - ścieżka tam gdzie ma być umieszczony obrazek na serwerze, ale jakby w katalogu współdzielonym? zgadłem - działa, target_file - no do target_dir trzeba dodać nazwę obrazka
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
    $target_file = $target_dir . basename($_FILES['image']['name']);


    if(getimagesize($_FILES["image"]["tmp_name"]) === false){ //czy jest obrazkiem
        $_SESSION['blad_plik_obrazek'] = '<p style="color: red;">Plik nie jest obrazkiem!</p>';
        $flagUpload = 0;
    }

    if (file_exists($target_file)) { //czy już istnieje taki plik
        $_SESSION['blad_plik_istnieje'] = '<p style="color: red;">Taki plik już istnieje</p>';
        $flagUpload = 0;
    }

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //to coś przechowuje typ pliku, strtolower zamienia na małe literki, bo czemu nie

    if($imageFileType != "jpg" && $imageFileType != "png"){ //sprawdzanie typu
        $_SESSION['blad_plik_format'] = '<p style="color: red;">Plik nie jest jpg lub png</p>';
        $flagUpload = 0;
    }

    if ($_FILES["image"]["size"] > 1000000) { //czy nie jest za duży
        $_SESSION['blad_plik_rozmiar'] = '<p style="color: red;">Plik przekracza 1MB!</p>';
        $flagUpload = 0;
    }

    if($flagUpload){ //jak flaga 1 to wyślij plik jak 0 to nie

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){ 
            include 'watermark_and_thumbnail.php';
            $_SESSION['udalo_sie_wyslac_pliki'] = '<p style="color: green;">Udało się przesłać plik, 3 pliki wygenerowane</p>';
            header('Location: galeria_formularz.php');
        }

        else { //oby to nigdy nie zaszło
            $_SESSION['nie_udalo_sie_wyslac_pliki'] = '<p style="color: red;">Nie udało się wysłać pliku</p>';
            header('Location: galeria_formularz.php');
        }

    }

    else{
        $_SESSION['plik_nie_zostal_wyslany'] = '<p style="color: red;">Plik nie został wysłany</p>';
        header('Location: galeria_formularz.php');
    }  


}

else{
    header("Location: galeria_formularz.php");
}



?>