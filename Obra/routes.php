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
            'login'=> ['GET', 'LoginController', 'index'],
            'logout'=>['GET', 'LoginController', 'logout']
            ],

        'LayoutFo'=>[
            'index' => ['GET', 'HomeController', 'index'],
        ],
    

        'login'=>[
        'index' => ['GET', 'LoginController', 'index'],
        ],

       ];

?>


