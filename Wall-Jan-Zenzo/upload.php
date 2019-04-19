


<?php


if(isset($_FILES['image'])){
  $errors = array();
  $file_name = $_FILES['image']['name'];
  $file_size = $_FILES['image']['size'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_type = $_FILES['image']['type'];

  //de explode string-functie breekt een string in een array
  // hierbij breek je de string na de . (punt) waardoor je de bestands type hebt
  $filename_deel = explode('.',$_FILES['image']['name']);
  // end laat de laatste waarde van de array zoen
  $bestandstype = end($filename_deel);
  // voor het geval er JPG ipv jpg is geschreven
  $file_ext = strtolower($bestandstype);

  $bestandstypen = array("jpeg","jpg","png");

  if(in_array($file_ext,$bestandstypen)=== false){
  $errors[] = "Dit bestandstype kan niet, kies een JPEG of een PNG bestand.";
  header ('location: show.php');
  }

  if($file_size > 2097152){
    $errors[] ='Het bestand moet kleiner zijn dan 2 MB';
  }

  if(empty($errors)==true){
     // move_upload_file stuurt je bestand naar een andere lokatie
     move_uploaded_file($file_tmp,"uploads/".$file_name);
     echo "Gelukt";
  } else{
     print_r($errors);
  }
}

 ?>

 <?php
if(empty($errors)==true){
 require "config.php";

 session_start();

  $user = $_SESSION['naamUser'];
  $image_title  = $_POST['image_title'];
  $image_text  = $_POST['image_text'];
  $image     = $file_name;

  // Create connection
  $conn = new mysqli($dbhost, $username, $pass, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO images (user, Title, image_text, image)
  VALUES ('$user', '$image_title', '$image_text','$image')";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
      header ('location: show.php');

  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
  ?>
