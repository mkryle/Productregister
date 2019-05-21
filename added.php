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



 // get vcariables



//namn
  if (isset($_POST['namnet']) && $_POST['namnet'] <> "") {
   $namnet = $_POST['namnet'];
  } else { echo "Vänligen ange namn";
      die();
    };

// kategori
  if (isset($_POST['chategory']) && $_POST['chategory'] <> "") {
   $chategory = $_POST['chategory'];
  } else { echo "Vänligen ange kategori";
      die();
    };

// pris
  if (isset($_POST['pris']) && $_POST['pris'] <> "") {
 $pris = $_POST['pris'];
  } else { echo "Vänligen ange pris";
      die();
    };

  // by who
$bywho = $_POST['bywho'];


// LÄGG TILL PRODUKT
   $query = "INSERT INTO products
			(namn, chategory, pris, bywho)
            VALUES('$namnet','$chategory','$pris','$bywho')";
   

     if ($conn->query($query) === TRUE) {
    echo "<br><br><br>product: " . $namnet . "<br>karegori: " . $chategory .  "<br>pris: " . $pris . "<br>har lagts till av: " . $bywho;
} else {
    echo "NOT ADDED: " . $conn->error;
}



?>
<br><br>
<p>
<a href="add.php">Lägg till fler produkter</a>
</p>
<br><br>
<p>
<a href="loggedinhome.php">hem</a>
</p>
