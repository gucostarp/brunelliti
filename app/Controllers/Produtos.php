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

    public function create() {
        helper('form');
        echo view('templates/header');
        echo view('produtos/form');
        echo view('templates/footer');
    }

    public function store() {
        helper ('form');

        $model = new ProdutosModel;
        $rules = [
            'nome' => 'required[min_length[3]|max_length[255]',
            'preco' => 'required'
        ];
        if ($this->validate($rules)) {
            $model -> save([
                'codigo'     => $this->request->getVar('codigo'),
                'nome'       => $this->request->getVar('nome'),                
                'preco'      => $this->request->getVar('preco'),                
                'descricao'  => $this->request->getVar('descricao'),                
                'idCategoria'=> $this->request->getVar('idCategoria'),                
                'ativo'      => $this->request->getVar('ativo'),                
                'quantidade' => $this->request->getVar('quantidade'),                
            ]);

            echo view('templates/header');
            echo view('produtos/sucess');
            echo view('templates/footer');

        } else {
            echo view('templates/header');
            echo view('produtos/form');
            echo view('templates/footer');
        }
    }

    public function edit($codigo = null) {
        $model = new ProdutosModel();
        $data['produtos'] = $model->getProdutos($codigo);
        if (empty($data['produtos'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não pude encontrar esse produto: '.$codigo);
        }
        $data = [
            'codigo'           => $data['produtos']['codigo'],
            'nome'             => $data['produtos']['nome'],
            'descricao'        => $data['produtos']['descricao'],  
            'preco'            => $data['produtos']['preco'],
            'idCategoria'      => $data['produtos']['idCategoria'],
            'quantidade'       => $data['produtos']['quantidade'],
            'ativo'            => $data['produtos']['ativo'],
        ];    
        echo view('templates/header');
        echo view('produtos/form', $data);
        echo view('templates/footer');
    }

    public function delete($codigo = null) {
        $model = new ProdutosModel();
        $model->delete($codigo);

        echo view('templates/header');
        echo view('produtos/delete_success');
        echo view('templates/footer');
    }

}


