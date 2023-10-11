<?php
session_start();

include '../../config.php';
include '../../controllers/MahasiswaController.php';
include '../../index.php';

$database = new Database;
$db = $database->getKoneksi();

$mhController = new MahasiswaController($db);
$dataMahasiswa = $mhController->getAllMahasiswa();


?>
<div style="position: absolute; top: 90px; right: 50px;">
    <?php if (isset($_SESSION['tambah']) &&  $_SESSION['tambah'] == "success") { ?>
        <script>
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil ditambah'
            })
        </script>
    <?php
        unset($_SESSION['tambah']);
    } else if (isset($_SESSION['edit']) &&  $_SESSION['edit'] == "success") { ?>
        <script>
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil diedit'
            })
        </script>
    <?php
        unset($_SESSION['edit']);
    } else if (isset($_SESSION['hapus']) &&  $_SESSION['hapus'] == "success") { ?>
        <script>
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil dihapus'
            })
        </script>
    <?php
        unset($_SESSION['hapus']);
    } ?>
</div>

<div style="display: flex; justify-content: center; align-items: center;">
    <div class="pt-4" style="width: 85%;">
        <h3>Data Mahasiswa</h3>
        <a href="tambahMhs" class="btn btn-primary">Tambah Mahasiswa <i style="margin-left: 5px;" data-feather="plus-circle"></i></a>
        <table class="table table-striped" style="margin-top: 20px;">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>

            <?php

            if (!empty($dataMahasiswa)) {
                $no = 1;
                foreach ($dataMahasiswa as $mahasiswa) { ?>
                    <tr>
                        <td style="vertical-align: middle;"><?php echo $no++ ?></td>
                        <td style="vertical-align: middle;"><?php echo $mahasiswa['nim'] ?></td>
                        <td style="vertical-align: middle;"><?php echo $mahasiswa['nama'] ?></td>
                        <td style="vertical-align: middle;"><?php echo $mahasiswa['alamat'] ?></td>
                        <td style="vertical-align: middle;">
                            <a style="text-decoration: none;" href="editMhs/<?php echo $mahasiswa['id'] ?>" class="btn btn-warning">Edit</a>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>

                    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Anda yakin akan menghapus data ini ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <a style="text-decoration: none;" href="hapusMhs/<?php echo $mahasiswa['id'] ?>" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } ?>
        </table>

        <?php if (empty($dataMahasiswa)) { ?>
            <h5>Data Kosong</h5>
        <?php  } ?>
    </div>
</div>

<script>
    feather.replace();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>