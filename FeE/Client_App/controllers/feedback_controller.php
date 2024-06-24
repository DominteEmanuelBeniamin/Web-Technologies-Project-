<?php
/**
 * Foloseste functia din model si in functie de rezultatul returnat alege un view sau afiseaza un mesaj.
 */
if (isset($_COOKIE['PHPSESSID']))
{
    session_start(); // resume session
   $login = true;
}
else
    //echo "no session to resume.";
$login = false;

require_once "../models/addfeedback.php";

$confirm = addfeedback();

if($confirm == true)
    require_once "../views/ViewProducts/feedback_success.php";
else
    echo "Something went wrong!";