<?php

    session_start();

    $_SESSION['przeskok'] = 'plus';

    header('Location: galeria.php');

?>