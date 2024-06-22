<?php 
global $login;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Product</title> 
<link rel="stylesheet" type="text/css" href="/FeE/Client_App/views/ViewProducts/stylesforviewSingleproduct.css">
</head>
<body>
  

<div class="navbar">
<div class="logo">
  <img src="/FeE/Client_App/views/logo.jpg" alt="Logo">
</div> 
<div class="nav-links">
  <?php if(isset($login) and $login == false) {?>
  <a href="/FeE/Client_App/project.php">Home</a>
  <?php } ?>
  <?php if(isset($login) and $login == true) {?>
  <a href="/FeE/Client_App/controllers/controller.php?page=home">Home</a>
  <?php } ?>
  <a href="/FeE/Client_App/controllers/controller.php?page=viewproducts">View products</a>
  <a href="/FeE/Client_App/controllers/controller.php?page=addproduct">Add product</a>
  <?php if(isset($login) and $login == true) {?>
  <a href="/FeE/Client_App/controllers/controller.php?page=viewarchive">View archive</a>
  <a href="/FeE/Client_App/controllers/controller.php?page=importexport">Import/Export</a>
  <a href="/FeE/Client_App/controllers/logout_controller.php">Log out</a>
  <?php } ?>
  <?php if(isset($login) and $login == false) {?>
    <a href="/FeE/Client_App/controllers/controller.php?page=login">Login</a>
  <?php } ?>
</div>
</div>
<div class="mainRec">
<p>Thank you for the feedback!</p>
<a href="/FeE/Client_App/controllers/controller.php?page=viewproducts"><button>Give a new feedback</button></a>
</div>

</body>
</html>
