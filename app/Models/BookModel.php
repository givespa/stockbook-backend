<?php namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model {
  
        protected $table         = 'books';
        protected $primaryKey    = 'id';
        protected $returnType    = 'array';
        protected $useSoftDeletes = false;
        protected $allowedFields = ['name', 'author', 'editorial', 'year', 'synopsis'];

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
    
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
}