<?php namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class ProdutosModel extends Model {

    protected $table = 'produtos';
    protected $primaryKey = 'codigo';

    protected $allowedFields = ['nome', 'preco', 'idCategoria', 'descricao', 'ativo', 'quantidade'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $useSoftDeletes = true;
    
    public function getProdutos($codigo = null, $busca = null) {
        if ($codigo == null) {   

            $resultados = $this->select('produtos.*, categoria.nome as nomeCategoria')->join('categoria','categoria.id = produtos.idCategoria');
            
            if ($busca != null){
                $resultados = $resultados->like('produtos.nome', $busca);
            }

            return $resultados->findAll();
        }
        return $this->asArray()->where(['codigo' => $codigo])->first();
    }
}