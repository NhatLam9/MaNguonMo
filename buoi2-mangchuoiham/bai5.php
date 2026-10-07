<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thay thế phần tử trong mảng</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
        }
        table {
            background-color: #fdf0f6; 
            border-collapse: collapse;
            width: 500px;
            margin: 0 auto;
        }
        td { 
            padding: 5px 10px; 
        }
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
            padding: 3px 10px;
            cursor: pointer;
        }
        .readonly-input { 
            background-color: #f5a8a8; 
            color: white; 
            width: 100%; 
            border: 1px solid #ccc;
        }
        input[type="text"] { 
            width: 95%; 
        }
        .note { 
            text-align: center; 
            font-size: 13px; 
            font-weight: bold; 
        }
        .note-red { 
            color: red; 
        }
    </style>
</head>
<body>

<?php
    function thay_the($mang, $cu, $moi) {
        for ($i = 0; $i < count($mang); $i++) {
            if ($mang[$i] == $cu) {
                $mang[$i] = $moi;
            }
        }
        return $mang;
    }

    // Khởi tạo biến
    $nhap_mang = "";
    $gia_tri_cu = "";
    $gia_tri_moi = "";
    $mang_cu_str = "";
    $mang_moi_str = "";

    // Xử lý khi form được submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nhap_mang = $_POST["nhap_mang"];
        $gia_tri_cu = $_POST["gia_tri_cu"];
        $gia_tri_moi = $_POST["gia_tri_moi"];

        // Tách chuỗi thành mảng dựa trên dấu phẩy
        $mang = explode(",", $nhap_mang);
        
        // Cắt bỏ khoảng trắng thừa ở mỗi phần tử để so sánh chính xác
        $mang = array_map('trim', $mang);

        // Xuất mảng cũ (cách nhau bởi khoảng trắng theo như hình mẫu)
        $mang_cu_str = implode(" ", $mang);

        // Gọi hàm thay thế
        $mang_moi = thay_the($mang, $gia_tri_cu, $gia_tri_moi);

        // Xuất mảng mới sau khi thay thế
        $mang_moi_str = implode(" ", $mang_moi);
    }
?>

<form action="bai5.php" method="POST">
    <table>
        <tr>
            <td colspan="2" class="header">Thay Thế</td>
        </tr>
        <tr>
            <td width="35%">Nhập các phần tử:</td>
            <td><input type="text" name="nhap_mang" value="<?php echo htmlspecialchars($nhap_mang); ?>" required></td>
        </tr>
        <tr>
            <td>Giá trị cần thay thế:</td>
            <td><input type="text" name="gia_tri_cu" style="width: 100px;" value="<?php echo htmlspecialchars($gia_tri_cu); ?>" required></td>
        </tr>
        <tr>
            <td>Giá trị thay thế:</td>
            <td><input type="text" name="gia_tri_moi" style="width: 100px;" value="<?php echo htmlspecialchars($gia_tri_moi); ?>" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" class="btn" value="Thay thế"></td>
        </tr>
        <tr>
            <td>Mảng cũ:</td>
            <td><input type="text" class="readonly-input" name="mang_cu" value="<?php echo htmlspecialchars($mang_cu_str); ?>" readonly></td>
        </tr>
        <tr>
            <td>Mảng sau khi thay thế:</td>
            <td><input type="text" class="readonly-input" name="mang_moi" value="<?php echo htmlspecialchars($mang_moi_str); ?>" readonly></td>
        </tr>
        <tr>
            <td colspan="2" class="note">(<span class="note-red">Ghi chú:</span> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
        </tr>
    </table>
</form>

</body>
</html>