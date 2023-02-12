<?php

    session_start();

    use MongoDB\BSON\ObjectID;

    require_once 'business.php';

    if((!isset($_SESSION['przeskok']))){
        $_SESSION['page'] = 1;
        $_SESSION['przeskok'] = 'neutral';
    }

    if(isset($_SESSION['page'])){
        
        if($_SESSION['przeskok'] == 'plus'){
            $_SESSION['page']++;
        }

        else if($_SESSION['przeskok'] == 'minus'){
            $_SESSION['page']--;
        }

        unset($_SESSION['przeskok']);

    }

    if($_SESSION['page']<=0) $_SESSION['page'] = 1;

    $page = $_SESSION['page'];

    $pageSize = 3;

    $tab = getPictureData($page, $pageSize);

?>


