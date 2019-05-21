<?php require 'connection.php'; 

//ta bort session
session_start();
$_SESSION = array();
session_destroy();

// skicka vidare
header("location: login.php");
exit;
?>