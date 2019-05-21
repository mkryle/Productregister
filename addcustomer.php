<?php require 'connection.php'; ?>

<h1>Lägg till Kund</h1>


<form id="add" method="post" action="addedcustomer.php">
        
        <p> 
  <label for="namn">Namn:</label>
        <input type="text" name="name" value="">
</p>
        <p> 
  <label for="namn">Mail:</label>
        <input type="email" name="mail" value="">
</p>
        <p> 
  <label for="namn">Password:</label>
        <input type="password" name="pass" value="">
</p>

    
   <p> <input type="submit" value="Lägg till">
</p>
</form>


<p>
<a href="home.php"><-Bakåt</a>
</p>





</body>
</html>