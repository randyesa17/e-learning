<?php namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $table = 'mapel';
    protected $allowedFields = ['mapel'];
    protected $primaryKey = 'idmapel';
    protected $validationMessages = [
        'mapel' => [
            'is_unique' => 'Mata Pelajaran sudah ada'
        ]
    ];
}