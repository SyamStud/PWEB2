<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>

    <style>
        <?php include "style.css" ?>
    </style>
    <script>
        <?php include "script.js" ?>
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
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
</head>

<body id="body-pd">
    <!-- ALERT -->
    <?php

    if (isset($_SESSION["message"])) : ?>
        <?php if ($_SESSION["message"] === "addSuccess") : ?>
            <script>
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil ditambah'
                })
            </script>
        <?php elseif ($_SESSION["message"] === "editSuccess") : ?>
            <script>
                Toast.fire({
                    icon: "success",
                    title: "Data berhasil diedit"
                });
            </script>
        <?php elseif ($_SESSION["message"] === "deleteSuccess") : ?>
            <script>
                Toast.fire({
                    icon: "success",
                    title: "Data berhasil dihapus"
                });
            </script>
        <?php endif ?>
    <?php endif ?>
    <!-- <?php unset($_SESSION["message"]) ?> -->


    <header class="header" id="header">
        <div class="header_toggle"><i class="bx bx-menu" id="header-toggle"></i></div>
        <div class="header_img"><img src="https://i.imgur.com/hczKIze.jpg" alt="" /></div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a style="text-decoration: none;" href="#" class="nav_logo"> <i class="bx bx-layer nav_logo-icon"></i> <span class="nav_logo-name">BBBootstrap</span> </a>
                <div class="nav_list">
                    <a style="text-decoration: none;" style="text-decoration: none;" href="#" class="nav_link active"> <i class="bx bx-grid-alt nav_icon"></i> <span class="nav_name">Dashboard</span> </a>
                    <a style="text-decoration: none;" style="text-decoration: none;" href="#" class="nav_link"> <i class="bx bx-archive nav_icon"></i> <span class="nav_name">Produk</span> </a>
                    <a style="text-decoration: none;" href="#" class="nav_link"> <i class="bx bx-bar-chart-alt-2 nav_icon"></i> <span class="nav_name">Stats</span> </a>
                </div>
            </div>
            <a style="text-decoration: none;" href="#" class="nav_link"> <i class="bx bx-log-out nav_icon"></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>

    <!--Container Main start-->
    <div style="margin-top: 100px;">
        <h3>Daftar Produk</h3>
        <button type="button" class="btn btn-primary d-flex justify-content-cente align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Produk <i class="bx bx-plus-circle nav_icon"></i></button>
        <table class="table table-striped">
            <thead>
                <th>KODE PRODUK</th>
                <th>NAMA PRODUK</th>
                <th>HARGA</th>
                <th>AKSI</th>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr style="vertical-align: middle;">
                        <td><?= $product->kode_produk ?></td> 
                        <td><?= $product->nama ?></td>
                        <td><?= $product->harga ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $product->id ?>">Edit</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $product->id ?>">Hapus</button>
                        </td>

                        <div class="modal fade" id="editModal<?= $product->id ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="products/edit">
                                            <div class="mb-3">
                                                <label for="kode_produk" class="form-label">Kode Produk</label>
                                                <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="<?= $product->kode_produk ?>">
                                                <input type="hidden" class="form-control" id="kode_produk" name="id" value="<?= $product->id ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $product->nama ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="harga">Harga</label>
                                                <input type="number" class="form-control" id="harga" name="harga" value="<?= $product->harga ?>">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="hapusModal<?= $product->id ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="products/add">
                        <div class="mb-3">
                            <label for="kode_produk" class="form-label">Kode Produk</label>
                            <input type="text" class="form-control" id="kode_produk" name="kode_produk">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>