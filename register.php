<?php require 'connection.php'; 

// set empty vars
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Var god ange användarnamn";
    } else{

        // find user
        $sql = "SELECT id FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                
                //spara user från db
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Användaren finns redan";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "DB error";
            }
        }
        mysqli_stmt_close($stmt);
    }
    
    // kolla pass
    if(empty(trim($_POST["password"]))){
        $password_err = "vänligen agnge lösenord";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Ditt lösenord måsta ha minst 6 tecken";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // kolla pass från DB
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Ange lösenord igen";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "DU måste skriva samma lösenord";
        }
    }
    
    // kolla så allt är ifyllt
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // create users in db table
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){

            // test 1 med params igen
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // ser4t namn och hashed pass
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
       
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "DB error";
            }
        }
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
}
?>
 

        <h2>Resistrera dig</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <p><label>Namn: </label></p>
               <p><input type="text" name="username" class="form-control" value="<?php echo $username; ?>"></p>
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <p><label>Lösenord: </label></p>
                <p><input type="password" name="password" class="form-control" value="<?php echo $password; ?>"></p>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
               <p> <label>upprepa lösenord: </label></p>
                <p><input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>"></p>
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Registrera">
            </div><br><br>
            <p>Redan kund? <a href="login.php">Logga in här</a>.</p>
        </form>
    </div>    










