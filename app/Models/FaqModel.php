<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
    protected $table      = 'faq';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['questions', 'answer'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
