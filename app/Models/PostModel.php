<?php namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $allowedFields = ['kodekelas', 'idmateri', 'tema', 'tipe', 'file', 'kodetugas', 'perintah', 'kodeujian', 'tglujian'];
    protected $primaryKey = 'idpost';
}