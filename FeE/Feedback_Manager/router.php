<?php

//declare(strict_types=1);

spl_autoload_register(function ($class) {
    require __DIR__ . "/$class.php";
});

set_exception_handler("errorHandler::handleException");

header("Content-type: application/json; charset=UTF-8");

$uri = explode("/", $_SERVER['REQUEST_URI']);

if($uri[3] != "forms" && $uri[3] != "feedbacks")
{
    http_response_code(404);
    exit;
}

$id = $uri[4] ?? null;

$database = new database();

$controller = new service($database);

$controller->processRequest($_SERVER['REQUEST_METHOD'],$uri[3], $id);
