<?php

//te dwie linijki dodane w celu zapewnenia poprawnego działania programu. 
use MongoDB\BSON\ObjectID;

require '../../vendor/autoload.php';

//łączenie się z data bazą 
function get_db(){

    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);

    $db = $mongo -> wai;

    return $db;

}

//włożenie danych do kolekcji obrazy w postaci dokumentu przechowującego to co przyjmuje funkcja i $obraz
function insertImageData($fileName, $autor, $tytul, $dostep){

    $db = get_db();

    $obraz = [
        
        'fileName' => $fileName,
        'autor' => $autor,
        'tytul' => $tytul,
        'dostep' => $dostep
    ];

    $db->obrazy->insertOne($obraz);
}

//włożenie danych do kolekcji uzytkownicy w postaci dokumentu przechowującego to co przyjmuje funkcja i $user
function insertUser($email, $login, $password){

    $db = get_db();

    $user = [

        'email' => $email,
        'login' => $login,
        'password' => $password
    ];

    $db->uzytkownicy->insertOne($user);

}

//sprawdza czy mail lub login się powtarza w bazie danych
function checkEmailAndLogin($email, $login){

    //jak nic się nie powtarza to $ret = 0;
    $ret = 0;

    $db = get_db();

    $dokumenty = $db -> uzytkownicy -> find();


    foreach($dokumenty as $dokument){

        //jak któreś się powtarza to $ret = 1;
        if($email == $dokument['email'] || $login == $dokument['login']) $ret = 1;
    
    }

    return $ret;

}

function checkLoginAndPassword($login, $password){

    $ret = 0;

    $db = get_db();

    $id = 0;

    $dokumenty = $db -> uzytkownicy -> find();


    foreach($dokumenty as $dokument){

        //jak któreś się powtarza to $ret = 1;
        if($login == $dokument['login'] && password_verify($password, $dokument['password'])){
            $ret = 1;
            $id = $dokument['_id'];
        } 
    
    }

    return [$ret, $id];

}

function getPictureData($page, $pageSize){

    $db = get_db();

    $opts = [
        'skip' => ($page - 1) * $pageSize,
        'limit' => $pageSize
    ];

    $obrazyy = $db->obrazy->find([], $opts);

    $tab = array(
        array("", "", "", ""),
        array("", "", "", ""),
        array("", "", "", ""),
    );

    $i = 0;

    foreach($obrazyy as $obraz){

        $tab[$i][0] =  $obraz['fileName'];
        $tab[$i][1] =  $obraz['autor'];
        $tab[$i][2] =  $obraz['tytul'];
        $tab[$i][3] =  $obraz['dostep'];

        $i++;

    }

    return $tab;
}

function getNick($id){

    $db = get_db();

    $dokumenty = $db -> uzytkownicy -> find();

    $ret = 'null';

    foreach($dokumenty as $dokument){

        if($id==$dokument['_id']){
            $ret = $dokument['login'];
        }
    
    }

    return $ret;


}

function searchThumbnails($wyszukiwanie){

    $db = get_db();

    $ret = "";

    $dokumenty = $db -> obrazy -> find();

    $w =  $wyszukiwanie;
    
    $zmienna = '/images/';

    foreach($dokumenty as $dokument){

        $flaga = 1;

        if(strlen($w)==0) $flaga = 0;

        if(strlen($w)>strlen($dokument['fileName'])){
            $flaga = 0;
        }

        if($flaga){

            $j = 0;

            for($i=0; $i<strlen($w); $i++){
            
                if(strtolower($w[$i])!=strtolower($dokument['tytul'][$j])) $flaga = 0;
    
                $j++;
            }

        }

        if($dokument['dostep']=='prywatne'){

            if(isset($_SESSION['zalogowany'])){

                if(getNick($_SESSION['zalogowany']) != $dokument['autor']){
                    $flaga = 0;
                }
            }
            else{
                $flaga = 0;
            }

        }

        
            if($flaga){

                $ret = $ret . '<div class="zdjecie"><a href=' . '"' . $zmienna . 'watermark_' . $dokument['fileName'] . '"' . 'target="_blank"><img src=' . '"' . $zmienna . 'thumbnail_' . $dokument['fileName'] . '"' . 'alt="magnus_carlsen"></a> <p style="text-align:center; color: white;">' . 'Tytuł: ' . $dokument['tytul'] . '<br/> <br/>' . 'Autor: ' . $dokument['autor'] . '<br/> <br/>' . 'Dostęp: ' . $dokument['dostep'] . '</p></div> ';
                
            }
        

        
    }

    return $ret;

}




?>