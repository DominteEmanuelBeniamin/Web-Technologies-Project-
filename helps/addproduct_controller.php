<?php
session_start();

if (isset($_POST['submitForm'])) {
    require_once "../models/addform.php";

    $formTitle = $_POST['formTitle'];
    $formDescription = $_POST['formDescription'];
    $questions = $_POST['question'];

    $formData = [
        'name' => $formTitle,
        'questions' => []
    ];

    foreach ($questions as $index => $question) {
        $formData['questions']['question_' . ($index + 1)] = $question;
    }

    $username = $_SESSION['username'];
    $result = submitForm($username, $formData);

    if ($result['status'] == 'YES') {
        header("Location: /FeE/Client_App/controllers/controller.php?page=addproduct&status=success");
    } else {
        echo "Error submitting form: " . $result['message'];
    }
}
?>

