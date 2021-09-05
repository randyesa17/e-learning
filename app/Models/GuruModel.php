<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'guru';
    protected $allowedFields = ['nip', 'nama', 'tempatLahir', 'tglLahir', 'kelamin', 'alamat', 'idmapel', 'jabatan', 'foto', 'password'];
    protected $primaryKey = 'nip';
    protected $validationMessages = [
        'nip' => [
            'is_unique' => 'Guru dengan NIP tersebut sudah ada'
        ],
    ];
}