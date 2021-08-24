<?php

namespace App\Models;

use CodeIgniter\Model;

class PengerjaanModel extends Model
{
    protected $table = 'pengerjaanujian';
    protected $allowedFields = ['nis','kodeujian', 'tglselesai', 'nilai'];
    protected $primaryKey = 'no';
}