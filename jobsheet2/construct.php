<?php 

class Mahasiswa
{
    public $nim = "220102046";
    public $nama = "Syam Chaidayatullah";
    public $alamat = "Tangerang";

    public function __construct()
    {
        echo "Saya mahasiswa Teknik Informatika <br/>";
    }

    public function tampil_nama() {
        return "Nama saya adalah $this->nama";
    }

    public function tampil_alamat()
    {
        return "Alamat saya di $this->alamat";
    }

    public function tampil_mahasiswa()
    {
        return "Tidak akan menjadi joki atau menggunakan jasa joki sampai lulus kuliah";
    }

    public function __destruct()
    {
        echo "Saya berkuliah di Politeknik Negeri Cilacap <br/>";
    }
}

echo "<h3>Class Mahasiswa</h3>";

$syam = new Mahasiswa;
echo $syam->tampil_nama() . "<br />";
echo $syam->tampil_alamat() . "<br />" ;
echo $syam->tampil_mahasiswa() . "<br />" ;
