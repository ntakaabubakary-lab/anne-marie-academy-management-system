<?php

namespace App\Models;

use CodeIgniter\Model;

class FeeModel extends Model
{
    protected $table = 'fees';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'student_id',
        'academic_year_id',
        'amount',
        'payment_date',
        'payment_method',
        'reference_number',
        'received_by'
    ];

    protected $useTimestamps = false;
}
