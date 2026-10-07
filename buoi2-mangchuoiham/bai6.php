<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sắp Xếp Mảng</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table {
            background-color: #d1ded4;
            border-collapse: collapse;
            width: 450px;
            margin: 0 auto;
        }
        td { padding: 5px 10px; }
        .header {
            background-color: #389583;
            color: white;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            padding: 10px;
            text-transform: uppercase;
        }
        .btn {
            background-color: #ffffff;
            border: 1px solid #999;
            padding: 3px 15px;
            cursor: pointer;
            font-weight: bold;
        }
        .readonly-input { 
            background-color: #c4d7ed; 
            width: 100%; 
            border: 1px solid #999;
        }
        input[type="text"] { width: 90%; }
        .text-red { color: red; font-weight: bold; }
        .note { text-align: center; font-size: 13px; font-weight: bold; }
    </style>
</head>
<body>

<?php
    // Hàm hoán vị hai số (truyền tham chiếu)
    function hoan_vi(&$a, &$b) {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    // Hàm sắp xếp mảng tăng dần
    function sap_tang($mang) {
        $n = count($mang);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                if ($mang[$i] > $mang[$j]) {
                    hoan_vi($mang[$i], $mang[$j]);
                }
            }
        }
        return $mang;
    }

    // Hàm sắp xếp mảng giảm dần
    function sap_giam($mang) {
        $n = count($mang);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                if ($mang[$i] < $mang[$j]) {
                    hoan_vi($mang[$i], $mang[$j]);
                }
            }
        }
        return $mang;
    }

    // Khởi tạo các biến
    $chuoi_nhap = "";
    $chuoi_tang = "";
    $chuoi_giam = "";

    // Xử lý dữ liệu khi người dùng nhấn nút submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $chuoi_nhap = $_POST["nhap_mang"];
        
        // Tách chuỗi thành mảng và loại bỏ khoảng trắng thừa
        $mang = explode(",", $chuoi_nhap);
        $mang = array_map('trim', $mang);
        
        // Loại bỏ các phần tử rỗng nếu người dùng nhập dư dấu phẩy
        $mang = array_filter($mang, 'is_numeric');
        
        // Sắp xếp tăng dần
        $mang_tang = sap_tang($mang);
        $chuoi_tang = implode(", ", $mang_tang);
        
        // Sắp xếp giảm dần
        $mang_giam = sap_giam($mang);
        $chuoi_giam = implode(", ", $mang_giam);
    }
?>

<form action="bai6.php" method="POST">
    <table>
        <tr>
            <td colspan="2" class="header">Sắp Xếp Mảng</td>
        </tr>
        <tr>
            <td width="30%">Nhập mảng:</td>
            <td>
                <input type="text" name="nhap_mang" value="<?php echo htmlspecialchars($chuoi_nhap); ?>" required>
                <span class="text-red">(*)</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" class="btn" value="Sắp xếp tăng/giảm"></td>
        </tr>
        <tr>
            <td colspan="2" class="text-red">Sau khi sắp xếp:</td>
        </tr>
        <tr>
            <td>Tăng dần:</td>
            <td><input type="text" class="readonly-input" name="mang_tang" value="<?php echo htmlspecialchars($chuoi_tang); ?>" readonly></td>
        </tr>
        <tr>
            <td>Giảm dần:</td>
            <td><input type="text" class="readonly-input" name="mang_giam" value="<?php echo htmlspecialchars($chuoi_giam); ?>" readonly></td>
        </tr>
        <tr>
            <td colspan="2" class="note"><span class="text-red">(*)</span> Các số được nhập cách nhau bằng dấu ","</td>
        </tr>
    </table>
</form>

</body>
</html>