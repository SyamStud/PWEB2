<?php 

include_once "../../models/Dosen.php";


class DosenController {
    private $model;

    public function __construct($db)
    {
        $this->model = new Dosen($db);
    }

    public function getAllDosen()
    {
        return $this->model->getAllDosen();
    }
    public function getDosen($id)
    {
        return $this->model->getDosen($id);
    }

    public function createDosen($nidn, $nama, $alamat)
    {
        return $this->model->createDosen($nidn, $nama, $alamat);
    }

    public function updateDosen($id, $nidn, $nama, $alamat)
    {
        return $this->model->updateDosen($id, $nidn, $nama, $alamat);
    }

    public function deleteDosen($id)
    {
        return $this->model->deleteDosen($id);
    }
}
