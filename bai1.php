<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $n = rand(1, 100);
        echo "N = " . $n . "<br>";
        echo "Các số chẵn từ 1 đến N: <br>";
        for ($i = 1; $i <= $n; $i++) {
            if ($i % 2 == 0) {
                echo $i . " ";
            }
        }
    ?>
</body>
</html>
