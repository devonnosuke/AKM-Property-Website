<?php

namespace App\Models;

use CodeIgniter\Model;

class PortfolioModel extends Model
{
    protected $table      = 'portfolio';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['file_name', 'type','captions'];
    protected $useTimestamps = true;
    protected $updatedField  = 'updated_at';
    protected $createdField  = 'created_at';

}