<?php

    session_start();

    $_SESSION['przeskok'] = 'minus';

    header('Location: galeria.php');

?>