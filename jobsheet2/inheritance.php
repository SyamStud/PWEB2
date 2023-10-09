<?php 

class Manusia {
    public $nama_saya;

    public function panggil_nama()
    {
        return "(Class Manusia) Nama saya $this->nama_saya";
    }
}

class Mahasiswa extends Manusia {
    public $nama_mahasiswa;

    public function panggil_mahasiswa()
    {
        return "(Class Mahasiswa) Nama saya $this->nama_mahasiswa";
    }
}

$syam = new Mahasiswa();
$syam->nama_saya = "Syam";
$syam->nama_mahasiswa = "Syam Chaidayatullah";

echo $syam->panggil_nama() . "<br />";
echo $syam->panggil_mahasiswa() . "<br />";

?>