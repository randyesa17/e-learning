<?php namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
    protected $table = 'jurusan';
    protected $allowedFields = ['jurusan'];
    protected $primaryKey = 'idjurusan';
    protected $validationMessages = [
        'jurusan' => [
            'is_unique' => 'Jurusan sudah ada'
        ]
    ];
}