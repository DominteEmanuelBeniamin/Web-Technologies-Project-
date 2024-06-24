<?php 
global $login;
$emotions = [
    "joy" => "A feeling of great pleasure and happiness.",
    "trust" => "Firm belief in the reliability, truth, ability, or strength of someone or something.",
    "fear" => "An unpleasant emotion caused by the threat of danger, pain, or harm.",
    "surprise" => "A feeling of mild astonishment or shock caused by something unexpected.",
    "sadness" => "A feeling of sorrow or unhappiness.",
    "disgust" => "A feeling of revulsion or strong disapproval aroused by something unpleasant or offensive.",
    "anger" => "A strong feeling of annoyance, displeasure, or hostility.",
    "anticipation" => "Expectation or prediction."
];
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
        <form action="<?php echo "/FeE/Client_App/controllers/feedback_controller.php?id=".$id_form ?>" method="post">
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
            <label for="gender">Gender</label>
            <select name="gender" id="gender-select" required>
                <option value="">--Gender--</option>
                <option value="female">female</option>
                <option value="male">male</option>
            </select>
            <br><br>
            <h3>Share your feedback</h3>
            <?php foreach($data['questions'] as $index => $question) { ?>
                <div class="question-block">
                    <label for="question-<?php echo $index; ?>">
                        <?php echo $question['text']; ?>
                    </label>
                    <?php if($question['type'] == 'write') { ?>
                        <textarea name="responses[<?php echo $index; ?>]" id="question-<?php echo $index; ?>" rows="4" required></textarea>
                    <?php } elseif($question['type'] == 'multiple') { ?>
                        <div>
                            <?php foreach($question['options'] as $option) { ?>
                                <label>
                                    <input type="checkbox" name="responses[<?php echo $index; ?>][]" value="<?php echo $option; ?>"> 
                                    <?php echo $option; ?>
                                </label><br>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <br><br>
                </div>
            <?php } ?>

            <!-- Predefined emotion question -->
            <div class="question-block">
                <label for="emotion">What emotion does this make you feel?</label>
                <select name="emotion" id="emotion-select" required>
                    <option value="">--Choose emotion--</option>
                    <?php foreach($emotions as $emotion => $definition) { ?>
                        <option value="<?php echo $emotion; ?>" class="tooltip"><?php echo $emotion; ?>
                            <span class="tooltiptext"><?php echo $definition; ?></span>
                        </option>
                    <?php } ?>
                </select>
                <br><br>
            </div>

            <input type="submit" name="submitFeedback" value="Submit Feedback">
        </form> 
    </div>
</div>
</body>
</html>
