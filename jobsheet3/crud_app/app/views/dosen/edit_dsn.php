<?php

include "../../classes/database.php";

$db = new Database;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dosen</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php foreach ($db->edit($_GET['id']) as $dosen) { ?>
        <div style="display: flex; justify-content: center; align-items: center;">
            <div style="width: 75%; margin-top: 50px;">
                <h3>Edit Dosen</h3>
                <form style="margin-top: 30px;" action="/PWEB2/jobsheet3/crud_app/app/views/dosen/proses_dsn.php?aksi=update" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">NIDN</label>
                        <input type="hidden" class="form-control" id="exampleFormControlInput1" name="id" value="<?php echo $dosen['id'] ?>">
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="nidn" value="<?php echo $dosen['nidn'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" value="<?php echo $dosen['nama'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"><?php echo $dosen['alamat'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="submit" class="btn btn-secondary">Batal</button>
                </form>
            </div>
        </div>
    <?php } ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>