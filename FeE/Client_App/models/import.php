<?php
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

            $url = "http://localhost/FeE/ImportExport_API/data?username=". $_SESSION['username'];
    
            $cURL_handler = curl_init();

            $options = array(
                CURLOPT_URL => $url,
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => $file_content_json,
                CURLOPT_RETURNTRANSFER => 1
            );

            curl_setopt_array($cURL_handler, $options);

            $result = curl_exec($cURL_handler);

            curl_close($cURL_handler);

            unlink($tmpFile);

            return json_decode($result);
        } else {
            return "No file selected.";
        }
    }
}