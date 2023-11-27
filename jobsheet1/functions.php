<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    if (isset($_POST['bilangan1'])) {
        $bil1 = $_POST['bilangan1'];
        $bil2 = $_POST['bilangan2'];

        function penjumlahan($bil1, $bil2)
        {
            return "Hasilnya = " . $bil1 + $bil2;
        }
    }
    ?>

    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-top: 100px;">
        <h3 style="margin-bottom: 50px;">Penjumlahan</h3>
        <div class="input-group mb-3" style="width: 50%;">
            <form action="/PWEB2/jobsheet1/functions.php" method="post" style="width: 100%; display: flex; gap: 10px;">
                <input name="bilangan1" type="number" class="form-control" placeholder="bilangan1" aria-label="bilangan1">
                <span class="input-group-text">+</span>
                <input name="bilangan2" type="number" class="form-control" placeholder="bilangan2" aria-label="bilangan2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <?php echo penjumlahan($bil1, $bil2); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>