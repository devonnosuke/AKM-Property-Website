<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonalModel extends Model
{
    protected $table      = 'personal';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['profile', 'visi', 'misi'];
    protected $useTimestamps = true;
    protected $ceratedField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
