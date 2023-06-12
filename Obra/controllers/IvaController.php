<?php

class IvaController extends Controller
{
    public function index(){

        $ivas = Iva::all();
        if(isset($_POST['filter_type'], $_POST['table_search']) && $_POST['table_search'] != ''){
            $ivas = array_filter($ivas, function($iva){
                return str_contains(strtoupper($iva->{$_POST['filter_type']}),strtoupper($iva['table_search']));
            });
        }
        $this-> renderView('iva','index',['ivas' => $ivas]);
    }

    public function show($id)
    {
        $ivas = Iva::find($id);
        if (is_null($ivas)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->renderView('iva','show',['ivas'=>$ivas]);
        }
    }

    public function create()
    {
        $this->renderView('iva','create',['iva' => new Iva()]);
    }

    public function store()
    {

        if($_POST['emvigor']){
            $_POST['emvigor'] = 1;
        }else{
            $_POST['emvigor'] = 0;
        }

        $ivas = new Iva($this->getHTTPPost());
        if($ivas->is_valid()){
            $ivas->save();
            $this->redirectToRoute('iva','index');

        } else {
            $this->renderView('iva','create', ['ivas' => $ivas]);
        }
    }

    public function edit($id)
    {
        $iva = Iva::find($id);
        if(is_null($iva)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('iva', 'edit', ['iva' => $iva]);
        }
    }
    public function update($id)
    {
        $iva = Iva::find($id);


        if(isset($_POST['emvigor'])){
            $_POST['emvigor'] = 1;
        }else{
            $_POST['emvigor'] = 0;
        }

        $iva->update_attributes($this->getHTTPPost());
        if($iva->is_valid()){
            $iva->save();
            $this-> redirectToRoute('iva', 'index');
        } else {
            $this->renderView('iva', 'edit', ['iva' => $iva]);
        }
    }

    public function delete($id)
    {
        $iva = Iva::find($id);

            $iva->delete();
            //redirecionar para o index
            $this->redirectToRoute('iva','index');
        }



    public function disable($id)
    {
        $iva = Iva::find($id);
        $iva->update_attribute('emvigor', 0);
        $iva->save();
        $this->RedirectToRoute('iva', 'index');//redirecionar para o index
    }

    public function enable($id)
    {
        $iva = Iva::find($id);
        $iva->update_attribute('emvigor', 1);
        $iva->save();
        $this->RedirectToRoute('iva', 'index');//redirecionar para o index
    }


}