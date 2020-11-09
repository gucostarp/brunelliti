<?php namespace App\Models;
use CodeIgniter\Model;

class ProdutosModel extends Model {

    protected $table = 'produtos';
    protected $primaryKey = 'codigo';

    protected $allowedFields = ['nome', 'preco', 'categoria', 'descricao', 'ativo', 'quantidade'];
    
    public function getProdutos($codigo = null) {
        if ($codigo == null) {
            return $this->findAll();

        }
        return $this->asArray()->where(['codigo' => $codigo])->first();
    }
}