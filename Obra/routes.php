<?php
require_once 'controllers/BoController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/EmpresaController.php';
require_once 'controllers/IvaController.php';
require_once 'controllers/ServicoController.php';
require_once 'controllers/FoController.php';
require_once 'controllers/ClienteController.php';
require_once 'controllers/FuncionarioController.php';
require_once 'controllers/LinhaObraController.php';
require_once 'controllers/FolhaObraController.php';

return [
        'defaultRoute' => ['GET', 'HomeController', 'index'],

        'home'=>[
            'index' => ['GET', 'HomeController', 'index'], // Pagina Principal Obra
        ],

        'login'=>[
            'index' => ['GET', 'LoginController', 'index'],
            'checkLogin'=>['POST','LoginController','checkLogin'],
            'logout'=>['GET','LoginController','logout'],
        ],
        'cliente'=>[
            'index' => ['GET', 'ClienteController', 'index'],
            'show' => ['GET','ClienteController', 'show'],
            'create' => ['GET', 'ClienteController', 'create'],
            'store' =>['POST','ClienteController','store'],
            'edit' =>['GET','ClienteController','edit'],
            'update' =>['POST','ClienteController','update'],
            'delete' =>['GET','ClienteController','delete']
        ],

        'funcionario'=>[
            'index' => ['GET', 'FuncionarioController', 'index'],
            'show' => ['GET','FuncionarioController', 'show'],
            'create' => ['GET', 'FuncionarioController', 'create'],
            'store' =>['POST','FuncionarioController','store'],
            'edit' =>['GET','FuncionarioController','edit'],
            'update' =>['POST','FuncionarioController','update'],
            'delete' =>['GET','FuncionarioController','delete']
    ],

        'bo'=>[
            'index' => ['GET', 'BoController', 'index'], //rota backoffice
        ],

        'empresa'=>[
            'index' => ['GET', 'EmpresaController', 'index'],
            'edit' =>['GET','EmpresaController','edit'],
            'update' =>['POST','EmpresaController','update'],
        ],

        'iva'=>[
            'index' => ['GET', 'IvaController', 'index'],
            'show' => ['GET','IvaController', 'show'],
            'edit' =>['GET','IvaController','edit'],
            'update' =>['POST','IvaController','update'],
            'create' =>['GET','IvaController','create'],
            'store' =>['POST','IvaController','store'],
            'delete' =>['GET','IvaController','delete']
        ],

        'servico'=>[
            'index' => ['GET', 'ServicoController', 'index'],
            'show' => ['GET','ServicoController', 'show'],
            'edit' =>['GET','ServicoController','edit'],
            'update' =>['POST','ServicoController','update'],
            'create' =>['GET','ServicoController','create'],
            'store' =>['POST','ServicoController','store'],
            'delete' =>['GET','ServicoController','delete']
        ],

        'linhaobra'=>[
            'index' => ['GET', 'LinhaObraController', 'index'],
            'edit' =>['GET','LinhaObraController','edit'],
            'update' =>['POST','LinhaObraController','update'],
            'create' =>['GET','LinhaObraController','create'],
            'store' =>['POST','LinhaObraController','store'],
        ],
        'folhaobra'=>[
            'index' => ['GET', 'FolhaObraController', 'index'],
            'edit' =>['GET','FolhaObraController','edit'],
            'update' =>['POST','FolhaObraController','update'],
            'create' =>['GET','FolhaObraController','create'],
            'store' =>['POST','FolhaObraController','store'],
            'selectClient' => ['GET', 'FolhaObraController', 'selectClient'],
        ],

       ];

?>


