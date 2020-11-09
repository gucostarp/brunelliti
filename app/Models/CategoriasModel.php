<?php namespace App\Models;
use CodeIgniter\Model;

class CategoriasModel extends Model {

    protected $table = 'categoria';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'nome'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $useSoftDeletes = true;
    
    public function getCategorias($id = null) {
        if ($id == null) {
            return $this->findAll();

        }
        return $this->asArray()->where(['id' => $id])->first();
    }
}