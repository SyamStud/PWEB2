<?php 

include '../../classes/database.php';
$db = new Database;

$aksi = $_GET['aksi'];
if (isset($_POST['nidn'])) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    $nidn = $_POST['nidn'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
}

if ($aksi == "tambah") {
    $db->addDosen($nidn, $nama, $alamat);
    header('location:tampil_dsn.php');
} else if ($aksi == "update") {
    $db->editDosen($id, $nidn, $nama, $alamat);
    header('location:tampil_dsn.php');
} else if ($aksi == "hapus") {
    $db->deleteDosen($_GET['id']);
    header('location:tampil_dsn.php');
}
