<?php

include '../../config.php';
include '../../controllers/DosenController.php';

$database = new Database;
$db = $database->getKoneksi();

$dsnController = new DosenController($db);


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $dsnController->deleteDosen($id);

    if ($result) {
        session_start();
        $_SESSION['hapus'] = 'success';
        header('Location:/PWEB2/jobsheet5/dosen');

        exit();
    } else {
        header('Location:/PWEB2/jobsheet5/dosen');
    }
}
