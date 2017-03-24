<?php
include "../app/View.php";

$uri = isset($_SERVER["REDIRECT_URL"]) ? $_SERVER["REDIRECT_URL"] : $_SERVER["REQUEST_URI"];

if ($uri == '/') {
    $action = "index.php";
} else {
    $action = $uri.".php";
}
$action = trim($action, '/');

// include controller if exist else 404
$controller = "../controller/".$action;

if (!file_exists($controller)) {
    header("HTTP/1.0 404 Not Found");
    $action = "404.php";
} else {
    require $controller;
}
// render view
View::render($action);
