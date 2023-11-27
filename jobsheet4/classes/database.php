<?php 

class Database {
    protected $koneksi;
    protected $host = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $database = "akademik";

    public function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    public function getMahasiswa()
    {
        $hasil = array();

        $data = mysqli_query($this->koneksi, "select * from mahasiswa");
        while ($d = mysqli_fetch_array($data)) {
            if (isset($d)) {
                $hasil[] = $d;
            }
        }

        return $hasil;
    }

    public function addMahasiswa($nim, $nama, $alamat)
    {
        $query = "INSERT INTO mahasiswa VALUES (0, '$nim', '$nama', '$alamat')";

        $result = mysqli_query($this->koneksi, $query);
    }

    public function edit($id)
    {
        $query = "SELECT * FROM mahasiswa where id = '$id'";

        $result = mysqli_query($this->koneksi, $query);

        while ($d = mysqli_fetch_array($result)) {
            $hasil[] = $d;
        }

        return $hasil;
    }

    public function editMahasiswa($id, $nim, $nama, $alamat)
    {
        $query = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', alamat = '$alamat' WHERE id = $id";

        $result = mysqli_query($this->koneksi, $query);
    }

    public function deleteMahasiswa($id)
    {
        $query = "DELETE FROM MAHASISWA WHERE id = $id";

        $result = mysqli_query($this->koneksi, $query);
    }

}
