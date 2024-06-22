<?php

spl_autoload_register(function ($class) {
    require __DIR__ . "/$class.php";
});

set_exception_handler("errorHandler::handleException");

header("Content-type: application/json");

$url = parse_url($_SERVER['REQUEST_URI']);

$url_path = explode("/",$url['path']);

if(array_pop($url_path) != "feedbacks")
{
    http_response_code(404);
    echo json_encode("Wrong URL.");
    exit;
}


if(count(explode(",",$url['query'])) > 1)
{
    http_response_code(404);
    echo json_encode("Wrong number of attributes in query. Must be only 'id'.");
    exit;
}

$url_query = explode("=",$url['query']);

if($url_query[0] != "id")
{
    http_response_code(404);
    echo json_encode("Attribute in query is not 'id'.");
    exit;
}

$id_form = $_GET['id'];

$database = new database();

$service = new service($database);

$service->processRequest($_SERVER['REQUEST_METHOD'],$id_form);

