<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
{
    protected $table = 'teachers';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'teacher_number',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'phone',
        'email',
        'qualification',
        'address'
    ];

    protected $useTimestamps = false;
}