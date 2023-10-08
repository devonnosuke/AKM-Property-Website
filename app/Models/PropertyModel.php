<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyModel extends Model
{
    protected $table      = 'property';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['type_name', 'address','post_number','lt','lb','bads','baths', 'garages','description','aminities','video','image','color', 'slug'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getLastid()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('id');
        $builder->orderBy('id','DESC');
        $builder->limit(1);
        // dd($builder->get()->getResultArray());
        return $builder->get()->getResultArray();
    }
}