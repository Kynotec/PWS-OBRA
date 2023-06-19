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
require_once 'controllers/ErrorController.php';
require_once 'controllers/BoClienteController.php';


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
            'index' => ['GET|POST', 'ClienteController', 'index'],
            'show' => ['GET','ClienteController', 'show'],
            'create' => ['GET', 'ClienteController', 'create'],
            'store' =>['POST','ClienteController','store'],
            'edit' =>['GET','ClienteController','edit'],
            'update' =>['POST','ClienteController','update'],
            'disable' =>['GET','ClienteController','disable'],
            'enable' =>['GET','ClienteController','enable'],
            'error' => ['GET', 'ErrorController', 'cliente/index']

        ],

        'funcionario'=>[
            'index' => ['GET|POST', 'FuncionarioController', 'index'],
            'show' => ['GET','FuncionarioController', 'show'],
            'create' => ['GET', 'FuncionarioController', 'create'],
            'store' =>['POST','FuncionarioController','store'],
            'edit' =>['GET','FuncionarioController','edit'],
            'update' =>['POST','FuncionarioController','update'],
            'disable' =>['GET','FuncionarioController','disable'],
            'enable' =>['GET','FuncionarioController','enable'],
            'error' => ['GET', 'ErrorController', 'funcionario/index']
    ],

        'bo'=>[
            'index' => ['GET', 'BoController', 'index'], //rota backoffice
        ],

        'bocliente'=>[
        'index' => ['GET', 'BoClienteController', 'index'], //rota backoffice do cliente
        ],

        'empresa'=>[
            'index' => ['GET', 'EmpresaController', 'index'],
            'edit' =>['GET','EmpresaController','edit'],
            'update' =>['POST','EmpresaController','update'],
            'error' => ['GET', 'ErrorController', 'empresa/index']
        ],

        'iva'=>[
            'index' => ['GET|POST', 'IvaController', 'index'],
            'show' => ['GET','IvaController', 'show'],
            'edit' =>['GET','IvaController','edit'],
            'update' =>['POST','IvaController','update'],
            'create' =>['GET','IvaController','create'],
            'store' =>['POST','IvaController','store'],
            'delete' =>['GET','IvaController','delete'],
            'disable' =>['GET','IvaController','disable'],
            'enable' =>['GET','IvaController','enable'],
            'error' => ['GET', 'ErrorController', 'iva/index']

        ],

        'servico'=>[
            'index' => ['GET|POST', 'ServicoController', 'index'],
            'show' => ['GET','ServicoController', 'show'],
            'edit' =>['GET','ServicoController','edit'],
            'update' =>['POST','ServicoController','update'],
            'create' =>['GET','ServicoController','create'],
            'store' =>['POST','ServicoController','store'],
            'delete' =>['GET','ServicoController','delete'],
            'error' => ['GET', 'ErrorController', 'servico/index']
        ],

        'linhaobra'=>[
            'index' => ['GET', 'LinhaObraController', 'index'],
            'edit' =>['GET','LinhaObraController','edit'],
            'update' =>['POST','LinhaObraController','update'],
            'create' =>['GET','LinhaObraController','create'],
            'store' =>['GET|POST','LinhaObraController','store'],
            'selectServico' => ['GET|POST', 'LinhaObraController', 'selectServico'],
            'delete' =>['GET','LinhaObraController','delete'],
            'error' => ['GET', 'ErrorController', 'linhaobra/index']

        ],
        'folhaobra'=>[
            'index' => ['GET|POST', 'FolhaObraController', 'index'],
            'edit' =>['GET','FolhaObraController','edit'],
            'update' =>['POST','FolhaObraController','update'],
            'create' =>['GET|POST','FolhaObraController','create'],
            'store' =>['GET|POST','FolhaObraController','store'],
            'selectClient' => ['GET|POST', 'FolhaObraController', 'selectClient'],
            'delete' =>['GET','FolhaObraController','delete'],
            'error' => ['GET', 'ErrorController', 'folhaobra/index']
        ],
        'error'=>[
            'index' => ['GET', 'ErrorController', 'index'],
        ],
       ];

?>


