<?php

namespace App\Models;

use CodeIgniter\Model;

class CtaModel extends Model
{
    protected $table      = 'cta';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['cta_value'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
