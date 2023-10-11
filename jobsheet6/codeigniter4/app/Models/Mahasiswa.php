<?php 

namespace App\Models;
use CodeIgniter\Model;

class Mahasiswa extends Model {
    protected $table = "mahasiswa";
    protected $primaryKey = "id";
    protected $allowedFields = ["nim", "nama", "alamat"];
}