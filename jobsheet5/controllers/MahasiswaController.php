<?php 

include_once "../../models/Mahasiswa.php";


class MahasiswaController {
    private $model;

    public function __construct($db)
    {
        $this->model = new Mahasiswa($db);
    }

    public function getAllMahasiswa()
    {
        return $this->model->getAllMahasiswa();
    }
    public function getMahasiswa($id)
    {
        return $this->model->getMahasiswa($id);
    }

    public function createMahasiswa($nim, $nama, $alamat)
    {
        return $this->model->createMahasiswa($nim, $nama, $alamat);
    }

    public function updateMahasiswa($id, $nim, $nama, $alamat)
    {
        return $this->model->updateMahasiswa($id, $nim, $nama, $alamat);
    }

    public function deleteMahasiswa($id)
    {
        return $this->model->deleteMahasiswa($id);
    }
}
