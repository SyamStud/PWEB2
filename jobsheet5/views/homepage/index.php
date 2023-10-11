<?php

include '../../config.php';
include '../../controllers/MahasiswaController.php';
include '../../controllers/DosenController.php';
include '../../index.php';

$database = new Database;
$db = $database->getKoneksi();

$mhsController = new MahasiswaController($db);
$dataMahasiswa = $mhsController->getAllMahasiswa();

$dsnController = new DosenController($db);
$dataDosen = $dsnController->getAllDosen();

?>
<div style="padding: 40px 80px;">
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 35px;"><?php echo count($dataDosen) ?> Dosen</h5>
                    <p class="card-text">Data dosen aktif Politeknik Negeri Cilacap</p>
                    <a href="dosen" class="btn btn-primary">Selengkapnya ></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 35px;"><?php echo count($dataMahasiswa) ?> Mahasiswa</h5>
                    <p class="card-text">Data mahasiswa aktif Politeknik Negeri Cilacap</p>
                    <a href="mahasiswa" class="btn btn-primary">Selengkapnya ></a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>