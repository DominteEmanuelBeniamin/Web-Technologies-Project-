<?php

if(isset($_POST['signin']))
{
    require_once "../models/check_login.php";
    $user_exists = isValid();
    if($user_exists === "true")
    {
        session_start();
        //setcookie("New_session",session_id(),time()+3600,"/");
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $_POST['username'];

        header("Location: /FeE/Client_App/views/Home/home.php");
        exit;
    }
    else
    {
        $problem = 1; 
        require_once "../views/Login/login.php";
    }
}
else if(isset($_POST['register']))
{
    require_once "../models/create_account.php";
    $created = account_created();
    if($created === "true")
    {
        $confirm_acount_created = true;
        require_once "../views/Login/login.php";
    }
    else
    {
        $confirm_acount_created = false;
        require_once "../views/Login/login.php";
    }
}

