<?php

include "../../classes/database.php";

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
    <div style="display: flex; justify-content: center; align-items: center;">
        <div style="width: 75%; margin-top: 50px;">
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
                                <a style="text-decoration: none;" href="proses_mhs.php?aksi=hapus&id=<?php echo $mahasiswa['id'] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                <?php
                    }
                } ?>
            </table>

            <?php if (empty($db->getMahasiswa())) { ?>
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