<?php

function getSingleform($id_form)
{
    $url = "http://localhost/FeE/Feedback_Manager/forms/".$id_form;

    $cURL = curl_init();

    curl_setopt($cURL, CURLOPT_URL, $url);
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($cURL);

    $data = json_decode($response,true);

    return $data;
}