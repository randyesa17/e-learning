<?php namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table = 'soal';
    protected $allowedFields = ['kodeujian', 'no', 'soal', 'pilA', 'pilB', 'pilC', 'pilD', 'kunci'];
}