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
$vars = [];
if (!file_exists($controller)) {
    return View::render404();
} else {
    $vars = require $controller;
}
// render view
View::render($action, $vars);
