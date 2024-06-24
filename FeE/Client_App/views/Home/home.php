<?php
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewpor6t" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/FeE/Client_App/views/Home/stylesFor_Home.css">
</head>
<body>
  

<div class="navbar">
  <div class="logo">
    <img src="/FeE/Client_App/views/logo.jpg" alt="Logo">
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
    <h1><?php echo "Hello ". $_SESSION['username'] ?></h1>
</div>


</body>
</html>
