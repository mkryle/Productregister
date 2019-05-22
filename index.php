<!DOCTYPE HTML>
<html lang="sv">
<head>
	<title>BRA Produkter</title>
    <meta charset="utf-8" />
</head>

<body>
<?php 
 require 'connection.php'; 
 $wlcom  = new hey();
 $msg = "";
 echo $wlcom->welcome($msg);
 ?>
<p>
<h2>Connect to database</h2></p>
<p>
<form id="dbform" method="post" action="createtables.php">
      
    <input type="submit" value="Connect"></p>
</p>
</form>

</body>
</html>