<?php

include '../../config.php';
include '../../controllers/MahasiswaController.php';

$database = new Database;
$db = $database->getKoneksi();

$mhController = new MahasiswaController($db);


if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];


    $result = $mhController->updateMahasiswa($id, $nim, $nama, $alamat);

    if ($result) {
        session_start();
        $_SESSION['edit'] = 'success';
        header('Location: /PWEB2/jobsheet5/mahasiswa');

        exit();
    } else {
        header('Location: /PWEB2/jobsheet5/tambahMhs');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>

    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php foreach ($mhController->getMahasiswa($_GET['id']) as $mahasiswa) { ?>
        <div style="display: flex; justify-content: center; align-items: center;">
            <div class="pt-5" style="width: 75%;">
                <div style="position: absolute; top: 40px; right: 50px;">
                    <?php if (isset($_GET['message']) && $_GET['message'] == "true") { ?>
                        <div class="alert alert-success d-flex align-items-center" role="alert" style="width: fit-content;">
                            <i data-feather="check-circle"></i>
                            <div style="margin-left: 20px;">
                                Data mahasiswa berhasil diubah
                            </div>
                        </div>

                    <?php
                        header("refresh:2; url=mahasiswa.php");
                    } ?>
                </div>

                <h3>Edit Mahasiswa</h3>
                <form style="margin-top: 30px;" action="" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">NIM</label>
                        <input type="hidden" class="form-control" id="exampleFormControlInput1" name="id" value="<?php echo $mahasiswa['id'] ?>">
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="nim" value="<?php echo $mahasiswa['nim'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" value="<?php echo $mahasiswa['nama'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"><?php echo $mahasiswa['alamat'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="mahasiswa" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    <?php } ?>

    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>