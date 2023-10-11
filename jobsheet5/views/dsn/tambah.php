<?php

include '../../config.php';
include '../../controllers/DosenController.php';
include '../../index.php';

$database = new Database;
$db = $database->getKoneksi();

if (isset($_POST['nidn'])) {
    $nidn = $_POST['nidn'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $dsnController = new DosenController($db);
    $result = $dsnController->createDosen($nidn, $nama, $alamat);

    if ($result) {
        session_start();
        $_SESSION['tambah'] = 'success';

        header('Location:dosen');
        exit();
    } else {
        header('Location:tambahDsn');
    }
}
?>

    <div style="height: 90vh; width: 100%; display: flex; justify-content: center; align-items: center;">
        <div style="width: 80%;">
            <h3>Tambah Dosen</h3>
            <form style="margin-top: 30px;" action="tambahDsn" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">NIDN</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="nidn">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nama">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="dosen" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>


    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>