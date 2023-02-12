<?php

use MongoDB\BSON\ObjectID;

require '../../vendor/autoload.php';

require_once 'business.php';

$db = get_db();

$dokumenty = $db -> obrazy -> find();


foreach($dokumenty as $dokument){

    $id = $dokument['_id'];
    $query = ['_id' => new ObjectId($id)];
    $db->obrazy->deleteOne($query);
}


?>