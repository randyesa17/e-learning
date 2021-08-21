<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table = 'soal';
    protected $allowedFields = ['kodeujian', 'soal', 'gambar', 'pilA', 'pilB', 'pilC', 'pilD', 'kunci'];
    protected $primaryKey = 'idsoal';
}