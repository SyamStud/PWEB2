<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Looping</title>
</head>

<body>
    <?php
    echo "Bilangan genap dari 1 hingga 10 <br/>";
    for ($i = 2; $i <= 10; $i += 2) {
        echo $i . " ";
    }

    echo "<br/><br/> Bilangan ganjil dari 1 hingga 10 <br/>";
    $i = 1;
    while ($i <= 10) {
        echo $i . " ";

        $i += 2;
    }

    echo "<br/><br/> Bilangan prima dari 1 hingga 20 <br/>";
    $angka = 1;

    do {
        $isPrime = true;
        $i = 2;

        do {
            if ($angka % $i == 0) {
                $isPrime = false;
            }
            $i++;
        } while ($i <= sqrt($angka));

        if ($isPrime) {
            echo $angka . " ";
        }

        $angka++;
    } while ($angka <= 20);
    ?>
</body>

</html>