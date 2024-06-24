<?php
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


/*
<?php
session_start();

if (isset($_POST['submitForm'])) {
    require_once "../models/addform.php";

    $formTitle = $_POST['formTitle'];
    $formDescription = $_POST['formDescription'];
    $questions = $_POST['question'];
    $options = $_POST['option'];

   
    $questions_data = array();
    $currentQuestion = -1;
    $options_data = array();
    foreach ($questions as $index => $question) {
        $currentQuestion++;
        while ($currentQuestion < count($questions) && !empty($options[$currentQuestion])) {
            $options_data[] = $options[$currentQuestion];
            $currentQuestion++;
        }
        
        $questions_data['question_' . ($currentQuestion + 1)] = [
            'text' => $question,
            'options' => $options_data
        ];

    } 
    
    $formData = [
        'name' => $formTitle,
        'description' => $formDescription,
        'questions' => $questions_data
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
*/
