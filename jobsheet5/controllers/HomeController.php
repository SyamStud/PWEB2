<?php 

class HomeController {
    public function home()
    {
        header("Location:https://localhost/PWEB2/jobsheet5/index.php");
    }
    public function mahasiswa()
    {
        header("Location:https://localhost/PWEB2/jobsheet5/views/mahasiswa/index.php");
    }
    public function tambahMahasiswa()
    {
        header("Location:https://localhost/PWEB2/jobsheet5/views/mahasiswa/tambah.php");
    }
    public function editMahasiswa()
    {
        header("Location:https://localhost/PWEB2/jobsheet5/views/mahasiswa/edit.php");
    }
    public function hapusMahasiswa()
    {
        header("Location:https://localhost/PWEB2/jobsheet5/views/mahasiswa/hapus.php");
    }
    public function dosen()
    {
        header("Location:https://localhost/PWEB2/jobsheet5/views/dosen/index.php");
    }
    public function tambahDosen()
    {
        header("Location:https://localhost/PWEB2/jobsheet5/views/dosen/tambah.php");
    }
    public function editDosen()
    {
        header("Location:https://localhost/PWEB2/jobsheet5/views/dosen/edit.php");
    }
    public function hapusDosen()
    {
        header("Location:https://localhost/PWEB2/jobsheet5/views/dosen/hapus.php");
    }
}
