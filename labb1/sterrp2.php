<?php





 // set vcariables

$filmChoice = $_POST['film'];
/// $totalBiljett = $_POST['biljett'];
// $namn = $_POST['namn'];
// $age = $_POST['age'];
$molsman = $_POST['daddy'];
// $mail = $_POST['mail'];
$pris = 100;

// check form
// biljetter

  if (isset($_POST['biljett']) && $_POST['biljett'] <> "") {
    
    $totalBiljett = $_POST['biljett'];
  } else { echo "Vänligen välj antal biljetter";
    };

// Name
  if (isset($_POST['namn']) && $_POST['namn'] <> "") {
    
    $namn = $_POST['namn'];
  } else { echo "Vänligen fyll i namn";
    };

    // age
 if (isset($_POST['age']) && $_POST['age'] <> ""){
    
    $age = $_POST['age'];
  }   else {echo "Vänligen fyll i ålder";
    };

    
    //mail
 if (isset($_POST['mail']) && $_POST['mail'] <> ""){
    
    $mail = $_POST['mail'];
  } else {echo "Vänligen fyll i email";
    };


// current form variables:  (fyi)

//    $filmChoice
//    $totalBiljett 
//    $namn
//    $age 
//    $molsman 
//    $mail 
//    $pris


//  7 11 15           

if ( $age < 7 && $molsman == 1 && $filmChoice <= 1) {

accept($namn, $totalBiljett, $filmChoice, $pris);

}
elseif( $age < 7 && $filmChoice <= 1 ){
  echo "Du måste ha målsman med för att se denna film";
} 

if ($age > 7 && $age < 11 && $molsman == 1 && $filmChoice == 2) {
echo "I 11";
accept($namn, $totalBiljett, $filmChoice, $pris);
}elseif ( $age > 7 && $age < 11  && $filmChoice == 2) {
 echo "Du måste ha målsman med för att se denna film";
}


if($age >= 15) {
accept($namn, $totalBiljett, $filmChoice, $pris);
}
elseif ($age > 11 && $age < 15 && $molsman == 1 && $filmChoice == 3) {

 accept($namn, $totalBiljett, $filmChoice, $pris);

} elseif ( $age > 11 && $age < 15  && $filmChoice ==3  ){
 echo "Du måste ha målsman med för att se denna film";
}


function accept($namn, $totalBiljett, $filmChoice, $pris) {

 if ($filmChoice == 1) {
            $filmChoice = "Shrek";}
          if ($filmChoice == 2) {
            $filmChoice = "Rush Hour";}
          if ($filmChoice == 3) {
            $filmChoice = "Panic Room";}


  echo "<p><h1>hej " . $namn . " !</h1></p>";

  echo "<p>Din bokning är klar</p>";

  echo "<p>Du har köpt: <strong>" . $totalBiljett . "</strong> st biljetter till: <strong>" . $filmChoice . "</strong>, vi skickar biljetterna till din e-mail.</p>";

  echo "<p>totalkostnad: <strong>" . $pris * $totalBiljett . "</strong></p>";
}

?>
