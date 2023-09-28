<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressContactModel extends Model
{
    protected $table      = 'address_contact';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ['address', 'country', 'telephone', 'phone', 'email'];
    protected $useTimestamps = true;
    protected $ceratedField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
