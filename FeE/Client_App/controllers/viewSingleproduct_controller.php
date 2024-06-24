<?php
/**
 * Se apeleaza un model iar informatia primita din functie se trimite catre view.
 */
if (isset($_COOKIE['PHPSESSID']))
{
    session_start(); // resume session
   $login = true;
}
else
    //echo "no session to resume.";
$login = false;

require_once "../models/viewSingleproduct_model.php";

$id_form = $_GET['id'];

$data = getSingleform($id_form);

require_once "../views/ViewProducts/viewSingleproduct.php";