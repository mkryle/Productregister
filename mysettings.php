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


$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Ange lösenord";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "lösenordet måste vara minst 6 tecken";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Ange lösenord igen";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Du måste ange samma lösenord";
        }
    }

    if(empty($new_password_err) && empty($confirm_password_err)){
      

        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            
            if(mysqli_stmt_execute($stmt)){
             
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "DB error";
            }
        }
        
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
}




echo '<h1>Hej ' . htmlspecialchars($_SESSION["username"]) . '</h1><br><br>';


$productsOF = htmlspecialchars($_SESSION["username"]);
 $sql = "SELECT * FROM users WHERE username = '$productsOF'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Du gick med: " . $row["created_at"];
    }
} 
$conn->close();





?>
 


<br><br><br><br>
 <h3>Ändra lösenord</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <p><label>Nytt lösenord: </label></p>
                <p><input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>"></p>
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <p><label>upprepa lösenord: </label></p>
                <p><input type="password" name="confirm_password" class="form-control"></p>
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <p><input type="submit" class="btn btn-primary" value="Ändra lösenord"></p>
            </div>
        </form>
<p>


<br><br>
<p>
<a href="loggedinhome.php"><-Bakåt</a>
</p>

<br><br><br>
<?php






?>