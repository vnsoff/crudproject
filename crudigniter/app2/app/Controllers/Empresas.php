<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ModeloEmpresa;


class Empresas extends BaseController
{
    public $empresaModelo;
    public function __construct()
    {
        $this->empresaModelo = new ModeloEmpresa();

    }
    public function index()
    {
        return view('indexemp' , [
           'indexemp'=>$this->empresaModelo->paginate(10),'pager' => $this->empresaModelo->pager
        ]);
    }
    public function delete($id) {
        if($this->empresaModelo->delete($id)) {
            echo view ('messages', [
                'message'=>'Empresa excluída com sucesso'
            ]);
        } else {
            echo "Erro.";
        }
    }

    public function criar(){
        return view('formemp');
    }
    public function store(){
        if ($this->empresaModelo->save($this->request->getPost())){
            return view("messages", [
                'message'=> 'Empresa salva com sucesso'
            ]);
        } else {
            echo "Erro.";
        }
    }

    public function edit ($id){
        return view('formemp', [
            'empresas' => $this->empresaModelo->find($id)
        ]);
    }
}