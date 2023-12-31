<?php

namespace App\Models;

use CodeIgniter\Model;

class PromoModel extends Model
{
    protected $table      = 'promo';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['nama_promo', 'slug', 'id_property', 'deskripsi','potongan_harga','brosur','bonus','bebas'];
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

    public function findAllPromo()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('*, promo.slug');
        $builder->join('property', "property.id = $this->table.id_property");
        return $builder->get()->getResultObject();
    }

}