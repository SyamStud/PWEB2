<?php

include '../../config.php';
include '../../controllers/DosenController.php';
include '../../index.php';

$database = new Database;
$db = $database->getKoneksi();

$dsnController = new DosenController($db);


if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nidn = $_POST['nidn'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];


    $result = $dsnController->updateDosen($id, $nidn, $nama, $alamat);

    if ($result) {
        session_start();
        $_SESSION['edit'] = 'success';
        header('Location: /PWEB2/jobsheet5/dosen');

        exit();
    } else {
        header('Location:tambahDsn');
    }
}
?>

    <?php foreach ($dsnController->getDosen($_GET['id']) as $dosen) { ?>
        <div style="height: 90vh; width: 100%; display: flex; justify-content: center; align-items: center;">
            <div style="width: 80%;">
                <h3>Edit Dosen</h3>
                <form style="margin-top: 30px;" action="" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">NIDN</label>
                        <input type="hidden" class="form-control" id="exampleFormControlInput1" name="id" value="<?php echo $dosen['id'] ?>">
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="nidn" value="<?php echo $dosen['nidn'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" value="<?php echo $dosen['nama'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"><?php echo $dosen['alamat'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="dosen" class="btn btn-secondary">Batal</a>
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