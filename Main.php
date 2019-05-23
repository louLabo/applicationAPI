
<?php
$d = include "Experience.php";

//$data_Sent = $_GET["q"];
$data_Sent = 'Pa';

// Déclaration des Types d'articles à requeter
$Experience = new Experience();

if(isset($data_Sent)){
  $doc = $Experience->requesting($data_Sent);
  echo $Experience -> analyse($doc);
}
else {
  $doc = searchAll();
  echo analyse($doc);
}
?>
