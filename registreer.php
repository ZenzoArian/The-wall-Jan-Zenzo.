<html>

   <head>
      <title>Register page</title>

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:350px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;">
              <b>Registreer</b>
            </div>
            <div style = "margin:30px">

               <form action = "" method = "post">
                 <form method="post" action="test2.php">
                   <label for="email">email</label>
                   <input type="text" name="email" id="email" placeholder="12345@gmail.com" required> <br>
                   <label for="gebruikersnaam">gebruikersnaam</label>
                   <input type="text" name="gebruikersnaam" id="gebruikersnaam" placeholder="gebruikersnaam" required> <br>
                   <label for="wachtwoord">wachtwoord</label>
                   <input type="password" name="wachtwoord" id="wachtwoord" placeholder="123456" required> <br>
                   <input type="submit" value="registreer">
                 </form>
               </form>
               <a href="index.php">Back to home</a>


               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
            </div>
         </div>
      </div>
   </body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$email  = $_POST['email'];
$gebruikersnaam   = $_POST['gebruikersnaam'];
$wachtwoord  = password_hash($_POST["wachtwoord"], PASSWORD_BCRYPT);

$dbhost = "localhost";
$dbname = "accounts_the_wall";
$username = "root";
$pass = "";

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
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


?>
