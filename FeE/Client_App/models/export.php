<?php

function downloadData()
{
    $url = "http://localhost/FeE/ImportExport_API/data?username=". $_SESSION['username'];

    $cURL_handler = curl_init();

    curl_setopt($cURL_handler, CURLOPT_URL, $url);
    curl_setopt($cURL_handler, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($cURL_handler);

    $file_name = "dataFor_". $_SESSION['username'] .".json";
    $mimeType = 'application/json';
    $fileSize = strlen ( $json);

    header("Content-Type: $mimeType");
    header("Content-Length: $fileSize");
    header("Content-Disposition: attachment; filename=$file_name");
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    echo $json;
    exit;
}