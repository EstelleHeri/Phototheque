<?php
/* HERIPRET Estelle 
Permet de se déconnecter  */
session_start();
$_SESSION = array();
session_destroy();
header("Location: login.php");
?>