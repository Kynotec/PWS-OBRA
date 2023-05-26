<?php
require_once 'controllers/BoController.php';
require_once 'controllers/HomeController.php';

return [
        'defaultRoute' => ['GET', 'HomeController', 'index'],

        'Bo' => [
            'index' => ['GET', 'BoController', 'index'],
            'login'=> ['POST', 'BoController', 'login'],
            'logout'=>['GET', 'BoController', 'logout']
            ],

        'LayoutFo'=>[
            'index' => ['GET', 'HomeController', 'index'],
        ],

        'home'=>[
        'index' => ['GET', 'HomeController', 'index'],
        ],


        'login'=>[
        'index' => ['GET', 'LoginController', 'index'],
        ],

       ];

?>


