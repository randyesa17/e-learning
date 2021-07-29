<?php

namespace App\Models;

use CodeIgniter\Model;

class RuangKelasModel extends Model
{
    protected $table = 'ruangkelas';
    protected $allowedFields = ['koderuang', 'namaruang', 'idmapel', 'idkelas', 'nip', 'nis'];
    protected $primaryKey = 'koderuang';
}