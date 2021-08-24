<?php

namespace App\Models;

use CodeIgniter\Model;

class UjianModel extends Model
{
    protected $table = 'ujian';
    protected $allowedFields = ['kodeujian', 'koderuang', 'jenis', 'tgl'];
    protected $primaryKey = 'kodeujian';
    protected $validationMessages = [
        'koderuang' => [
            'is_unique' => 'Ujian di ruangan ini sudah ada. Satu ruangan hanya boleh ada satu ujian'
        ]
    ];
}