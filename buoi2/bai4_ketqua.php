<?php
// Khởi tạo các biến để giữ lại giá trị trên form và tránh lỗi
$toan = "";
$ly = "";
$hoa = "";
$diemchuan = "20"; // Có thể đặt điểm chuẩn mặc định là 20
$tongdiem = "";
$ketqua = "";

if (isset($_POST["xemketqua"])) {
    $toan = trim($_POST["toan"]);
    $ly = trim($_POST["ly"]);
    $hoa = trim($_POST["hoa"]);
    $diemchuan = trim($_POST["diemchuan"]);

    // Kiểm tra dữ liệu đầu vào phải là số
    if (is_numeric($toan) && is_numeric($ly) && is_numeric($hoa) && is_numeric($diemchuan)) {
        // Tính tổng điểm
        $tongdiem = $toan + $ly + $hoa;

        // Kiểm tra kết quả (Không có môn nào điểm 0 và tổng điểm >= điểm chuẩn)
        if ($toan > 0 && $ly > 0 && $hoa > 0 && $tongdiem >= $diemchuan) {
            $ketqua = "Đậu";
        } else {
            $ketqua = "Rớt";
        }
    } else {
        $tongdiem = "Lỗi";
        $ketqua = "Vui lòng nhập số!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả thi đại học</title>

    <style>
  
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5eef8; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 450px;
            padding: 35px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(155, 89, 182, 0.15); 
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #9b59b6; 
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }


        .input-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .input-group label {
            flex: 0 0 130px;
            font-weight: 600;
            color: #555;
            font-size: 15px;
        }

        .input-group input[type="text"] {
            flex: 1;
            padding: 10px 12px;
            border: 1px solid #d7bde2; 
            border-radius: 6px;
            font-size: 15px;
            transition: all 0.3s ease;
            box-sizing: border-box;
            background-color: #fff;
        }

        .input-group input[type="text"]:focus {
            border-color: #9b59b6;
            outline: none;
            box-shadow: 0 0 0 3px rgba(155, 89, 182, 0.2); 
        }

        /* Làm nổi bật ô kết quả */
        .input-group input[readonly] {
            background-color: #f4ecf7; 
            color: #8e44ad; 
            font-weight: bold;
            border-color: #ebdef0;
            cursor: not-allowed;
        }

        /* Thiết kế nút bấm */
        .btn-submit {
            width: 100%;
            padding: 14px;
            background-color: #a569bd; 
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
            margin-top: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-submit:hover {
            background-color: #8e44ad; 
        }

        .btn-submit:active {
            transform: scale(0.98); 
        }
    </style>
</head>

<body>

    <div class="form-container">
        <form method="POST" action="bai4_ketqua.php">

            <h2>KẾT QUẢ THI ĐẠI HỌC</h2>

            <div class="input-group">
                <label for="toan">Toán:</label>
                <input type="text" id="toan" name="toan" value="<?php echo htmlspecialchars($toan); ?>" required>
            </div>

            <div class="input-group">
                <label for="ly">Lý:</label>
                <input type="text" id="ly" name="ly" value="<?php echo htmlspecialchars($ly); ?>" required>
            </div>

            <div class="input-group">
                <label for="hoa">Hóa:</label>
                <input type="text" id="hoa" name="hoa" value="<?php echo htmlspecialchars($hoa); ?>" required>
            </div>

            <div class="input-group">
                <label for="diemchuan">Điểm chuẩn:</label>
                <input type="text" id="diemchuan" name="diemchuan" value="<?php echo htmlspecialchars($diemchuan); ?>" required>
            </div>

            <div class="input-group">
                <label for="tongdiem">Tổng điểm:</label>
                <input type="text" id="tongdiem" name="tongdiem" value="<?php echo htmlspecialchars($tongdiem); ?>" readonly>
            </div>

            <div class="input-group">
                <label for="ketqua">Kết quả thi:</label>
                <input type="text" id="ketqua" name="ketqua" value="<?php echo htmlspecialchars($ketqua); ?>" readonly>
            </div>

            <button type="submit" name="xemketqua" class="btn-submit">XEM KẾT QUẢ</button>

        </form>
    </div>

</body>
</html>