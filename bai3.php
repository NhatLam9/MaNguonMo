<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai3</title>
</head>
<body>
<?php
// Tạo số ngẫu nhiên từ -100 đến 100
$N = rand(-100, 100);
echo "N = $N <br><br>";

// Kiểm tra N có phải số dương không
if ($N > 0) {

    // In các ước số của N
    echo "Các ước số của $N: ";

    for ($i = 1; $i <= $N; $i++) {
        if ($N % $i == 0) {
            echo "$i ";
        }
    }

    echo "<br><br>";

    // Hàm kiểm tra số nguyên tố
    function laSoNguyenTo($n) {
        if ($n < 2) {
            return false;
        }

        for ($i = 2; $i < $n; $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }

        return true;
    }

    // Kiểm tra N có phải số nguyên tố không
    if (laSoNguyenTo($N)) {
        echo "$N là số nguyên tố<br>";
    } else {
        echo "$N không phải là số nguyên tố<br>";
    }

    // Tính tổng các số nguyên tố nhỏ hơn N
    $tong = 0;

    for ($i = 2; $i < $N; $i++) {
        if (laSoNguyenTo($i)) {
            $tong += $i;
        }
    }

    echo "Tổng các số nguyên tố < $N = $tong<br>";

    // Kiểm tra số chính phương
    $can = sqrt($N);

    if ($can == floor($can)) {
        echo "$N là số chính phương";
    } else {
        echo "$N không phải là số chính phương";
    }

} else {
    echo "N không phải là số dương";
}

?>
</body>
</html>