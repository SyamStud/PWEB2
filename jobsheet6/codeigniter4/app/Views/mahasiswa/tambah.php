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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div style="display: flex; justify-content: center; align-items: center;">
        <div class="pt-5" style="width: 80%;">
            <h3>Tambah Mahasiswa</h3>
            <form style="margin-top: 30px;" action="tambah" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">NIM</label>
                    <input type="number" class="form-control <?php if ($validation->hasError('nim')) {
                                                                    echo 'is-invalid';
                                                                }; ?>" id="validationServerUsernameFeedback" name="nim" value="<?php echo $input['nim'] ?>">
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        NIM wajib diisi.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control <?php if ($validation->hasError('nama')) {
                                                                echo 'is-invalid';
                                                            }; ?>" id="validationServerUsernameFeedback" name="nama" value="<?php echo $input['nama'] ?>">
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        Nama wajib diisi.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                    <textarea class="form-control <?php if ($validation->hasError('alamat')) {
                                                        echo 'is-invalid';
                                                    }; ?>" id="validationServerUsernameFeedback" rows="3" name="alamat"><?php echo $input['alamat'] ?></textarea>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        Alamat wajib diisi.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="mahasiswa" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>


    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>