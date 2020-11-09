<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProdutosModel;

class Produtos extends Controller
{
	public function index()
	{
        $model = new ProdutosModel();

        $data = [

            'produtos' => $model->getProdutos()
        ];

        echo view('templates/header');
        echo view('produtos/overview',$data);
        echo view('templates/footer');
    }
}
