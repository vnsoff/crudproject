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
    public function index2()
    {
        return view('indexemp', [
            'indexemp' => $this->empresaModelo->findAll()
        ]);
    }    
}