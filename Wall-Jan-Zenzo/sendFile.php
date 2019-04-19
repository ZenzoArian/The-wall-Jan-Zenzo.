<?php session_start();if ($_SESSION['naamUser'] == "") {  header('Location: registreer.php');} ?>

<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Zenzo Arian">
    <link rel="stylesheet" href="style/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="style/wallFavi.png">
    <title>AnotherBrick</title>
  </head>
  <body>
    <div class="header">
      <a href="show.php" class="logo" onClick="document.getElementById('content').scrollIntoView();">AnotherBrick</a>
      <img class="logoImageMenu"src="style/wall.svg" alt="">
      <div class="header-right">
        <ul class="snip1189">
          <li><a href="show.php">Home</a></li>
          <li class="current"><a href="sendFile.php">Upload</a></li>
          <li><a href="login.html">Login</a></li>
          <li><a href="registreer.php">Register</a></li>
          <li><a href="Logoff.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div class="OtherSiteBlock" style="width: auto;">
      <h2>Upload</h2>
      <br>
    <form method="post" action="upload.php" enctype="multipart/form-data">
      <input type="file" name="image" />
      <br><br>
      <label for="image_title">Upload title</label>
      <input type="text" name="image_title" id="image_title" maxlength="20">
      <br><br>
      <label for="image_text">Upload text</label>
      <input type="text" name="image_text" id="image_text" style="height: 4em;" maxlength="60">
      <br>
      <br>
      <input type="submit" name="submit" value="Submit">
      <!-- <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>"> -->
    </form>
    <a href="show.php">show</a>
  </div>

  </body>
</html>
