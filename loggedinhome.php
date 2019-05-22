<?php require 'connection.php'; 

session_start();

// kolla inlog
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} 
$wlcom  = new hey();
$welcomeUser = new loggedIn($wlcom);
// welcome msg
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){;
 echo $welcome . $welcomeUser->welcomeUser($welcomeUser, $wlcom) . $logout;
}



?>
 

<h2>Dina produkter</h2>

<p>
<a href="add.php">Lägg till produkter</a>
</p>

<p>
<a href="showproducts.php">visa produkter</a>
</p>

