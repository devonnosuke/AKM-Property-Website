<?php

namespace App\Models;

use CodeIgniter\Model;

class SpecificationModel extends Model
{
    protected $table      = 'specification';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['id_property', 'spec_name', 'spec'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // public function getLastid()
    // {
    //     $db      = \Config\Database::connect();
    //     $builder = $db->table($this->table);
    //     $builder->select('id');
    //     $builder->orderBy('id','DESC');
    //     $builder->limit(1);
    //     // dd($builder->get()->getResultArray());
    //     return $builder->get()->getResultArray();
    // }

    public function getByProId($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('*');
        $builder->where('id_property', $id);
        return $builder->get()->getResultArray();
    }
    
    public function getByProIdSeparate($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('*');
        $builder->where('id_property', $id);
        
        $datas = $builder->get()->getResultArray();
        $spec_name = [];
        $spec = [];
        foreach ($datas as $data) {
            array_push($spec_name,$data['spec_name']);
            array_push($spec,$data['spec']);
        }

        $data = [
            'spec_name' => $spec_name,
            'spec' => $spec,
        ];

        return $data;
    }
    
    public function deleteByProId($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('*');
        $builder->where('id_property', $id);
        return $builder->delete();
    }
    

}