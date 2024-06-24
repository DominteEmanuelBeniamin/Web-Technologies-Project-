<?php
/**
 * Creeaza array-ul ce va fi transformat in JSON, cu informatiile despre un nou form a fi adaugat la BD
 */
session_start();

if (isset($_POST['submitForm'])) {
    
    require_once "../models/addform.php";

    $formTitle = $_POST['formTitle'];
    $formDescription = $_POST['formDescription'];
    $questions = $_POST['question'];
    $options = $_POST['option'] ?? [];
    
    // Initialize formData
    $formData = [
        'name' => $formTitle,
        'description' => $formDescription,
        'questions' => []
    ];

    foreach ($questions as $index => $question) {
        $questionData = [
            'text' => $question,
            'type' => 'write',
        ];

        // Check if there are options for this question
        if (isset($options[$index]) && !empty($options[$index])) {
            $questionData['type'] = 'multiple';
            $questionData['options'] = array_filter($options[$index]); // Remove empty options
        }

        $formData['questions']['question_' . ($index + 1)] = $questionData;
    }

    $username = $_SESSION['username'];
    $result = submitForm($username, $formData);

    if ($result['status'] == 'YES') {
        header("Location: /FeE/Client_App/controllers/controller.php?page=addproduct&status=success");
    } else {
        echo "Error submitting form: " . $result['message'];
    }
}
