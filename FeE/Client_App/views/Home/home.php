<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewpor6t" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="stylesFor_Home.css">
</head>
<body>
  

<div class="navbar">
  <div class="logo">
    <img src="../logo.jpg" alt="Logo">
  </div>
  <div class="nav-links">
    <a href="">Home</a>
    <a href="/FeE/Client_App/controllers/controller.php?page=viewproducts">View products</a>
    <a href="/FeE/Client_App/controllers/controller.php?page=addproduct">Add product</a>
    <a href="/FeE/Client_App/controllers/controller.php?page=viewarchive">View archive</a>
    <a href="/FeE/Client_App/controllers/controller.php?page=importexport">Import/Export</a>
    <a href="/FeE/Client_App/controllers/logout_controller.php">Log out</a>
  </div>
</div>

<div class="mainRec">
    <!--<h1>You have feedback</h1>-->
    <h1><?php echo "Hello ". $_SESSION['username'] ?></h1>
 <!-- <h2>We have a place where feedback is wanted</h2>
  <p>PS : For describing your most intense emotions, Plutchik's Wheel of Emotion is utilized.</p>
</div>


</body>
</html>
