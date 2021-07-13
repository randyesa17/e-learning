<?php namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
    protected $table = 'tugas';
    protected $allowedFields = ['kodetugas', 'kodekelas', 'perintah'];
    protected $primaryKey = 'kodetugas';
}