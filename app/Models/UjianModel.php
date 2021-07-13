<?php namespace App\Models;

use CodeIgniter\Model;

class UjianModel extends Model
{
    protected $table = 'ujian';
    protected $allowedFields = ['kodeujian', 'kodekelas', 'tgl'];
    protected $primaryKey = 'kodeujian';
}