<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyImgModel extends Model
{
    protected $table      = 'property_img';
    protected $primaryKey = 'image_name';
    protected $returnType     = 'array';
    protected $allowedFields = ['id_property'];

        // Dates
        protected $useTimestamps = true;
        protected $dateFormat    = 'datetime';
        protected $createdField  = 'created_at';

    
    public function simpan($dataImages)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        // $builder->select('*');
        // $builder->where('username', $usernameInput);
        // dd($builder->get()->getResultArray());

        // $dataImages = [
        //     'image_name'=>'sda111ssdasdas',
        //     'id_property'=>1,
        // ];
        // $date=();

        $dataImages['created_at'] = date("Y-m-d H:i:s");
        return $builder->insert($dataImages);
    }

    public function getPropertyById($id_property) {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('*');
        $builder->where('id_property', $id_property);

        return $builder->get()->getResultObject();
    }

}