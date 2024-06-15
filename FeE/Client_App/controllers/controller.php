<?php
class Controller
{
    public function choose_view($page_name)
    {
        switch ($page_name) {
            case "login":
                require_once "../views/Login/login.html"; 
                break;
            
            case "viewproducts":
                require_once "../views/ViewProducts/viewproducts.html";
                break;

            default:
                echo "no page";
                break;
        }
    }

}

$controller = new Controller;

if( isset($_GET["page"]) )
    $controller->choose_view($_GET["page"]);
else
    echo "problem at choose view.";



/*
if( isset($_GET["page"]))
{
    if( $_GET["page"] == "login") {
        require_once "../views/Login/login.html"; 
    }
    else
        require_once "../views/ViewProducts/viewproducts.html";
}
else
    echo "no params";

*/
