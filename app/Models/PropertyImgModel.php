<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyImgModel extends Model
{
    protected $table      = 'property_img';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['id_property', 'img'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}