<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyModel extends Model
{
    protected $table      = 'property';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['type_name', 'address','post_number','lt','lb','bads','baths', 'garages','description','aminities','video','img'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}