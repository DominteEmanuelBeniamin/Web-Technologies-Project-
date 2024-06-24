<?php

//declare(strict_types=1);

spl_autoload_register(function ($class) {
    require __DIR__ . "/$class.php";
});

set_exception_handler("errorHandler::handleException");

header("Content-type: application/json; charset=UTF-8");

$uri = explode("/", $_SERVER['REQUEST_URI']);
$uri_3 = explode("?",$uri[3]);

if($uri_3[0] != "forms" && $uri_3[0] != "feedbacks" && $uri_3[0] != "archive")
{
    http_response_code(404);
    echo json_encode("Not found");
    exit;
}

if(count($uri_3) > 1)
    $query = explode("=",$uri_3[1]);
    
$username = $query[1] ?? null;

$id = $uri[4] ?? null;

$database = new database();

$controller = new service($database,$username);

$controller->processRequest($_SERVER['REQUEST_METHOD'],$uri_3[0], $id);
