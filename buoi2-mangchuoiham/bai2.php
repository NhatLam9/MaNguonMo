<?php
// Khởi tạo các biến
$day_so = "";
$tong = "";
$loi = ""; // Biến mới để lưu thông báo lỗi

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_btn'])) {
    $day_so = $_POST['day_so'];

    // 1. Tách chuỗi thành mảng
    $mang_so = explode(",", $day_so);
    $so_phan_tu = count($mang_so);
    
    $tong_tam = 0;
    $hop_le = true; // Cờ đánh dấu dãy số có hợp lệ không

    // 2 & 3. Duyệt mảng để kiểm tra và tính tổng
    for ($i = 0; $i < $so_phan_tu; $i++) {
        $so = trim($mang_so[$i]); // Loại bỏ khoảng trắng 2 đầu
        
        // Bỏ qua nếu người dùng nhập dư dấu phẩy ở cuối (ví dụ: "1, 2,")
        if ($so === "") {
            continue;
        }
        
        // Kiểm tra xem phần tử hiện tại có phải là số không
        if (!is_numeric($so)) {
            $hop_le = false; // Đánh dấu là lỗi
            break; // Dừng vòng lặp ngay lập tức vì đã phát hiện lỗi
        }
        
        $tong_tam += (float)$so;
    }

    // 4. Quyết định xuất kết quả hay xuất lỗi
    if ($hop_le) {
        $tong = $tong_tam;
    } else {
        $tong = ""; // Xóa ô kết quả
        $loi = "Lỗi: Dãy số chứa ký tự không hợp lệ. Chỉ được nhập số và dấu phẩy!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Nhập và tính trên dãy số</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }
        form {
            background-color: #e0ebeb;
            padding-bottom: 10px;
            width: 450px;
        }
        h2 {
            background-color: #2b8b8b;
            color: white;
            text-align: center;
            margin: 0;
            padding: 10px 0;
            font-size: 20px;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            padding: 10px 20px;
        }
        td {
            padding: 5px;
        }
        .label-col {
            width: 100px;
        }
        input[type="text"] {
            width: 90%;
            padding: 3px;
        }
        .readonly-input {
            background-color: #ccffcc;
            font-weight: bold;
        }
        .btn-submit {
            background-color: #ffff99;
            border: 1px solid #999;
            padding: 4px 15px;
            cursor: pointer;
            font-weight: bold;
        }
        .note-red {
            color: red;
            font-weight: bold;
        }
        .note-center {
            text-align: center;
            color: red;
            font-size: 14px;
        }
        .error-msg {
            text-align: center;
            color: red;
            font-weight: bold;
            background-color: #ffe6e6;
            margin: 10px 20px;
            padding: 5px;
            border: 1px solid red;
        }
    </style>
</head>
<body>
    <form action="bai2.php" method="POST">
        <h2>Nhập và tính trên dãy số</h2>
        
        <!-- Hiển thị thông báo lỗi nếu có -->
        <?php if ($loi != "") { echo "<div class='error-msg'>$loi</div>"; } ?>

        <table>
            <tr>
                <td class="label-col">Nhập dãy số:</td>
                <td>
                    <input type="text" name="day_so" value="<?php echo htmlspecialchars($day_so); ?>" required>
                </td>
                <td class="note-red">(*)</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="submit_btn" class="btn-submit">Tổng dãy số</button>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Tổng dãy số:</td>
                <td>
                    <input type="text" name="tong" class="readonly-input" value="<?php echo $tong; ?>" readonly>
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" class="note-center">(*) Các số được nhập cách nhau bằng dấu ","</td>
            </tr>
        </table>
    </form>

</body>
</html>