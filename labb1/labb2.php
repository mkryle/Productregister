<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//          ------ CONNECTION ---------
// variables
$adress = "localhost";
$logname = "root";
$pass = "";
$db = "myDB";
// connect sql
$conn = new mysqli($adress, $logname, $pass, $db);

// try connection
if ($conn->connect_error) {
    die("error error NO CONNECTION" . $conn->connect_error);

 echo "Connected to DB";

}
//          ------ CREATE TABLE "products" ---------


// create table "products"

function productsTable($conn) {

$sqlProducts = "CREATE TABLE products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
namn VARCHAR(30) NOT NULL,
chategory VARCHAR(30) NOT NULL,
pris VARCHAR(50))";

if ($conn->query($sqlProducts) === TRUE) {
    echo "products tabell skapad!";
} else {
    echo "error error Create taable failed: " . $conn->error;
}


}
//          ------ CREATE TABLE "kunder" ---------

// create table "kunder"


function kunderTable($conn) {

$sqlKunder = "CREATE TABLE kunder (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
namn VARCHAR(30) NOT NULL,
mail VARCHAR(30) NOT NULL,
pass VARCHAR(50) ,
joined TIMESTAMP )";

if ($conn->query($sqlKunder) === TRUE) {
    echo "kunder tabell skapad!";
} else {
    echo "error errorCreate taable failed " . $conn->error;
}
}

//   ---------------------------  add products -----------
// make rows in products
// $stmt = $conn->prepare("INSERT INTO products (namnet, chategory, pris, id) VALUES ($namnet, $chategory, $pris, $id)");
//$stmt = $conn->prepare("INSERT INTO products (namnet, chategory, pris, id) VALUES (?, ?, ?, ?)");
// $stmt->bind_param("ssii", $namnet, $chategory, $pris, $id);
// $stmt->execute();

function addproduct($conn){
$namnet = "Bike222";
$chategory = "Do222e";
$pris = 903;
$uniqid = uniqid();

    $query = "INSERT INTO products
			(namn, chategory, pris)
            VALUES('$namnet','$chategory','$pris')";
    echo $query;

     if ($conn->query($query) === TRUE) {
    echo "product tillagd";
} else {
    echo "error error NOT ADDED: " . $conn->error;
}
   // $result = mysqli_query($conn,$query) or die("Query failed: $query");
  //  $insId = mysqli_insert_id($conn);

  //  return $insId;
}

addProduct($conn);


//   ---------------------------  add products - function style -----------

// create stuff function
// dummy form to be sent into funct:
//    $namn = $_POST['namn'];
//    $chategory = $_POST['chategory'];
//    $pris = $_POST['pris'];
/*
function addProduct( $namnet, $chategory, $pris ) {
    $stmt = $conn->prepare("INSERT INTO products (namn, chategory, pris, id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $namn, $chategory, $pris, $id);
    $namnet = $namnet;
    $chategory = $chategory;
    $pris = $pris;
    $id = uniqid();
    $stmt->execute();
     echo "Product added!!";
}


//   ---------------------------  add kunder -----------

// make rows in kunder

$stmt = $conn->prepare("INSERT INTO kunder (namn, mail, pass, id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssii", $namn, $mail, $pass);

// create stuff  ( the plaintext )
$namn = "Marcus";
$mail = "fan@vet.ja";
$pass = "1234";
$id = uniqid();
$stmt->execute();

echo "Kund added!!";

*/
//   ---------------------------  add kunder - function style -----------

// create stuff function
// dummy form to be sent into funct:
//    $namn = $_POST['namn'];
//    $mail = $_POST['mail'];
//    $pass = $_POST['pass'];

function addCustomer( $namn, $mail, $pass ) {
    $stmt = $conn->prepare("INSERT INTO products (namn, chategory, pris, id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $namn, $mail, $pass, $id);
    $namn = "Marcus";
    $mail = "fan@vet.ja";
    $pass = "1234";
    $id = uniqid();
    $stmt->execute();
     echo "Kund added!!";
}


//-------------------------- add functions ------------------


//  addProduct( $namn, $chategory, $pris)

//   addCustomer( $namn, $mail, $pass )


 echo "Grattis din skit funkar!!";


// $stmt->close();
$conn->close();

?>