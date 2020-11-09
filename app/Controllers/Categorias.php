<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CategoriasModel;

class Categorias extends Controller
{
	public function index()
	{
        $model = new CategoriasModel();

        $data = [
            'categorias' => $model->getCategorias()
        ];

        echo view('templates/header');
        echo view('categorias/overview',$data);
        echo view('templates/footer');
    }

    public function create() {
        helper('form');
        echo view('templates/header');
        echo view('categorias/form');
        echo view('templates/footer');
    }

    public function store() {
        helper ('form');

        $model = new CategoriasModel;
        $rules = [
            'nome' => 'required[min_length[3]|max_length[255]',

        ];
        if ($this->validate($rules)) {
            $model -> save([
                'id'     => $this->request->getVar('id'),
                'nome'   => $this->request->getVar('nome'),
            ]);

            echo view('templates/header');
            echo view('categorias/sucess');
            echo view('templates/footer');

        } else {
            echo view('templates/header');
            echo view('categorias/form');
            echo view('templates/footer');
        }
    }

    public function edit($id = null) {
        $model = new CategoriasModel();
        $data['categorias'] = $model->getCategorias($id);
        if (empty($data['categorias'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não pude encontrar essa categoria: '.$id);
        }
        $data = [
            'id'           => $data['categorias']['id'],
            'nome'         => $data['categorias']['nome'],
        ];
        echo view('templates/header');
        echo view('categorias/form', $data);
        echo view('templates/footer');
    }

    public function delete($id = null) {
        $model = new CategoriasModel();
        $model->delete($id);

        echo view('templates/header');
        echo view('categorias/delete_success');
        echo view('templates/footer');
    }

}


