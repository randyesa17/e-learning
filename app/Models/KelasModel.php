<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $allowedFields = ['kelas'];
    protected $primaryKey = 'idkelas';
    protected $validationMessages = [
        'kelas' => [
            'is_unique' => 'Kelas sudah ada'
        ]
    ];
}