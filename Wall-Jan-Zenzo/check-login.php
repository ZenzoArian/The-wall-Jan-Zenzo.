<?php
//Sessie starten
session_start();

//Controleren of er een gebruiker_id in de sessie staat
// Als dat niet zo is, de gebruiker doorsturen naar het inlog formulier.
if(empty($_SESSION['naamUser'])){
   header('Location: index.html');
   echo "ja";
   exit();
}
else {
  // code...
  echo "na";
}
 ?>
