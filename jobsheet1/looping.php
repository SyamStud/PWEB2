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
    $num = 1;

    function isPrime($num)
    {
        if ($num <= 1) {
            return false;
        }

        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i === 0) {
                return false;
            }
        }
        return true;
    }

    for ($angka = 1; $angka <= 20; $angka++) {
        if (isPrime($angka)) {
            echo $angka . " ";
        }
    }
    ?>
</body>

</html>