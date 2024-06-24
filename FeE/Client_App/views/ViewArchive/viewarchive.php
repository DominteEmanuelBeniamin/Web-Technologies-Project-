<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Product</title> 
<link rel="stylesheet" type="text/css" href="/FeE/Client_App/views/ViewProducts/stylesforviewproducts.css">
</head>
<body>
    

<div class="navbar">
  <div class="logo">
    <img src="/FeE/Client_App/views/logo.jpg" alt="Logo">
  </div> 
  <div class="nav-links">
    <a href="/FeE/Client_App/controllers/controller.php?page=home">Home</a>
    <a href="/FeE/Client_App/controllers/controller.php?page=viewproducts">View products</a>
    <a href="/FeE/Client_App/controllers/controller.php?page=addproduct">Add product</a>
    <a href="/FeE/Client_App/controllers/controller.php?page=viewarchive">View archive</a>
    <a href="/FeE/Client_App/controllers/controller.php?page=importexport">Import/Export</a>
    <a href="/FeE/Client_App/controllers/logout_controller.php">Log out</a>
  </div>
  </div>
</div>
<div class="mainRec">
  <ul>
    <?php foreach($data as $index => $info) { ?>
      <li>
        <?php echo $info['form_name'] ?>
        <a href="<?php echo "/FeE/Client_App/controllers/statistics_controller.php?id=".$info['id_form'] ?>">
          <button type="button" name="show_statistics">Show statistics</button>
        </a>
      </li>
    <?php } ?>
  </ul>
</div>

</body>
</html>
