<?php
// Cut URL for navigation
session_start();
    $cutUri = '/Web/web_php_project';
    $request = str_replace($cutUri, "",$_SERVER['REQUEST_URI']);
    $uri = parse_url($request, PHP_URL_PATH);
    $split_uri = explode('/', $uri); 
    $split = array_filter($split_uri);

    if(count($split) === 0 or $split[1] === 'index'){
        $controllers = 'accueil';
    }
    else{
        $controllers = $split[1];
    }

    $path = 'controllers/' . $controllers . '.php';

    if(file_exists($path)){
        require $path;
    }
    else{
        require 'controllers/error.php';
    }
?>