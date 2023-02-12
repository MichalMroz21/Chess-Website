<?php

session_start();

for($i=0; $i<count($_SESSION['koszyk']); $i++){
    echo $_SESSION['koszyk'][$i] . '<br/>';
}

?>