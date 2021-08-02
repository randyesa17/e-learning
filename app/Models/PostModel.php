<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $allowedFields = ['koderuang', 'idmateri', 'tema', 'tipe', 'file', 'kodetugas', 'perintah', 'kodeujian', 'jenisujian', 'tglujian'];
    protected $primaryKey = 'idpost';
}