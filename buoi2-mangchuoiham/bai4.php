<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm kiếm trong mảng</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
        }
        table {
            background-color: #d1ded4;
            border-collapse: collapse;
            width: 450px;
            margin: 0 auto;
        }
        td { 
            padding: 5px 10px; 
        }
        .header {
            background-color: #389583;
            color: white;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            padding: 10px;
            text-transform: uppercase;
        }
        .footer {
            background-color: #79c5b4;
            text-align: center;
            font-size: 12px;
        }
        .btn {
            background-color: #92b8d9;
            border: 1px solid #5a7b9c;
            padding: 3px 10px;
            cursor: pointer;
        }
        .result-input { 
            background-color: #f1f8e9; 
            color: red; 
            width: 100%; 
        }
        input[type="text"] { 
            width: 95%; 
        }
    </style>
</head>
<body>

<?php
    // Hàm tìm kiếm phần tử trong mảng
    function tim_kiem($mang, $gia_tri) {
        for ($i = 0; $i < count($mang); $i++) {
            if ($mang[$i] == $gia_tri) {
                return $i; // Trả về chỉ số mảng (bắt đầu từ 0)
            }
        }
        return -1; // Không tìm thấy
    }

    // Khởi tạo các biến
    $nhap_mang = "";
    $so_can_tim = "";
    $mang_xuat = "";
    $ket_qua = "";

    // Xử lý khi người dùng nhấn nút Tìm kiếm
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nhap_mang = $_POST["nhap_mang"];
        $so_can_tim = $_POST["so_can_tim"];

        // Tách chuỗi thành mảng, loại bỏ khoảng trắng thừa ở mỗi phần tử
        $mang = explode(",", $nhap_mang);
        $mang = array_map('trim', $mang); 

        // Nối mảng lại thành chuỗi để xuất ra ô Mảng
        $mang_xuat = implode(", ", $mang);

        // Gọi hàm tìm kiếm
        if ($so_can_tim !== "") {
            $vi_tri = tim_kiem($mang, $so_can_tim);

            if ($vi_tri != -1) {
                // Cộng 1 vào chỉ số để hiển thị vị trí đếm từ 1 (giống hình minh họa)
                $vi_tri_hien_thi = $vi_tri + 1; 
                $ket_qua = "Tìm thấy $so_can_tim tại vị trí thứ $vi_tri_hien_thi của mảng";
            } else {
                $ket_qua = "Không tìm thấy $so_can_tim trong mảng";
            }
        }
    }
?>

<form action="bai4.php" method="POST">
    <table>
        <tr>
            <td colspan="2" class="header">Tìm Kiếm</td>
        </tr>
        <tr>
            <td>Nhập mảng:</td>
            <td><input type="text" name="nhap_mang" value="<?php echo htmlspecialchars($nhap_mang); ?>" required></td>
        </tr>
        <tr>
            <td>Nhập số cần tìm:</td>
            <td><input type="text" name="so_can_tim" style="width: 50px;" value="<?php echo htmlspecialchars($so_can_tim); ?>" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" class="btn" value="Tìm kiếm"></td>
        </tr>
        <tr>
            <td>Mảng:</td>
            <td><input type="text" name="mang_xuat" value="<?php echo htmlspecialchars($mang_xuat); ?>" readonly></td>
        </tr>
        <tr>
            <td>Kết quả tìm kiếm:</td>
            <td><input type="text" class="result-input" name="ket_qua" value="<?php echo htmlspecialchars($ket_qua); ?>" readonly></td>
        </tr>
        <tr>
            <td colspan="2" class="footer">(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
        </tr>
    </table>
</form>

</body>
</html>