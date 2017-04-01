<?php
include_once "../app/View.php";
include_once "../app/Config.php";

$uri = isset($_SERVER["REDIRECT_URL"]) ? $_SERVER["REDIRECT_URL"] : $_SERVER["REQUEST_URI"];

$baseUrl = Config::get('baseUrl');

function redirectTo($uri) {
    $baseUrl = Config::get('baseUrl');
    header("Location: ".$baseUrl.$uri);
}

$uri = preg_replace("#^$baseUrl#", "", $uri);
if (empty($uri)) {
    $action = "index.php";
} else {
    $action = $uri.".php";
}
$action = trim($action, '/');

// include_once controller if exist else 404
$controller = "../controller/".$action;
$vars = [];
if (!file_exists($controller)) {
    return View::render404();
} else {
    $vars = require $controller;
}
// render view
View::render($action, $vars);
