<?php namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
    protected $table = 'materi';
    protected $allowedFields = ['idmateri', 'tema', 'koderuang', 'tipe', 'file'];
    protected $primaryKey = 'idmateri';
}