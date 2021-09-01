<?php namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'nilai';
    protected $allowedFields = ['nis', 'idmapel', 'nilaiTugas', 'nilaiUTS', 'nilaiUAS', 'nilaiAkhir'];
    protected $primaryKey = 'no';
}