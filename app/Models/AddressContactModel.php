<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressContactModel extends Model
{
    protected $table      = 'address_contact';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['office_name','address', 'telephone', 'phone', 'email'];
    protected $useTimestamps = true;
    protected $ceratedField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function getWaNumber($id = 1)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('phone');
        $builder->where('id', $id);
        return $builder->get()->getResultArray()[0]['phone'];
    }
}

