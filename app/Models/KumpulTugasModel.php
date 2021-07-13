<?php namespace App\Models;

use CodeIgniter\Model;

class KumpulTugasModel extends Model
{
    protected $table = 'kumpulantugas';
    protected $allowedFields = ['kodetugas', 'kodekelas', 'nis', 'file'];
    protected $primaryKey = 'no';
}