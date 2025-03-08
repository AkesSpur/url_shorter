<?php

require_once __DIR__ .'/vendor/autoloader.php' ;
require_once __DIR__ .'/controllers/config/config.php';

use Controllers\PageControllers\AddUrlPageController;
use Controllers\PageControllers\HomePageController;
use Controllers\Router\Routes;

define('VIEW_PATH', __DIR__.'/views/public');


$router = (new Routes())  
         ->get('/', [HomePageController::class, 'index' ])
         ->post('/addurl', [AddUrlPageController::class, 'index' ])
; 

echo $router -> resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));



