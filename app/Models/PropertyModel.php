<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyModel extends Model
{
    protected $table      = 'property';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['type_name', 'slug', 'address','description','harga_jual','features','image','color','luas_tanah','denah'];
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

    public function getBySlug($slug)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('*');
        $builder->where('slug', $slug);
        return $builder->get()->getResultArray();
    }
    
    public function findId($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('*');
        $builder->where('id', $id);
        return $builder->get()->getResultArray();
    }
    
    public function findAllArray()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    
    public function getDenahNameById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('denah');
        $builder->where('id', $id);
        return $builder->get()->getResultArray()[0]['denah'];
    }
}