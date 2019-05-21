<?php require 'connection.php'; 



 // get vcariables



//namn
  if (isset($_POST['name']) && $_POST['name'] <> "") {
   $name = $_POST['name'];
  } else { echo "Vänligen ange namn";
      die();
    };

// mail
  if (isset($_POST['mail']) && $_POST['mail'] <> "") {
   $mail = $_POST['mail'];
  } else { echo "Vänligen ange email";
      die();
    };

// pass
  if (isset($_POST['pass']) && $_POST['pass'] <> "") {
 $pass = $_POST['pass'];
  } else { echo "Vänligen ange lösenord";
      die();
    };


// LÄGG TILL KUND
   $query = "INSERT INTO kunder
			(namn, mail, pass)
            VALUES('$name','$mail','$pass')";
   

     if ($conn->query($query) === TRUE) {
    echo  $name . "<br> " . $mail . "<br>har lagts till";
} else {
    echo "NOT ADDED: " . $conn->error;
}



?>

<p>
<a href="home.php">hem</a>
</p>
