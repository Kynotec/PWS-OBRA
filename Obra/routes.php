<?php
require_once 'controllers/BoController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/EmpresaController.php';
require_once 'controllers/IvaController.php';

return [
        'defaultRoute' => ['GET', 'HomeController', 'index'],

        'home'=>[
            'index' => ['GET', 'HomeController', 'index'],
        ],

        'empresa'=>[
            'index' => ['GET', 'EmpresaController', 'index'],
            'edit' =>['GET','EmpresaController','edit'],
            'update' =>['POST','EmpresaController','update'],
],

        'iva'=>[
            'index' => ['GET', 'IvaController', 'index'],
            'show' => ['GET', 'IvaController', 'show'],
            'edit' =>['GET','IvaController','edit'],
            'update' =>['POST','IvaController','update'],
            'create' =>['GET','IvaController','create'],
            'store' =>['POST','IvaController','store'],
            'delete' =>['GET','IvaController','delete']
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


