<?php

namespace App\Models;

use CodeIgniter\Model;

class SlidersModel extends Model
{
    protected $table      = 'sliders';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['tagline', 'description','align','img'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}