<?php
class Ptn {
    protected $jenis;
    private $wilayah;

    public function setWilayah($wilayah) {
        $this->wilayah = $wilayah;
    }

    public function getJenis() {
        return $this->jenis;
    }
}

class Politeknik extends Ptn {
    private $nama;

    public function setNama($nama) {
        $this->nama = $nama;
    }

    //Menggunakan properti protected milik superclass
    public function setJenis($jenis) {
        $this->jenis = $jenis;
    }
}

$pnc = new Politeknik;
$pnc->setNama("PNC"); // Akses properti private milik subclass
$pnc->setWilayah("Cilacap"); // Akses properti private milik superclass
$pnc->setJenis("Politeknik"); // Akses properti protected milik superclass
echo $pnc->getJenis(); 