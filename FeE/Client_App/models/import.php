<?php
function addForm($username, $formData) {
    $url = "http://localhost/FeE/Form_adder/submit_form.php"; 
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

function processFile()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_FILES["file"]["tmp_name"])) {
            $file_name = $_FILES["file"]["name"];
            // Get the temporary file name
            $tmpFile = $_FILES["file"]["tmp_name"];
    
            $extention = pathinfo($file_name,PATHINFO_EXTENSION); 
      
            if ($extention != 'json') { 
                die("Error: Please select a valid file format. It must be '.json'!"); 
            }  
    
            $file_content_json = file_get_contents($tmpFile);
            
            $file_content_array = json_decode($file_content_json,true);

            foreach($file_content_array['forms'] as $key => $form)
            {
                $result = addForm($_SESSION['username'], $form);

                if ($result['status'] == 'YES') {
                    continue;
                } else {
                    return "Error submitting form: " . $result['message'];
                }
            }

            unlink($tmpFile);

            return "OK";
        } else {
            return "No file selected.";
        }
    }
}