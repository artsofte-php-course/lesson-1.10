<?php

use Controller\ProjectController;
use Repository\ProjectRepository;

spl_autoload_register(function($className) {
    
    $path = __DIR__ . DIRECTORY_SEPARATOR . 
                    str_replace("\\", DIRECTORY_SEPARATOR, $className) . ".php";
    require_once $path;
});

$projectRepository = new ProjectRepository(__DIR__ . DIRECTORY_SEPARATOR 
. 'data/projects.csv');

$controller = new ProjectController($projectRepository);


if ($_SERVER["REQUEST_URI"] === "/create") {
    $content =  $controller->create($_POST);
} else {
    $content =  $controller->list();
}

echo $content;



