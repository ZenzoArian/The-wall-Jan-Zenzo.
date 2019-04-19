<html>
   <head>
      <title>AnotherBrick</title>
      <link rel="stylesheet" href="style/css.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" type="image/png" href="style/wallFavi.png">
   </head>
   <body>
     <div class="header">
       <a href="show.php" class="logo" onClick="document.getElementById('content').scrollIntoView();">AnotherBrick</a>
       <img class="logoImageMenu"src="style/wall.svg" alt="">
       <div class="header-right">
         <ul class="snip1189">
           <li><a href="show.php">Home</a></li>
           <li><a href="sendFile.php">Upload</a></li>
           <li><a href="login.html">Login</a></li>
           <li class="current"><a href="registreer.php">Register</a></li>
           <li><a href="Logoff.php">Logout</a></li>
         </ul>
       </div>
     </div>
     <div class="OtherSiteBlock">

      <h2>Register</h2>
      <br>
      <form action = "" method = "post">
        <form method="post" action="test2.php">
           <label for="email">Email</label>
           <input type="text" name="email" id="email" placeholder="12345@gmail.com" required maxlength="100"> <br><br>
           <label for="gebruikersnaam">Username</label>
           <input type="text" name="gebruikersnaam" id="gebruikersnaam" placeholder="Username" required maxlength="100"> <br><br>
           <label for="wachtwoord">Password</label>
           <input type="password" name="wachtwoord" id="wachtwoord" placeholder="123456" required maxlength="256"> <br><br>
           <input type="submit" value="Register">
         </form>
      </form>
      <h3>Already have an account?</h3>
      <a href="login.html">To Login</a>
    </div>
   </body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$email  = $_POST['email'];
$gebruikersnaam   = $_POST['gebruikersnaam'];
$wachtwoord  = password_hash($_POST["wachtwoord"], PASSWORD_BCRYPT);

require "config.php";


// Create connection
$conn = new mysqli($dbhost, $username, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO accounts (email, username, password)
VALUES ('$email','$gebruikersnaam','$wachtwoord')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header ('location: login.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


?>
