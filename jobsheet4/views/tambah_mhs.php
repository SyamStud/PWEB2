<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>

    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div style="display: flex; justify-content: center; align-items: center;">
        <div class="pt-5" style="width: 75%;">
            <div style="position: absolute; top: 40px; right: 50px;">
                <?php if (isset($_GET['message']) && $_GET['message'] == "true") { ?>
                    <div class="alert alert-success d-flex align-items-center" role="alert" style="width: fit-content;">
                        <i data-feather="check-circle"></i>
                        <div style="margin-left: 20px;">
                            Data mahasiswa berhasil ditambahkan
                        </div>
                    </div>

                <?php
                    header("refresh:2; url=mahasiswa.php");
                } ?>
            </div>

            <h3>Tambah Mahasiswa</h3>
            <form style="margin-top: 30px;" action="/PWEB2/jobsheet4/views/proses_mhs.php?aksi=tambah" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">NIM</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="nim">
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
                <button type="submit" class="btn btn-secondary">Batal</button>
            </form>
        </div>
    </div>


    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>