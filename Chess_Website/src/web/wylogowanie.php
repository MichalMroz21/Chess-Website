<?php

session_start();

if(isset($_SESSION['zalogowany'])){
	
session_unset();

}

header('Location: index.php');

?>