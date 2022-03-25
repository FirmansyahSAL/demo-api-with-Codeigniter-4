<?php

namespace App\Models;

use CodeIgniter\Model;

class provinceModel extends Model
{
    protected $table = 'province';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kota', 'provinsi'];
}
