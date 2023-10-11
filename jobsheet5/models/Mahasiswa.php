<?php

class Mahasiswa
{
    private $koneksi;

    public function __construct($db)
    {
        $this->koneksi = $db;
    }

    public function getMahasiswa($id)
    {
        $query = "SELECT * FROM mahasiswa where id = '$id'";

        $result = mysqli_query($this->koneksi, $query);

        while ($d = mysqli_fetch_array($result)) {
            $hasil[] = $d;
        }

        return $hasil;
    }

    public function getAllMahasiswa()
    {
        $hasil = array();

        $data = mysqli_query($this->koneksi, "SELECT * FROM mahasiswa");
        while ($d = mysqli_fetch_array($data)) {
            if (isset($d)) {
                $hasil[] = $d;
            }
        }

        return $hasil;
    }

    public function createMahasiswa($nim, $nama, $alamat)
    {
        $query = "INSERT INTO mahasiswa VALUES (0, '$nama', '$nim', '$alamat')";

        $result = mysqli_query($this->koneksi, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateMahasiswa($id, $nim, $nama, $alamat)
    {
        $query = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', alamat = '$alamat' WHERE id = $id";

        $result = mysqli_query($this->koneksi, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteMahasiswa($id)
    {
        $query = "DELETE FROM MAHASISWA WHERE id = $id";

        $result = mysqli_query($this->koneksi, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
