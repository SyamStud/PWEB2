<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $kalimat = "Selamat belajar PHP!";

    echo "Mengubah huruf menjadi huruf kapital <br/>";
    echo strtoupper($kalimat) . "<br/><br/>";
    echo "Mengubah huruf menjadi huruf kecil <br/>";
    echo strtolower($kalimat) . "<br/><br/>";
    echo "Memotong string <br/>";
    echo substr($kalimat, 0, 3);
    ?>
</body>

</html>