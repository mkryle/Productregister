<?php require 'connection.php'; 

session_start();

// kolla inlog
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} 
// welcome msg
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
 echo $welcome . htmlspecialchars($_SESSION["username"]) . $logout;
}

// getlogged name
$bywho = htmlspecialchars($_SESSION["username"]);

?>

<h1>Lägg till Produkter</h1>


<form id="add" method="post" action="added.php">
        
        <p> 
  <label for="namn">Produkt namn:</label></p> 
       <p>  <input type="text" name="namnet" value="">
</p>
        <p> 
  <label for="karegori">Produkt kategori:</label></p> 
       <p>  <input type="text" name="chategory" value="">
</p>
        <p> 
  <label for="pris">Pris:</label></p> 
       <p>  <input type="text" name="pris" value="">
</p>

        <p> 
  <label for="bywho">Tillagd av:</label></p> 

  <input type="text" name="bywho" value="<?php echo $bywho;?>" readonly>
  </p>

   <p> <input type="submit" value="Lägg till">
</p>
</form>

<br><br>

<br>
<p>
<a href="loggedinhome.php"><-Bakåt</a>
</p>



