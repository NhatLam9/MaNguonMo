<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính Năm Âm Lịch</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
        }
        form { 
            width: 450px; 
            margin: 0 auto; 
        }
        table {
            background-color: #bdf2fc; 
            border-collapse: collapse;
            width: 100%;
            border: 0;
        }
        td { 
            padding: 5px; 
            text-align: center; 
        }
        .header {
            background-color: #0b60a8; 
            color: white;
            font-weight: bold;
            font-size: 20px;
            padding: 10px;
        }
        .btn {
            background-color: #f7e4a1; 
            border: 1px solid #c7b67b;
            padding: 2px 15px;
            cursor: pointer;
            font-weight: bold;
            color: red;
        }
        .readonly-input { 
            background-color: #fcf4c0; 
            color: red;
            font-weight: bold;
            border: 1px solid #999;
        }
        input[type="text"] { 
            width: 120px; 
            padding: 3px; 
        }
        .label-text { 
            font-size: 14px; 
            font-family: Tahoma, sans-serif; 
        }
        .img-container { 
            padding: 15px; 
        }
    </style>
</head>
<body>

<?php
    // Khởi tạo các biến
    $nam_duong_lich = "";
    $nam_am_lich = "";
    $hinh_anh_hien_thi = "";

    // Xử lý khi người dùng nhấn nút =>
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nam_duong_lich = trim($_POST["nam_duong_lich"]);
        
        if (is_numeric($nam_duong_lich)) {
            // Mảng dữ liệu
            $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
            $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
            $mang_hinh = array("hoi.jpg", "ty.jpg", "suu.jpg", "dan.jpg", "mao.jpg", "thin.gif", "ran.jpg", "ngo.jpg", "mui.jpg", "than.gif", "dau.jpg", "tuat.jpg");

            // Tính toán Can Chi
            $nam = $nam_duong_lich - 3;
            $can = $nam % 10;
            $chi = $nam % 12;

            // Xử lý trường hợp số âm nếu nhập năm nhỏ hơn 3 (tùy chọn để code chặt chẽ hơn)
            if ($can < 0) $can += 10;
            if ($chi < 0) $chi += 12;

            // Kết quả năm âm lịch
            $nam_am_lich = $mang_can[$can] . " " . $mang_chi[$chi];
            
            // Đường dẫn hình ảnh
            $hinh = $mang_hinh[$chi];
            // Hiển thị thẻ img
            $hinh_anh_hien_thi = "<img src='12con_giap/$hinh' alt='$nam_am_lich' style='max-width: 150px;'>";
        }
    }
?>

<form action="mang_nam_am_lich.php" method="POST">
    <table>
        <tr>
            <td colspan="3" class="header">TÍNH NĂM ÂM LỊCH</td>
        </tr>
        <tr>
            <td class="label-text">Năm dương lịch</td>
            <td></td>
            <td class="label-text">Năm âm lịch</td>
        </tr>
        <tr>
            <td>
                <input type="text" name="nam_duong_lich" value="<?php echo htmlspecialchars($nam_duong_lich); ?>" required>
            </td>
            <td>
                <input type="submit" class="btn" value="=>">
            </td>
            <td>
                <input type="text" class="readonly-input" name="nam_am_lich" value="<?php echo htmlspecialchars($nam_am_lich); ?>" readonly>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="img-container">
                <?php echo $hinh_anh_hien_thi; ?>
            </td>
        </tr>
    </table>
</form>

</body>
</html>