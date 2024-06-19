<?php
require_once "./database.php";

global $url;
global $response;

parse_str($url['query'],$url_query);

if (sizeof($url_query) != 2){
    $response["Error"] = "Incorect number of arguments in query.";
    echo json_encode($response,JSON_PRETTY_PRINT);
    exit;
}
if(!isset($url_query['username'])){
    $response["Error"] = key($url_query)." is not a valid attribute.";
    echo json_encode($response,JSON_PRETTY_PRINT);
    exit;
}


$database = new Db();

$sql_stmt = "select count(username) from accounts where username='". $url_query['username'] ."' and password='". $url_query['password']."'";

$result_from_query = $database->execute_query($sql_stmt);

$user_exists = $result_from_query->fetch_column();
if($user_exists > 0){
    $response["Response"] = true;
    echo json_encode($response,JSON_PRETTY_PRINT);
}
else
{
    $response["Response"] = false;
    echo json_encode($response,JSON_PRETTY_PRINT);
}
    