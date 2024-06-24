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
<link rel="stylesheet" type="text/css" href="/FeE/Client_App/views/Import_Export/stylesFor_IE.css">
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

    <a>
      <button  class="import_button" onclick="show('importForm')">Import</button> 
    </a>
    

    <a href="/FeE/Client_App/controllers/export_controller.php">
        <button  class="export_button">Export</button>
    </a>



    <div id="importForm" class="importForm" style="display: none;">
      <form action="/FeE/Client_App/controllers/import_controller.php" method="post" enctype="multipart/form-data" class="form animation">
        <div class="container">
          <label for="file">Filename to import:</label>
          <input type="file" name="file" id="file" required><br>

          <button type="button" onclick="close_('importForm')" class="cancelbutton">Cancel</button>
          <input type="submit" name="submit" value="Submit">
        </div>
      </form>
    </div>
              
     
    <script>
              function show(element) {
                document.getElementById(element).style.display = 'block';
              }
              function close_(element) {
                document.getElementById(element).style.display = "none";
              }
            </script>
</div>
</body>
</html>
