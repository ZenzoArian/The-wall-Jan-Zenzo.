
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/css.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="style/wallFavi.png">
  <title>AnotherBrick</title>
</head>
<body>

  <div class="header">
    <a href="#default" class="logo" onClick="document.getElementById('content').scrollIntoView();">AnotherBrick</a>
    <img class="logoImageMenu"src="style/wall.svg" alt="">
    <div class="header-right">
      <ul class="snip1189">
        <li class="current"><a href="show.php">Home</a></li>
        <li><a href="sendFile.php">Upload</a></li>
        <li><a href="login.html">Login</a></li>
        <li><a href="registreer.php">Register</a></li>
        <li><a href="Logoff.php">Logout</a></li>
      </ul>
    </div>
  </div>

<div class="whiteBanner">

  <img class="bannerImg" src="style/city-Banner.jpg" alt="">

  <div class="welcomeTekst">

  <?php

  session_start();
  if (empty($_SESSION['naamUser'])) {
    echo "Make an account to upload YOUR images!";
  }
  else {
  $welcomeUser = $_SESSION['naamUser'];
  echo "Welcome ".$welcomeUser;
}

   ?>
   <br>
   <br>
 </div>

</div>





<script src="js.js"></script>
</body>
</html>






<?php


require "config.php";



$conn = new mysqli($dbhost, $username, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$TotalDiv = 0;
$imageText= 0;
$sql = "SELECT id, user, Title, image_text, image FROM images ORDER BY `id` DESC";
$result = $conn->query($sql);

if ($result-> num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $TotalDiv++;
    $imageText++;
    echo "<div  class='sideSpace' id='content'>";
    echo "<div  class='TotalImageContent' onclick='ShowDivText$TotalDiv()'>";
    echo "<h3 style='color: #2f3751; font-size: 2em;''>Title: ". $row["Title"]. "</h3>";
    echo '<img  src="uploads/'.$row["image"].'" alt="'.$row["image"].'" title="" style="min-height: 18em; max-height: 18em; max-width: 460px;">';
    echo "<div  class='ImageText' id='ImageText$imageText' style='visibility: hidden; font-size:1.5em; color:#2f3751;'>";
    echo "<br>ImageText: " . $row["image_text"]. "<div class='insideTekst'>" . "<br>Uploaded by: ". $row["user"].  "<br>FileName: " . $row["image"] . "<br> </div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo '<script>function ShowDivText' . $TotalDiv . '() {
      var x = this.document.getElementById("ImageText'. $imageText . '");
      if (x.style.visibility === "hidden") {
        x.style.visibility = "";
      } else {
        x.style.visibility = "hidden";
      }
    }</script>';
  }
}
?>
