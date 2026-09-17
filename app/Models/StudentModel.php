<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'admission_number',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'date_of_birth',
        'class_id',
        'combination_id',
        'parent_name',
        'parent_phone',
        'address'
    ];

    // Students table does not use updated_at
    protected $useTimestamps = false;
}