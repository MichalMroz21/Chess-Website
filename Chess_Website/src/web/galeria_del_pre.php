<?php

session_start();

$_SESSION['ktoraGaleria'] = 1;

header('Location: galeria.php');

?>