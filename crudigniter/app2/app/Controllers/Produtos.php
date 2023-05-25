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
           'indexprod'=>$this->produtoModelo->findAll()
        ]);
    }
}