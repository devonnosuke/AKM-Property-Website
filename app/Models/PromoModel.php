<?php

namespace App\Models;

use CodeIgniter\Model;

class PromoModel extends Model
{
    protected $table      = 'promo';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['nama_promo', 'slug', 'id_property', 'deskripsi','promo','potongan_harga','brosur','bonus','bebas'];
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
        $builder->get()->getResultArray();
    }
}