<?php
require_once "../models/viewSingleproduct_model.php";
function addfeedback()
{
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $responses = $_POST['responses'];
    $emotion = $_POST['emotion'];

    $id_form = $_GET['id'];
    $form = getSingleform($id_form);

    $responses_data = array();

    foreach ($form['questions'] as $key => $question)
    {
        $responses_data[$question['text']] = $responses[$key];
    }

    $feedbackData = [
        'age' => $age,
        'sex' => $gender,
        'responses' => $responses_data,
        'emotion' => $emotion
    ];

    $data = [
        'id_form' => $id_form,
        'feedback' => $feedbackData
    ];

    
    // send to the service
    $url = "http://localhost/FeE/Feedback_Manager/feedbacks";
    
    $cURL_handler = curl_init();

    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_RETURNTRANSFER => 1
    );

    curl_setopt_array($cURL_handler, $options);

    $result = curl_exec($cURL_handler);

    curl_close($cURL_handler);

    return $result;

}