<?php

function account_created(){

   $url = "http://localhost/FeE/Users_Manager/users/user?username=". $_POST['username']."&password=". $_POST['password'];
    
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $ch_response = curl_exec($ch);

    curl_close($ch);

    $response = json_decode($ch_response,true);

    if(isset($response['Response']))
        return $response['Response'];
    else
        return "Error";
}