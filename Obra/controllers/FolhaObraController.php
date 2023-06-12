<?php
use Carbon\Carbon;

class FolhaObraController extends Controller
{
    public function index()
    {
        $folhaobras = FolhaObra::all();

        $this->renderView('folhaobra', 'index', ['folhaobras' => $folhaobras]);

    }

    public function create()
    {
        $empresas = Empresa::all();
        if(count($empresas ) > 0){
            $empresa = $empresas[0];
            $this->renderView('folhaobra', 'create', ['empresa' => $empresa]);
        }

    }

    public function selectClient()
    {
        $users = User::all();

        $filterType = $this->getHTTPPostParam('filter_type');
        $tableSearch = $this->getHTTPPostParam('table_search');

        if ($filterType && $tableSearch !== '') {
            $users = array_filter($users, function($user) use ($filterType, $tableSearch) {
                return str_contains(strtoupper($user->{$filterType}), strtoupper($tableSearch));
            });
        }
        $this->renderView('folhaobra', 'selectClient', ['users' => $users]);

    }

    public function store($idCliente)
    {
        $folhaobra = new FolhaObra();
        $datetoday = Carbon::now();

        $folhaobra->data = $datetoday;
        $folhaobra->valortotal = 0;
        $folhaobra->ivatotal = 0;
        $folhaobra->estado = 'Em Lançamento';
        $folhaobra->cliente_id = $idCliente;
        $auth = new Auth();
        $folhaobra->funcionario_id = $auth->getUserId();

        if ($folhaobra->is_valid()) {
            $folhaobra->save();
            $this->redirectToRoute('linhaobra', 'index', ['idFolhaObra' => $folhaobra->id]);
        } else {
            $this->renderView('folhaobra', 'create', ['folhaobras' => $folhaobra]);
        }


    }
}