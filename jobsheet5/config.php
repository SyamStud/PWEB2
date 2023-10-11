<?php 

class Database {
    protected $koneksi;
    protected $host = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $database = "akademik";

    public function getKoneksi()
    {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$this->koneksi) {
            die("Koneksi gagal : " . mysqli_connect_error());
        }

        return $this->koneksi;
    }
}
