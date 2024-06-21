<?php
function submitForm($username, $formData) {
    $url = "http://localhost/FeE/Form_adder/submit_form.php"; // schimba aici cu xampu 
    $data = [
        'username' => $username,
        'form' => $formData
    ];

    $options = [
        'http' => [
            'header' => "Content-Type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($data),
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    return json_decode($result, true);
}
?>

