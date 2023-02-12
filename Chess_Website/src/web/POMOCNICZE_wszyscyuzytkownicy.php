<?php

use MongoDB\BSON\ObjectID;

require '../../vendor/autoload.php';

require_once 'business.php';

$db = get_db();

$dokumenty = $db -> uzytkownicy -> find();

$i = 0;

foreach($dokumenty as $dokument){
    $i = $i + 1;
    echo $i . '<br/>';
    echo $dokument['_id'] . '<br/>';
    echo $dokument['email'] . '<br/>';
    echo $dokument['login'] . '<br/>';
    echo $dokument['password'] . '<br/>';
}


?>