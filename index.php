<?php
$num = '';
if (isset($_POST['num'])) {
    $num = $_POST['num'];
}

function number($num)
{
    $teklik = [
        0 => "sıfır", 1 => "bir", 2 => "iki", 3 => "üç", 4 => "dörd", 5 => "beş", 6 => "altı", 7 => "yeddi", 8 => "səkkiz", 9 => "doqquz"
    ];
    $onluq = [
        10 => "on", 20 => "iyirmi", 30 => "otuz", 40 => "qırx", 50 => "əlli", 60 => "altmış", 70 => "yetmiş", 80 => "səksən", 90 => "doxsan"
    ];
    $yuzluk = [
        100 => "yüz", 200 => "iki yüz", 300 => "üç yüz", 400 => "dörd yüz", 500 => "beş yüz", 600 => "altı yüz", 700 => "yeddi yüz", 800 => "səkkiz yüz"
        , 900 => "doqquz yüz"
    ];
    $minlik = [
        1000 => "min", 2000 => "iki min", 3000 => "üç min", 4000 => "dörd min", 5000 => "beş min", 6000 => "altı min", 7000 => "yeddi min", 8000 => "səkkiz min"
        , 9000 => "doqquz min"
    ];


    if ($num < 10) {
        return $teklik[$num];
    }


    if ($num < 100) {
        $ten = floor($num / 10) * 10;
        $unit = $num % 10;
        return $onluq[$ten] . ($unit > 0 ? " " . $teklik[$unit] : "");
    }


    if ($num < 1000) {
        $hundred = floor($num / 100);
        $rest = $num % 100;
        return $yuzluk[$hundred * 100] . " " . number($rest);
    }

    if ($num < 10000) {
        $thousand = floor($num / 1000);
        $rest = $num % 1000;
        return $minlik[$thousand * 1000] . ($rest > 0 ? " " . number($rest) : "");
    }  else {
        echo "Dəyər 10000-dən artıq olmamalıdır";
    }

}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
            integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
          integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<form action="" method="post">
    <input type="number" name="num" value="<?= $num; ?>">
    <button type="submit" class="btn btn-primary">Çevir</button>
</form>

Nəticə: <?php
if ($num !== '') {
    echo number((int)$num);
}
?>
</body>
</html>