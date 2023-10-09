<?php 

class Mahasiswa
{
    public $nama;
    private $nim = "220102046";

    public function tampilkan_nama() {
        return "Nama saya $this->nama";
    }

    public function tampilkan_nim()
    {
        return "NIM saya $this->nim";
    }
}

echo "<h3>Class Mahasiswa</h3>";

$syam = new Mahasiswa;
$syam->nama = "Syam Chaidayatullah";

echo $syam->tampilkan_nama() . "<br />";
echo $syam->tampilkan_nim() . "<br />" ;
