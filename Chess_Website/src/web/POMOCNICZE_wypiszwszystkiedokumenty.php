<?php

use MongoDB\BSON\ObjectID;

require '../../vendor/autoload.php';

require_once 'business.php';

$db = get_db();

$dokumenty = $db -> obrazy -> find();

$i = 0;

foreach($dokumenty as $dokument){
    $i = $i + 1;
    echo $i . '<br/>';
    echo $dokument['_id'] . '<br/>';
    echo $dokument['fileName'] . '<br/>';
    echo $dokument['autor'] . '<br/>';
    echo $dokument['tytul'] . '<br/>';
    echo $dokument['dostep'] . '<br/>';
}


?>