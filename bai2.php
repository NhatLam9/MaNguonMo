<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BangCuuChuong_65131638</title>
</head>
<body>
<?php
    for ($i = 1; $i <= 10; $i++) {
        echo "BẢNG CỬU CHƯƠNG $i <br>";

        for ($j = 1; $j <= 10; $j++) {
        echo "$i x $j = " . ($i * $j) . "<br>";
        }

        echo "<br>";
    }
?>
</body>
</html>