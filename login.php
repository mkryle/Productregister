<?php
// test sessions
session_start();
 
// om session finns, skicka vidare
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: loggedinhome.php");
    exit;
}
 
require 'connection.php'; 

// set variables
$username = $password = "";
$username_err = $password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // kolla namn
    if(empty(trim($_POST["username"]))){
        $username_err = '<font color="red"> Var god ange namn!</font>';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // kolla pass
    if(empty(trim($_POST["password"]))){
        $password_err = '<font color="red"> Var god ange lösenord!</font>';
    } else{
        $password = trim($_POST["password"]);
    }
    
  
    if(empty($username_err) && empty($password_err)){
        
        // kolla db eftre user
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                // hitta kund och rätt pass
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                           
                            // start session
                            session_start();
                            
                            // test session super globals
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // skicka vidare 
                            header("location: loggedinhome.php");
                        } else{
                           
                            $password_err = '<font color="red"> Fel lösenord</font>';
                        }
                    }
                } else{
                   
                    $username_err = '<font color="red"> Fel användare</font>';
                }
            } else{
                echo "DB error";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>

        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <p><label>Namn: </label></p>
                <p><input type="text" name="username" class="form-control" value="<?php echo $username; ?>"> <span class="help-block"><?php echo $username_err; ?></span></p>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <p><label>Lösenord: </label></p>
                <p><input type="password" name="password" class="form-control"> <span class="help-block"><?php echo $password_err; ?></span></p>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Logga in!">
            </div>
            <p>Har du inget konto? <a href="register.php">Registrera dig här!</a></p>
        </form>
   