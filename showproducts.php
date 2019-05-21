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


// get produkter
$sql = "SELECT * FROM products WHERE bywho = '$bywho'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   echo "<br><br><br><table><tr><td><h3>Product</h3></td><td><h3>kategori</h3></td><td><h3>Pris</h3></td><td>&nbsp;</td><td>&nbsp;</td></tr>";
    while($row = $result->fetch_assoc()) {
        $prodID = $row["id"];
        $prodName = $row["namn"];
        $priceSET =  'pprice'. $prodID;
        echo "<tr><td>" . $row["namn"]. "</td><td>" . $row["chategory"]. "</td><td> " . $row["pris"]. '</td><td><form action="showproducts.php" method="post"><input type"number" name"'. $priceSET . '" value="' . $row["pris"] . '"><input type="submit" name="prodCHANGE" value="Ändra pris"></form></td><td><form action="showproducts.php" method="post"><input type="submit" name="prodDEL" value="Ta bort"></form></td></tr>';

    }
} else {
    echo "0 results";
}
echo "</table>";


// ta bort produkt
 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['prodDEL']))
    {
        productDelete($prodID, $conn, $prodName);
    }

function productDelete($prodID, $conn, $prodName) {
          
   $pdel = "DELETE FROM `products` WHERE `products`.`id` = $prodID";
    if ($conn->query($pdel) === TRUE) {
    echo  "<br>" . $prodName . " togs bort !";
    } else {
    echo "error: " . $conn->error;
    }  
}



// ändra pris
 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['prodCHANGE']))
    {
        productPrice($prodID, $conn, $priceSET);
    }

function productPrice($prodID, $conn, $priceSET) {
    $pprice = "UPDATE `products` SET `pris`= $priceSET WHERE $prodID";
    if ($conn->query($pprice) === TRUE) {
    echo  "<br>" . $prodName . " Pris ändrat!";
    } else {
    echo "error: " . $conn->error;
    }  
}





$conn->close();
?>



<p>
<a href="loggedinhome.php"><-Bakåt</a>
</p>

