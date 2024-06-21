<?php
  global $status;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/FeE/Client_App/views/AddProduct/stylesforaddproduct.css">
<title>Add Feedback Form</title>
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

<div class="mainRec">
    <h1>Add a Feedback Form</h1>
</div>

<div class="formSection">

  <form action="/FeE/Client_App/controllers/addproduct_controller.php" method="POST">
    <div class="form-group">
      <label for="formTitle">Form Title</label>
      <input type="text" id="formTitle" name="formTitle" required>
    </div>
    <div class="form-group">
      <label for="formDescription">Form Description</label>
      <textarea id="formDescription" name="formDescription" rows="4" required></textarea>
    </div>

    <div class="question">
      <div class="question-header">
        <input type="text" id="question" name="question[]" placeholder="Enter your question here" required>
        <button type="button" class="delete-question" onclick="deleteQuestion(this)">Delete</button>
      </div>
    </div>

    <button type="button" class="add-question">Add Another Question</button>
    <!--<button type="button" class="add-multiple-choice-question">Add Multiple Choice Question</button>-->
    <div class="form-group">
      <input type="submit" name="submitForm" value="Submit Form">
    </div>
  </form>
</div>

<script>
function addOption(buttonOrContainer) {
  const optionsContainer = buttonOrContainer.closest ? buttonOrContainer.closest('.question').querySelector('.options-container') : buttonOrContainer;

  const newOption = document.createElement('div');
  newOption.className = 'option';
  newOption.innerHTML = '<input type="checkbox" disabled> <input type="text" name="option[]" placeholder="New Option">';
  optionsContainer.appendChild(newOption);
}

function deleteQuestion(button) {
  const questionDiv = button.closest('.question');
  questionDiv.remove();
}

document.querySelector('.add-question').addEventListener('click', function() {
  const newQuestion = document.querySelector('.question').cloneNode(true);
  newQuestion.querySelector('input[name="question[]"]').value = '';
  document.querySelector('.formSection form').insertBefore(newQuestion, document.querySelector('.add-question'));
});

document.querySelector('.add-multiple-choice-question').addEventListener('click', function() {
  const newQuestion = document.createElement('div');
  newQuestion.className = 'question';
  newQuestion.innerHTML = `
    <div class="question-header">
      <input type="text" name="question[]" placeholder="Enter your question here" required>
      <button type="button" class="delete-question" onclick="deleteQuestion(this)">Delete</button>
    </div>
    <div class="options-container"></div>
    <button type="button" class="add-option" onclick="addOption(this)">Add Option</button>
  `;
  document.querySelector('.formSection form').insertBefore(newQuestion, document.querySelector('.add-question'));
  addOption(newQuestion.querySelector('.add-option'));
  addOption(newQuestion.querySelector('.add-option'));
});
</script>

</body>
</html>
