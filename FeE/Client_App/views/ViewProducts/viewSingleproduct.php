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
    <div class="feedbackSection">
        <form action="<?php echo "/FeE/Client_App/controllers/feedback_controller.php?id=".$id_form ?>", method="post">
            <h2><?php echo $data['name']?></h2>    
            <h3>Please set info</h3>
                <label for="age">Age</label>
                    <select name="age" id="age-select" required>
                        <option value="">--Choose age--</option>
                        <option value="-18">-18</option>
                        <option value="18-30">18-30</option>
                        <option value="30-45">30-45</option>
                        <option value="45-65">45-65</option>
                        <option value="65+">65+</option>
                    </select>
                <label for="sex">Gender</label>
                    <select name="gender" id="gender-select" required>
                        <option value="">--Gender--</option>
                        <option value="female">female</option>
                        <option value="male">male</option>
                    </select>
                <br><br>
            <h3>Share your feedback</h3>
                <?php foreach($data['questions'] as $index => $question) { ?>
                    <label for="question">
                        <?php echo $question ?>
                    </label>
                    <select name="emotion[]" id="emotion-select"required>
                        <option value="">--Choose--</option>
                        <option value="happy">happy</option>
                        <option value="sad">sad</option>
                    </select>
                    <br><br>
                <?php } ?>

            <input type="submit" name="submitFeedback"value="Submit Feedback">

        </form> 
    </div>
</div>

</body>
</html>
