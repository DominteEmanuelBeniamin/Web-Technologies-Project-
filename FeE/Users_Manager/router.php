<?php
header("Content-Type: application/json");
$response = array();

$url = parse_url($_SERVER['REQUEST_URI']);
if($url["path"] != "/FeE/Users_Manager/users/user")
{
    $response["Error"] = "Incorect URI.";
    echo json_encode($response);
    exit;
}

switch(strtoupper($_SERVER['REQUEST_METHOD']))
{
    case 'GET':
        require_once "./get.php";
        break;
    case 'POST':
        require_once "./post.php";
        break;
    default:
        echo "Error: Request method not supported.";
        break;
}