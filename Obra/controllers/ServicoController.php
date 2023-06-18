<?php

class ServicoController extends Controller
{
    public function index()
    {
        $servicos = Servico::all();
        $servicos = $this->filter($servicos);
        $this->renderView('servico', 'index', ['servicos' => $servicos]);
    }

    public function filter($servicos)
    {
        $filterType = $this->getHTTPPostParam('filter_type');
        $tableSearch = $this->getHTTPPostParam('table_search');

        if (isset($filterType, $tableSearch) && $tableSearch != '') {
            $servicos = array_filter($servicos, function ($servico) use ($filterType, $tableSearch) {
                if (!strcmp($filterType, 'descricao') ||
                    !strcmp($filterType, 'precohora'))
                {
                    return str_contains(strtoupper($servico->{$filterType}), strtoupper($tableSearch));
                }

                else if (!strcmp($filterType, 'iva')) {
                    return str_contains(strtoupper($servico->{$filterType}->percentagem), strtoupper($tableSearch));
                }
            else if (!strcmp($filterType, 'id')) {
                return str_contains(strtoupper($servico->{$filterType}), strtoupper($tableSearch));
            }
                return false;
            });
        }
        return $servicos;
    }

    public function show($id)
    {
        $servicos = Servico::find($id);
        if (is_null($servicos)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->renderView('servico','show',['servico'=>$servicos]);
        }
    }

    public function create()
    {
        $ivas= Iva::all();
        $this->renderView('servico', 'create', ['ivas' => $ivas]);
    }

    public function store()
    {
        $servicos = new Servico($this->getHTTPPost());

        if($servicos->is_valid()){
            $servicos->save();
            $this-> redirectToRoute('servico', 'index');
        } else {
            $ivas= Iva::all();
            $this->renderView('servico', 'create',  ['servicos' => $servicos, 'ivas' => $ivas]);
        }
    }

    public function edit($id)
    {
        $servicos = Servico::all();
        if (is_null($servicos)) {
            //TODO redirect to standard error page
        } else {
            $ivas = Iva::all();
            $this->renderView('servico', 'edit', ['id' => $id, 'servicos' => $servicos, 'ivas' => $ivas]);
        }
    }

    public function update($id)
    {
        $servicos = Servico::find($id);
        $servicos->update_attributes($this->getHTTPPost());
        if($servicos->is_valid()){
            $servicos->save();
            $this-> redirectToRoute('servico', 'index');
        } else {
            $ivas = Iva::all();
            $this->renderView('servico', 'edit', ['servicos' => $servicos, 'ivas' => $ivas]);
        }
    }

    public function delete($id)
    {
        $servicos = Servico::find($id);
        $servicos->delete();
        //redirecionar para o index
        $this->redirectToRoute('servico','index');
    }

}