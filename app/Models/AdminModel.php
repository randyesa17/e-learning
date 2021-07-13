<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $allowedFields = ['idadmin', 'nama', 'username', 'password'];
    protected $primaryKey = 'idadmin';
}