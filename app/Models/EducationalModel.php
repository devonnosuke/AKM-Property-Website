<?php

namespace App\Models;

use CodeIgniter\Model;

class EducationalModel extends Model
{
    protected $table      = 'educational';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['country_collage', 'collage_name', 'title', 'major', 'year_graduation'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $useSoftDeletes = false;

}