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

$username = $url_query['username'];
$password = $url_query['password'];

$database = new Db();

$sql_stmt = "select count(username) from accounts where username='". $username ."'";

$result_from_query = $database->execute_query($sql_stmt);

$user_exists = $result_from_query->fetch_column();
if($user_exists == 0){
    $sql_stmt = "INSERT INTO `accounts` (`id`, `username`, `password`) VALUES (NULL, '" . $username ."', '". $password ."')";

    $result_from_query = $database->execute_query($sql_stmt);
    if(isset($result_from_query))
    {
        $response["Response"] = "true";
        echo json_encode($response,JSON_PRETTY_PRINT); 
    }
    else
    {
        $response['Error'] = "Error at insert.";
        echo json_encode($response,JSON_PRETTY_PRINT);
    }
    
}
else
{
    $response["Response"] = "Username exists allready.";
    echo json_encode($response,JSON_PRETTY_PRINT);
}
