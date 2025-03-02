<?php

use Api\TaskApi\Router;
use Config\Database;
use Api\TaskApi\Task;

require_once "./vendor/autoload.php";
header("Connect-Type: application/json");

//Database Initialization
$db = new Database();
$conn = $db->getConnection();
$task = new Task($conn);
$route = new Router($task);

//handle request
$route->handleRequest();
$conn->close();

?>