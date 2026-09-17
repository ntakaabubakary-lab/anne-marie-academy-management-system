<?php

namespace App\Models;

use CodeIgniter\Model;

class CombinationModel extends Model
{
    protected $table = 'combinations';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'combination_code',
        'combination_name'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = '';
}