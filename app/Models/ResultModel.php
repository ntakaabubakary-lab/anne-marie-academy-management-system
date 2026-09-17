<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultModel extends Model
{
    protected $table = 'results';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'student_id',
        'subject_id',
        'exam_id',
        'marks'
    ];

    protected $useTimestamps = false;
}