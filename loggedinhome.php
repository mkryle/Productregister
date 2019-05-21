<?php require 'connection.php'; 

session_start();

// kolla inlog
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} 
// welcome msg
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){;
 echo $welcome . htmlspecialchars($_SESSION["username"]) . $logout;
}
?>
 

<h1>Bra produkter</h1>

<p>
<a href="add.php">Lägg till produkter</a>
</p>

<p>
<a href="showproducts.php">visa produkter</a>
</p>

