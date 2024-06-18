<?php

require_once "../models/check_login.php";
$user_exists = isValid();
if($user_exists)
{
    session_start();
    setcookie("New_session",session_id(),time()+3600,"/");
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $_POST['username'];

    header("Location: /FeE/Client_App/views/Home/home.php");
    exit;
}
else 
    require_once "../views/Login/login.html";