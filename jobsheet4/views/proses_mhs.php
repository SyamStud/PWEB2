<?php 

include '../classes/database.php';
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
    header('location:tambah_mhs.php?message=true');
} else if ($aksi == "update") {
    $db->editMahasiswa($id, $nim, $nama, $alamat);
    header('location:edit_mhs.php?id=' . $id . '&message=true');
} else if ($aksi == "hapus") {
    $db->deleteMahasiswa($_GET['id']);
    header('location:mahasiswa.php?message=true');
}

?>