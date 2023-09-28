<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialContactModel extends Model
{
    protected $table      = 'social_contact';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['contact_type', 'link'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}