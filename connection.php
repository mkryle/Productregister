<?php

// one var to set the Database :::::
$setMyDB = "minDatabas";


// 1st edition mysqli
$adress = "localhost";
$logname = "root";
$pass = "";
$db = $setMyDB;
// connect sql
$conn = new mysqli($adress, $logname, $pass, $db);


// 2nd edition mysqli_connect
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', $setMyDB);
 // connect sql
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 


// allover usable vars
$tabSpace = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

$welcome = 'Du är inloggad som <font color="red" size="4"><b>';
$logout = '</b></font>' . $tabSpace . '<a href="mysettings.php" class="btn btn-danger">Inställningar</a>' . $tabSpace . '<a href="logout.php" class="btn btn-danger">Logga ut !</a>';


// test private


class hey
{
    private $msg;
    public function welcome($msg)
    {   
         $this->msg="<h1>Välkommen till bra producter</h1>";
        return $this->msg;
    }

}

class loggedIn extends hey
{
    private $loggedIN;

    public function welcomeUser($msg, $loggedIN)
    {
        $this->loggedIN =" ". htmlspecialchars($_SESSION["username"])  . " !";
        return $this->loggedIN;
    }

}

?>