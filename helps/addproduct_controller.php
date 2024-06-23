<?php
session_start();

if (isset($_POST['submitForm'])) {
    require_once "../models/addform.php";

    $formTitle = $_POST['formTitle'];
    $formDescription = $_POST['formDescription'];
    $questions = $_POST['question'];
    $options = $_POST['option'];

    $formData = [
        'name' => $formTitle,
        'description' => $formDescription,
        'questions' => []
    ];

    $currentQuestion = -1;
    foreach ($questions as $index => $question) {
        $currentQuestion++;
        $formData['questions']['question_' . ($currentQuestion + 1)] = [
            'text' => $question,
            'options' => []
        ];

        while ($currentQuestion < count($questions) && !empty($options[$currentQuestion])) {
            $formData['questions']['question_' . ($currentQuestion + 1)]['options'][] = $options[$currentQuestion];
            $currentQuestion++;
        }
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
