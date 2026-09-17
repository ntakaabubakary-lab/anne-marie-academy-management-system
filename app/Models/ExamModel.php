<?php

namespace App\Models;

use CodeIgniter\Model;

class ExamModel extends Model
{
    protected $table = 'exams';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'exam_name',
        'exam_type',
        'academic_year_id'
    ];

    protected $useTimestamps = false;
}