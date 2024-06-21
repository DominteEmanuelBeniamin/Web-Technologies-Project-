<?php
session_start();

if (isset($_POST['submitForm'])) {
    require_once "../models/addform.php";

    $formTitle = $_POST['formTitle'];
    $formDescription = $_POST['formDescription'];
    $question_data_from_POST = $_POST['question'];

    $questions = array();

    foreach ($question_data_from_POST as $index => $question) {
        $questions['question_' . ($index + 1)] = $question;
    } 
    
    $formData = [
        'name' => $formTitle,
        'questions' => $questions
    ];

    $username = $_SESSION['username'];
    $result = submitForm($username, $formData);
    if(empty($result))
    {
        echo "Error, empty result from submitForm().";
        exit;
    }
    if ($result['status'] === 'YES') {
        header("Location: /FeE/Client_App/controllers/controller.php?page=addproduct&status=success");
    } else {
        echo "Error submitting form: " . $result['message'];
    }
}
?>

