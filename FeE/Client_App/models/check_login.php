<?php

function isValid(){
    $ch = curl_init();
    
    $url = "http://localhost/FeE/Users_Manager/users/user?username=". $_POST['username'];

    curl_setopt($ch,CURLOPT_URL, $url); //set the url 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // the response cand be stored in a variable

    $ch_response = curl_exec($ch);

    $response = json_decode($ch_response,true);

    if(isset($response['Response']))
        return $response['Response'];
    else
        return "Error";
}
