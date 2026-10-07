<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Phát Sinh Mảng Và Tính Toán</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table {
            background-color: #fdf0f6; 
            border-collapse: collapse;
            width: 450px;
            margin: 0 auto;
        }
        td { padding: 5px 10px; }
        .header {
            background-color: #a80059; 
            color: white;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            padding: 10px;
            text-transform: uppercase;
        }
        .btn {
            background-color: #fdfbc8; 
            border: 1px solid #c7b67b;
            padding: 3px 15px;
            cursor: pointer;
        }
        .readonly-input { 
            background-color: #fca9a9; 
            width: 100%; 
            border: 1px solid #ccc;
        }
        input[type="text"] { width: 90%; }
        .note { text-align: center; font-size: 12px; }
        .note-red { color: red; font-weight: bold; }
    </style>
</head>
<body>

<?php
    // 1. Hàm tạo mảng phát sinh ngẫu nhiên
    function tao_mang($n) {
        $mang = array();
        for ($i = 0; $i < $n; $i++) {
            $mang[$i] = rand(0, 20); // Phát sinh số từ 0 đến 20
        }
        return $mang;
    }

    // 2. Hàm xuất mảng (cách nhau bởi dấu cách)
    function xuat_mang($mang) {
        return implode(" ", $mang);
    }

    // 3. Hàm tính tổng
    function tinh_tong($mang) {
        $tong = 0;
        foreach ($mang as $gia_tri) {
            $tong += $gia_tri;
        }
        return $tong;
    }

    // 4. Hàm tìm Max
    function tim_max($mang) {
        if (count($mang) == 0) return 0;
        $max = $mang[0];
        foreach ($mang as $gia_tri) {
            if ($gia_tri > $max) {
                $max = $gia_tri;
            }
        }
        return $max;
    }

    // 5. Hàm tìm Min
    function tim_min($mang) {
        if (count($mang) == 0) return 0;
        $min = $mang[0];
        foreach ($mang as $gia_tri) {
            if ($gia_tri < $min) {
                $min = $gia_tri;
            }
        }
        return $min;
    }

    // Khởi tạo các biến
    $so_phan_tu = "";
    $mang_kq = "";
    $max = "";
    $min = "";
    $tong = "";

    // Xử lý khi form được submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $so_phan_tu = $_POST["so_phan_tu"];

        if (is_numeric($so_phan_tu) && $so_phan_tu > 0) {
            // Gọi 5 hàm theo hướng dẫn
            $mang = tao_mang($so_phan_tu);
            $mang_kq = xuat_mang($mang);
            $max = tim_max($mang);
            $min = tim_min($mang);
            $tong = tinh_tong($mang);
        }
    }
?>

<form action="bai3.php" method="POST">
    <table>
        <tr>
            <td colspan="2" class="header">Phát Sinh Mảng Và Tính Toán</td>
        </tr>
        <tr>
            <td width="35%">Nhập số phần tử:</td>
            <td><input type="text" name="so_phan_tu" value="<?php echo htmlspecialchars($so_phan_tu); ?>" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" class="btn" value="Phát sinh và tính toán"></td>
        </tr>
        <tr>
            <td>Mảng:</td>
            <td><input type="text" class="readonly-input" name="mang" value="<?php echo htmlspecialchars($mang_kq); ?>" readonly></td>
        </tr>
        <tr>
            <td>GTLN (MAX) trong mảng:</td>
            <td><input type="text" class="readonly-input" name="max" value="<?php echo htmlspecialchars($max); ?>" readonly></td>
        </tr>
        <tr>
            <td>TTNN (MIN) trong mảng:</td>
            <td><input type="text" class="readonly-input" name="min" value="<?php echo htmlspecialchars($min); ?>" readonly></td>
        </tr>
        <tr>
            <td>Tổng mảng:</td>
            <td><input type="text" class="readonly-input" name="tong" value="<?php echo htmlspecialchars($tong); ?>" readonly></td>
        </tr>
        <tr>
            <td colspan="2" class="note">(<span class="note-red">Ghi chú:</span> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</td>
        </tr>
    </table>
</form>

</body>
</html>