<?php namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $allowedFields = ['kodekelas', 'namakelas', 'idmapel', 'idjurusan', 'nip', 'nis'];
    protected $primaryKey = 'kodekelas';
}