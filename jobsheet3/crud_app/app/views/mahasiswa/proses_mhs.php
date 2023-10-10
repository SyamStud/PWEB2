<?php 

include '../../classes/database.php';
$db = new Database;

$aksi = $_GET['aksi'];
if (isset($_POST['nim'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
}

if ($aksi == "tambah") {
    $db->addMahasiswa($nim, $nama, $alamat);
    header('location:tampil_mahasiswa.php');
} else if ($aksi == "update") {
    $db->editMahasiswa($id, $nim, $nama, $alamat);
    header('location:tampil_mahasiswa.php');
} else if ($aksi == "hapus") {
    $db->deleteMahasiswa($_GET['id']);
    header('location:tampil_mahasiswa.php');
}

?>