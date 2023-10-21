@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('content')
    <h3>Data Mahasiswa</h3>
    <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary mt-3 mb-4">Tambah
        Mahasiswa
        <i style="margin-left: 5px;" data-feather="plus-circle"></i></button>
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
                            <td style="vertical-align: middle;"><?php echo $no++; ?></td>
                            <td style="vertical-align: middle;"><?php echo $mahasiswas['nim']; ?></td>
                            <td style="vertical-align: middle;"><?php echo $mahasiswas['nama']; ?></td>
                            <td style="vertical-align: middle;"><?php echo $mahasiswas['alamat']; ?></td>
                            <td style="vertical-align: middle;">
                                <a button type="button" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $mahasiswas['id']; ?>"
                                    class="btn btn-warning">Edit</a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $mahasiswas['id']; ?>"
                                    class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>

                        <div class="modal fade" id="editModal<?php echo $mahasiswas['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Mahasiswa</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/mahasiswa/<?php echo $mahasiswas['id']; ?>" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-body ps-4 pe-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">NIM</label>
                                                <input type="number" class="form-control" id="validationServerUsernameFeedback"
                                                    name="nim" value="<?php echo $mahasiswas['nim']; ?>">
                                                <input type="hidden" class="form-control" id="validationServerUsernameFeedback"
                                                    name="id" value="<?php echo $mahasiswas['id']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="validationServerUsernameFeedback"
                                                    name="nama" value="<?php echo $mahasiswas['nama']; ?>">

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="validationServerUsernameFeedback" rows="3" name="alamat"><?php echo $mahasiswas['alamat']; ?></textarea>
                                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                    Alamat wajib diisi.
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal<?php echo $mahasiswas['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
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
                                        <a style="text-decoration: none;" href="mahasiswa/<?php echo $mahasiswas['id']; ?>"
                                            class="btn btn-danger">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } ?>
        </tbody>
    </table>
@endsection

@section('modal')
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Tambah Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    @csrf
                    <div class="modal-body ps-4 pe-4">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">NIM</label>
                            <input type="number" class="form-control" id="validationServerUsernameFeedback"
                                name="nim" value="{{ old('nim') }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="validationServerUsernameFeedback"
                                name="nama" value="{{ old('nama') }}">

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                            <textarea class="form-control" id="validationServerUsernameFeedback" rows="3" name="alamat">{{ old('alamat') }}</textarea>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                Alamat wajib diisi.
                            </div>
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
@endsection