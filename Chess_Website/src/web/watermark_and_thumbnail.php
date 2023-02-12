<?php

use MongoDB\BSON\ObjectID;

require_once 'business.php';

//czy jest z formularza
if(isset($_POST["submit"])){

    //tekst z pola
    $text = $_POST['znakwodny'];

    //tworzenie obrazka
    if($imageFileType=="png"){
        $image = imagecreatefrompng($target_file);
    }
    else{
        $image = imagecreatefromjpeg($target_file);
    }

    //ścieżka do fonta
    $font_dir = $_SERVER['DOCUMENT_ROOT'] . '/fonts/';
    $font_lato_dir = $font_dir . 'Lato-Regular.ttf';

    $image_scaled = imagescale($image, 200, 125, IMG_BILINEAR_FIXED);

    //tworzy kolor dla obrazka
    $textcolor = imagecolorallocate($image, 49, 203, 80);

    //napisz tekst na obrazku
    imagettftext($image, imagesx($image)/4/(strlen($text)/2), 45, imagesx($image)/2, imagesy($image)/2, $textcolor, $font_lato_dir, $text);

    //gdzie umieścić plik i dodawanie watermark_ do nazwy żeby była inna
    $watermark_file = $target_dir . 'watermark_' .  basename($_FILES['image']['name']);
    $thumbnail_file = $target_dir . 'thumbnail_' .  basename($_FILES['image']['name']);

    //umieść plik i zwolnij pamięć
    if($imageFileType="png"){

       imagepng($image, $watermark_file);
       imagepng($image_scaled, $thumbnail_file);

    }

    else{

        imagejpeg($image, $watermark_file);
        imagejpeg($image_scaled, $thumbnail_file);

    }

        if(isset($_POST['dostep'])){
            insertImageData(basename($_FILES['image']['name']), $_POST['author'], $_POST['title'], $_POST['dostep']);
        }

        else{
            $p = 'publiczne';
            insertImageData(basename($_FILES['image']['name']), $_POST['author'], $_POST['title'], $p);
        }

        imagedestroy($image);
        imagedestroy($image_scaled);
    
}

else{
    header('Location: galeria_formularz.php');
}



?>