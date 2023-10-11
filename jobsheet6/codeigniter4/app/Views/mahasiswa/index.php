<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url() ?>">SIAKAD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="mahasiswa">Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="position: absolute; top: 90px; right: 50px;">
        <?php if (session()->getFlashdata('message') == "data berhasil ditambah") { ?>
            <script>
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil ditambah'
                })
            </script>
        <?php
            unset($_SESSION['tambah']);
        } else if (session()->getFlashdata('message') == "data berhasil diedit") { ?>
            <script>
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil diedit'
                })
            </script>
        <?php
            unset($_SESSION['edit']);
        } else if (session()->getFlashdata('message') == "data berhasil dihapus") { ?>
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

    <div style="display: flex; justify-content: center; align-items: center; margin-bottom:100px;">
        <div class="pt-4" style="width: 90%;">

            <h3>Data Mahasiswa</h3>
            <a href="tambah" style="margin-bottom:30px; margin-top:20px;" class="btn btn-primary">Tambah Mahasiswa <i style="margin-left: 5px;" data-feather="plus-circle"></i></a>
            <table id="example" class="table table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (!empty($mahasiswa)) {
                        $no = 1;
                        foreach ($mahasiswa as $mahasiswas) { ?>
                            <tr>
                                <td style="vertical-align: middle;"><?php echo $no++ ?></td>
                                <td style="vertical-align: middle;"><?php echo $mahasiswas['nim'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $mahasiswas['nama'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $mahasiswas['alamat'] ?></td>
                                <td style="vertical-align: middle;">
                                    <a style="text-decoration: none;" href="edit?id=<?php echo $mahasiswas['id'] ?>" class="btn btn-warning">Edit</a>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $mahasiswas['id'] ?>" class="btn btn-danger">Hapus</button>
                                </td>
                            </tr>


                            <div class="modal" id="exampleModal<?php echo $mahasiswas['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <a style="text-decoration: none;" href="hapus?id=<?php echo $mahasiswas['id'] ?>" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } ?>
                </tbody>
            </table>

            <?php if (empty($mahasiswa)) { ?>
                <h5>Data Kosong</h5>
            <?php  } ?>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>