<?php

//check for errors
error_reporting(E_ALL);
ini_set('display_errors', 1);


 // set database connection variables

require 'connection.php';

// try connection
if ($conn->connect_error) {
    die("NO CONNECTION" . $conn->connect_error);

} else if($link === false){
    die("NO CONNECTION" . mysqli_connect_error());
} else {
    echo 'Connected to DB ! -<font color="green"> <u>success!</u></font><br>';
    echo '<form id="tableform" method="post" action="addproducts.php"><p><h3>Gå vidare för att skapa produkt och kund tabell:</h3></p><p><input type="submit" value="Next"></p></form>';
}
?>


