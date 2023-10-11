<?php

class Dosen
{
    private $koneksi;

    public function __construct($db)
    {
        $this->koneksi = $db;
    }

    public function getDosen($id)
    {
        $query = "SELECT * FROM dosen where id = '$id'";

        $result = mysqli_query($this->koneksi, $query);

        while ($d = mysqli_fetch_array($result)) {
            $hasil[] = $d;
        }

        return $hasil;
    }

    public function getAllDosen()
    {
        $hasil = array();

        $data = mysqli_query($this->koneksi, "SELECT * FROM dosen");
        while ($d = mysqli_fetch_array($data)) {
            if (isset($d)) {
                $hasil[] = $d;
            }
        }

        return $hasil;
    }

    public function createDosen($nidn, $nama, $alamat)
    {
        $query = "INSERT INTO dosen VALUES (0, '$nidn', '$nama', '$alamat')";

        $result = mysqli_query($this->koneksi, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateDosen($id, $nidn, $nama, $alamat)
    {
        $query = "UPDATE dosen SET nama = '$nama', nidn = '$nidn', alamat = '$alamat' WHERE id = $id";

        $result = mysqli_query($this->koneksi, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteDosen($id)
    {
        $query = "DELETE FROM dosen WHERE id = $id";

        $result = mysqli_query($this->koneksi, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
