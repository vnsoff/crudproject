<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ModeloProduto;


class Produtos extends BaseController
{
    public $produtoModelo;

    public function __construct()
    {
        $this->produtoModelo = new ModeloProduto();
    }
    public function index()
    {
        return view('indexprod' , [
           'indexprod'=>$this->produtoModelo->paginate(10),'pager' => $this->produtoModelo->pager
        ]);
    }
    public function delete($id) {
        if($this->produtoModelo->delete($id)) {
            echo view ('messages', [
                'message'=>'Produto excluído com sucesso'
            ]);
        } else {
            echo "Erro.";
        }
    }

    public function criar(){
        return view('formprod');
    }
    public function store(){
        if ($this->produtoModelo->save($this->request->getPost())){
            return view("messages", [
                'message'=> 'Produto salvo com sucesso'
            ]);
        } else {
            echo "Erro.";
        }
    }

    public function edit ($id){
        return view('formprod', [
            'produtos' => $this->produtoModelo->find($id)
        ]);
    }
}