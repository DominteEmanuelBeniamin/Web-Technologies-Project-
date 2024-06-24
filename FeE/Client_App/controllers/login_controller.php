<?php
/**
 * In functie de formularul completat (signIN sau signUP)
 *      apeleaza un model corespunzator.
 * 
 * Daca se efectueaza o logare se verifica credentialele introduse
 *      si daca totul este in regula se incepe o sesiune pentru user-ul respectiv.
 *      Se seteaza $_SESSION['logged_in'] si $_SESSION['username'].
 * 
 * Se alege view-ul corespunzator.
 */

if(isset($_POST['signin']))
{
    require_once "../models/check_login.php";
    $user_exists = isValid();
    if($user_exists === "true")
    {
        session_start();
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

