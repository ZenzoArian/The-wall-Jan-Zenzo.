<?php
require "config.php";

$conn = new mysqli($dbhost, $username, $pass, $dbname);

$sql = "SELECT * FROM accounts";

$result = $conn->query($sql);

$username   = $_POST['username'];
$pass  = $_POST["password"];

foreach ($result as $rij) {
  if($username === $rij['username']) {
    if(password_verify($pass , $rij['password'])){
      session_start();
      $_SESSION['naamUser'] = $username;
      header ('location: show.php');
    }
  }
  else  {
    header ('location: show.php');
  }
}

 ?>
