<?php

if (isset($_COOKIE['PHPSESSID']))
{
    session_start(); // resume session
   // echo "session is resumed.";
   $login = true;
}
else
    //echo "no session to resume.";
$login = false;

function choose_page($page_name){
    switch ($page_name) {
        case "login":
            require_once "../views/Login/login.php"; 
            break;
        
        case "viewproducts":
            require_once "../models/viewproducts_model.php";
            $data = getforms();
            require_once "../views/ViewProducts/viewproducts.php";
            break;

        case "viewarchive":
            require_once "../models/viewarchive_model.php";
            $data = getArchive();
            require_once "../views/ViewArchive/viewarchive.php";
            break;

        case "addproduct":
            global $login;
            if($login == false)
            {
                header("Location: /FeE/Client_App/views/Login/login.php");
                exit;
            }
            else
            {
                //require_once "../views/AddProduct/addproduct.php";
                if(isset($_GET['status']) and $_GET['status']==="success")
                {
                    //$status = $_GET['status'];
                    require_once "../views/AddProduct/addproduct_success.php";
                }
                else
                    require_once "../views/AddProduct/addproduct.php";
            }
            break;

        case "home":
            require_once "../views/Home/home.php";
            break;

        case "logout":
            require_once "../views/Logout/logout.php";
            break;

        default:
            echo "no page";
            break;
    }
}



if( isset($_GET["page"]) )
    choose_page($_GET["page"]);
else
    echo "problem at choose view.";
