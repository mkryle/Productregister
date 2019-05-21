<!DOCTYPE HTML>
<html lang="sv">
<head>
	<title>BRA Produkter</title>
    <meta charset="utf-8" />
</head>

<body>
<p>
<h1>BRA Produkter</h2></p>
<p>
<form id="bioform" method="post" action="step2.php">
        <label for="film">Välj din film:</label>
        <select id="film" name="film">
            <option value="1">Shrek 7år</option>  
            <option value="2">Rush Hour 11år</option>
            <option value="3">Panic Room 15år</option>
        
        </select>
    
</p><p>   <label for="biljett">Antal biljetter: (pris: 100:-/st)</label>
        <select id="biljett" name="biljett">
            <option value="1">1</option>
            <option value="2">2</option>
             <option value="3">3</option>
              <option value="4">4</option>
               <option value="5">5</option>
                <option value="6">6</option>
 <option value="7">7</option>
             <option value="8">8</option>
             <option value="9">9</option>
             <option value="10">10</option>
        </select>
</p><p> 
  <label for="namn">Ditt namn:</label>
        <input type="text" name="namn" value="namn">
        
</p><p> 
          <label for="age">Din ålder:</label>
        <input type="number" name="age" min="0" max="110">
        </p><p> 
         <label for="daddy">Med målsman?:</label>
         <input type="radio" name="daddy" value="0" checked>Nej
  <input type="radio" name="daddy" value="1"> Ja
</p><p> 
        
  <label for="mail">Din e-mail:</label>
        <input type="email" name="mail" value="mail">
</p><p> 
    
    <input type="submit" value="Beställ"></p>
</p>
</form>





</body>
</html>