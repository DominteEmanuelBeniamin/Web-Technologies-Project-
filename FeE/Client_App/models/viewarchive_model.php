<?php

function getArchive() {
    $url = "http://localhost/FeE/Feedback_Manager/archive?username=".$_SESSION['username'];

    $cURL_handler = curl_init();

    curl_setopt($cURL_handler, CURLOPT_URL, $url);
    curl_setopt($cURL_handler, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($cURL_handler);

    $data = json_decode($response,true);

    return $data;
}