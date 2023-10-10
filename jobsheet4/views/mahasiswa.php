<?php

include "../classes/database.php";

$db = new Database;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>

    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SIAKAD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="position: absolute; top: 90px; right: 50px;">
        <?php if (isset($_GET['message']) && $_GET['message'] == "true") { ?>
            <div class="alert alert-success d-flex align-items-center" role="alert" style="width: fit-content;">
                <i data-feather="check-circle"></i>
                <div style="margin-left: 20px;">
                    Data mahasiswa berhasil dihapus
                </div>
            </div>

        <?php
            header("refresh:1.5; url=mahasiswa.php");
        } ?>
    </div>

    <div style="display: flex; justify-content: center; align-items: center;">
        <div class="pt-5" style="width: 75%;">
            <h3>Data Mahasiswa</h3>
            <a href="tambah_mhs.php" class="btn btn-primary">Tambah Mahasiswa <i style="margin-left: 5px;" data-feather="plus-circle"></i></a>
            <table class="table table-striped" style="margin-top: 20px;">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>

                <?php

                if (!empty($db->getMahasiswa())) {
                    $no = 1;
                    foreach ($db->getMahasiswa() as $mahasiswa) { ?>
                        <tr>
                            <td style="vertical-align: middle;"><?php echo $no++ ?></td>
                            <td style="vertical-align: middle;"><?php echo $mahasiswa['nim'] ?></td>
                            <td style="vertical-align: middle;"><?php echo $mahasiswa['nama'] ?></td>
                            <td style="vertical-align: middle;"><?php echo $mahasiswa['alamat'] ?></td>
                            <td style="vertical-align: middle;">
                                <a style="text-decoration: none;" href="edit_mhs.php?id=<?php echo $mahasiswa['id'] ?>" class="btn btn-warning">Edit</a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                <?php
                    }
                } ?>
            </table>

            <?php if (empty($db->getMahasiswa())) { ?>
                <h5>Data Kosong</h5>
            <?php  } ?>

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
                            <a href="proses_mhs.php?aksi=hapus&id=<?php echo $mahasiswa['id'] ?>" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>