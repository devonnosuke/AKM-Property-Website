<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicesModel extends Model
{
    protected $table      = 'services';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['name', 'description', 'features', 'img'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
