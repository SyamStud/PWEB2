<?php 

class Mahasiswa
{
    private $nim = "220102046";
    private $nama = "Syam Chaidayatullah";
    private $alamat = "Tangerang";

    public function tampil_nama() {
        return $this->nama;
    }

    public function tampil_alamat()
    {
        return $this->alamat;
    }
}

echo "<h3>Class Mahasiswa</h3>";

$syam = new Mahasiswa;
echo $syam->tampil_nama() . "<br />";
echo $syam->tampil_alamat() . "<br />" ;

class Dosen1
{
    private $nidn = "220102046";
    private $nama = "Syam Chaidayatullah";
    private $prodi = "Teknik Informatika";

    public function tampil_nama() {
        return $this->nama;
    }

    public function tampil_prodi()
    {
        return $this->prodi;
    }
}

echo "<br /><h3>Class Dosen</h3>";

$syam2 = new Dosen1;
echo $syam2->tampil_nama() . "<br />";
echo $syam2->tampil_prodi() . "<br />" ;