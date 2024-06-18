<?php
//session_start();

function login(){};

function choose_view($page_name){
    switch ($page_name) {
        case "login":
            require_once "../views/Login/login.html"; 
            break;
        
        case "viewproducts":
            require_once "../views/ViewProducts/viewproducts.html";
            break;

        case "addproduct":
            global $login;
            if($login == false)
            {
                header("Location: /FeE/Client_App/views/Login/login.html");
                exit;
            }
            else{
                require_once "../views/AddProduct/addproduct.html";
            }
            
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
    choose_view($_GET["page"]);
else
    echo "problem at choose view.";
