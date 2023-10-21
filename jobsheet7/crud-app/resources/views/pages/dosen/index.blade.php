@extends('layouts.app')

@section('title', 'Dosen')

@section('content')
    <h3>Data Dosen</h3>
    <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary mt-3 mb-4">Tambah
        Dosen
        <i style="margin-left: 5px;" data-feather="plus-circle"></i></button>
    <table id="example" class="table table-striped" style="width: 100%;">
        <thead>
            <tr>
                <th>No</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
                if (!empty($dosen)) {
                    $no = 1;
                    foreach ($dosen as $dosens) { ?>
            <tr>
                <td style="vertical-align: middle;"><?php echo $no++; ?></td>
                <td style="vertical-align: middle;"><?php echo $dosens['nidn']; ?></td>
                <td style="vertical-align: middle;"><?php echo $dosens['nama']; ?></td>
                <td style="vertical-align: middle;"><?php echo $dosens['alamat']; ?></td>
                <td style="vertical-align: middle;">
                    <a button type="button" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $dosens['id']; ?>"
                        class="btn btn-warning">Edit</a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $dosens['id']; ?>"
                        class="btn btn-danger">Hapus</button>
                </td>
            </tr>

            <div class="modal fade" id="editModal<?php echo $dosens['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModalLabel">Edit Dosen</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/dosen/<?php echo $dosens['id']; ?>" method="post">
                            @method('PUT')
                            @csrf
                            <div class="modal-body ps-4 pe-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">NIDN</label>
                                    <input type="number" class="form-control" id="validationServerUsernameFeedback"
                                        name="nidn" value="<?php echo $dosens['nidn']; ?>">
                                    <input type="hidden" class="form-control" id="validationServerUsernameFeedback"
                                        name="id" value="<?php echo $dosens['id']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="validationServerUsernameFeedback"
                                        name="nama" value="<?php echo $dosens['nama']; ?>">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="validationServerUsernameFeedback" rows="3" name="alamat"><?php echo $dosens['alamat']; ?></textarea>
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

            <div class="modal fade" id="exampleModal<?php echo $dosens['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                            <a style="text-decoration: none;" href="dosen/<?php echo $dosens['id']; ?>"
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
                    <h1 class="modal-title fs-5" id="addModalLabel">Tambah Dosen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    @csrf
                    <div class="modal-body ps-4 pe-4">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">NIDN</label>
                            <input type="number" class="form-control" id="validationServerUsernameFeedback"
                                name="nidn" value="{{ old('nidn') }}">
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