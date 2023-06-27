<?php
require_once 'controllers/BoController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/EmpresaController.php';
require_once 'controllers/IvaController.php';
require_once 'controllers/ServicoController.php';
require_once 'controllers/ClienteController.php';
require_once 'controllers/FuncionarioController.php';
require_once 'controllers/LinhaObraController.php';
require_once 'controllers/FolhaObraController.php';
require_once 'controllers/ErrorController.php';
require_once 'controllers/BoClienteController.php';
require_once 'controllers/DefinicoesController.php';



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
            'error' => ['GET', 'ErrorController', 'cliente/index'],
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
            'disable' =>['GET','ServicoController','disable'],
            'enable' =>['GET','ServicoController','enable'],
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
            'update' =>['GET|POST','FolhaObraController','update'],
            'show' =>['GET','FolhaObraController','show'],
            'create' =>['GET|POST','FolhaObraController','create'],
            'store' =>['GET|POST','FolhaObraController','store'],
            'selectClient' => ['GET|POST', 'FolhaObraController', 'selectClient'],
            'delete' =>['GET','FolhaObraController','delete'],
            'error' => ['GET', 'ErrorController', 'folhaobra/index'],
            'indexcliente' =>['GET|POST','FolhaObraController','indexcliente'],
            'pagamento' =>['GET', 'FolhaObraController','pagamento'],
            'updatepagamento' =>['GET|POST', 'FolhaObraController','updatepagamento'],
            'pdf'=> ['GET', 'FolhaObraController', 'pdf']
        ],

        'error'=>[
            'index' => ['GET', 'ErrorController', 'index'],
        ],

        'definicoes'=>[
            'index' => ['GET', 'DefinicoesController', 'index'],
            'updateEmail' => ['POST', 'DefinicoesController', 'updateEmail'],
            'updatePassword' => ['POST', 'DefinicoesController', 'updatePassword']
        ],

       ];

?>


