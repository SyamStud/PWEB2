<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branching</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div style="display: flex; justify-content: center; align-items: center; width: 100%; margin-top: 100px;">
        <div style="width: 50%; ">
            <form action="/PWEB2/jobsheet1/branching.php" method="post" class="row g-3">
                <div class="input-group mb-3">
                    <input name="angka" type="text" class="form-control" placeholder="Masukkan Angka" aria-label="Masukkan Angka" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['angka'])) {
        $angka = $_POST['angka'];

        if ($angka > 0) {
            echo "<script>alert('$angka adalah bilangan positif');</script>";
        } else {
            echo "<script>alert('$angka adalah bilangan negatif');</script>";
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>