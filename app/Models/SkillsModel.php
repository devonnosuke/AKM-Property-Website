<?php

namespace App\Models;

use CodeIgniter\Model;

class SkillsModel extends Model
{
    protected $table      = 'skills';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['skill_name', 'skill_value'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
