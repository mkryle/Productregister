<?php
require 'connection.php';

// seet sucess test
$productTEST = 0;
$userTEST = 0;


//create produkt tabe
function productsTable($conn, $productTEST) {
$sqlProducts = "CREATE TABLE products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
namn VARCHAR(30) NOT NULL,
chategory VARCHAR(30) NOT NULL,
pris VARCHAR(50),
bywho VARCHAR(30) NOT NULL)";
if ($conn->query($sqlProducts) === TRUE) {
    $productTEST = 1;
    echo 'products tabell skapad!<font color="green"> <u>success!</u></font><br><br>';
} else {
    echo "Create table product failed: <br>" . $conn->error;
    if ($conn->error === "Table 'products' already exists") {
        $productTEST = 1;
        echo '<br><br>Table located, <font color="green"> <u>success!</u></font>';
    } else {
        echo '<br><br>Something went wrong, <font color="red"> <u>failed!</u></font>';
    }
}
return $productTEST;
}

// run crate table function
$productsTable = productsTable($conn, $productTEST);

//create users table
function usersTable($link, $userTEST) {
$sqlUsers = "CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);";
if ($link->query($sqlUsers) === TRUE) {
    $userTEST = 1;
    echo '<br>User tabell skapad! - <font color="green"> <u>success!</u></font>';
} else {
    echo '<br><br>Create user table failed: <br>' . $link->error;
     if ($link->error === "Table 'users' already exists") {
         $userTEST = 1;
        echo '<br><br>Table located, <font color="green"> <u>success!</u></font>';
    } else {
        echo '<br><br>Something went wrong, <font color="red"> <u>failed!</u></font>';
    }
}
return $userTEST;
}

// run create user table
$userTable = usersTable($link, $userTEST);







 

if ($productsTable === 1 && $userTable === 1) {
    echo "<br><br><br><br><h4>Tabeller skapade!</h4>";
    echo '<a href="register.php"><h3>Log In !</h3</a>';
}

//header("Location: home.php");
//die();