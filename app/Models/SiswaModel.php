<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $allowedFields = ['nis', 'nisn', 'nama', 'tempatLahir', 'tglLahir', 'kelamin', 'alamat', 'idkelas', 'foto', 'password', 'nilaiTugas', 'nilaiUjian', 'nilaiAkhir'];
    protected $primaryKey = 'nis';
    protected $validationMessages = [
        'nis' => [
            'is_unique' => 'Siswa dengan NIS tersebut sudah ada'
        ],
        'nisn' => [
            'is_unique' => 'Siswa dengan NISN tersebut sudah ada'
        ]
    ];
}