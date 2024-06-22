<?php

function getforms() {
    $url = "http://localhost/FeE/Feedback_Manager/forms/";

    $cURL_handler = curl_init();

    curl_setopt($cURL_handler, CURLOPT_URL, $url);
    curl_setopt($cURL_handler, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($cURL_handler);

    $data = json_decode($response,true);

    return $data;
}