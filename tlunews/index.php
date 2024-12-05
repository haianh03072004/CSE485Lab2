<?php
    require_once('./config/database.php');

    $db = DatabaseConfig::getConnection();

$url = isset($_GET['url'])? $_GET['url']:'';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$urlParts = explode('/', $url);

$controllerName = !empty($urlParts[0]) ? $urlParts[0] . 'Controller':'';
$methodName = isset($urlParts[1]) ? $urlParts[1] : 'index';
$params = array_slice($urlParts, 2);
$filepath = "./controllers/".$controllerName.".php";
if (file_exists($filepath)) {
    require_once $filepath;
    $controller = new $controllerName($db);
    if (method_exists($controller, $methodName)) {
        call_user_func_array([$controller, $methodName], $params);
        
    } else {
        echo "khong ton tai ham $methodName trong controller $controllerName.";
    }
} else {
    echo "khong ton tai $controllerName .";
}
?>