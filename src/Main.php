
<?php

include "Experience.php";

// Déclaration des Types d'articles à requeter
$Experience = new Experience();

if(isset($_GET["recherche"])){
  //Regarde si un parametre recherche a été donné.
  $data_Sent =  $_GET["recherche"];
  $doc = $Experience->requesting($data_Sent);
  echo $Experience -> analyse($doc);
}
else {
  $doc = $Experience->requesting('Suc');
  //$doc = $Experience->requestingWithoutData();
  echo $Experience -> analyse($doc);
}
?>
