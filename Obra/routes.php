<?php
require_once 'controllers/BoController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/EmpresaController.php';
require_once 'controllers/IvaController.php';
require_once 'controllers/ServicoController.php';
require_once 'controllers/FoController.php';

return [
        'defaultRoute' => ['GET', 'HomeController', 'index'],

        'home'=>[
            'index' => ['GET', 'HomeController', 'index'],
        ],

        'layout' => [
        'index' => ['GET', 'FoController', 'index'],
        'login'=> ['GET', 'LoginController', 'index'],
        'logout'=>['GET', 'LoginController', 'logout']
        ],

        'empresa'=>[
            'index' => ['GET', 'EmpresaController', 'index'],
            'edit' =>['GET','EmpresaController','edit'],
            'update' =>['POST','EmpresaController','update'],
],

        'iva'=>[
            'index' => ['GET', 'IvaController', 'index'],
            'edit' =>['GET','IvaController','edit'],
            'update' =>['POST','IvaController','update'],
            'create' =>['GET','IvaController','create'],
            'store' =>['POST','IvaController','store'],
            'delete' =>['GET','IvaController','delete']
        ],

        'servico'=>[
            'index' => ['GET', 'ServicoController', 'index'],
            'edit' =>['GET','ServicoController','edit'],
            'update' =>['POST','ServicoController','update'],
            'create' =>['GET','ServicoController','create'],
            'store' =>['POST','ServicoController','store'],
            'delete' =>['GET','ServicoController','delete']
        ],
    

        'login'=>[
        'index' => ['GET', 'LoginController', 'index'],
        ],

       ];

?>


