<?php
require_once 'controllers/BoController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';

return [
        'defaultRoute' => ['GET', 'HomeController', 'index'],

        'home'=>[
        'index' => ['GET', 'HomeController', 'index'],
        ],

        'layout' => [
            'index' => ['GET', 'BoController', 'index'],
            'login'=> ['POST', 'BoController', 'login'],
            'logout'=>['GET', 'BoController', 'logout']
            ],

        'LayoutFo'=>[
            'index' => ['GET', 'HomeController', 'index'],
        ],
    

        'login'=>[
        'index' => ['GET', 'LoginController', 'index'],
        ],

       ];

?>


