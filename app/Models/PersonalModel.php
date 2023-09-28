<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonalModel extends Model
{
    protected $table      = 'personal';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['fullname', 'born', 'age', 'gender', 'country', 'about_text', 'cv', 'img'];
    protected $useTimestamps = true;
    protected $ceratedField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
