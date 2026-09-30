<?php
// Khởi tạo các biến
$gio_bat_dau = "";
$gio_ket_thuc = "";
$tien_thanh_toan = "";
$thong_bao = "";

// Kiểm tra form submit theo phương thức POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gio_bat_dau = isset($_POST["gio_bat_dau"]) ? trim($_POST["gio_bat_dau"]) : "";
    $gio_ket_thuc = isset($_POST["gio_ket_thuc"]) ? trim($_POST["gio_ket_thuc"]) : "";

    // Kiểm tra dữ liệu nhập vào phải là số
    if (is_numeric($gio_bat_dau) && is_numeric($gio_ket_thuc)) {
        // Yêu cầu: Kiểm tra giờ kết thúc > giờ bắt đầu
        if ($gio_ket_thuc > $gio_bat_dau) {
            // Giới hạn giờ hoạt động từ 10h đến 24h
            if ($gio_bat_dau >= 10 && $gio_ket_thuc <= 24) {
                // Trường hợp 1: Hát hoàn toàn trong khung giờ 10h - 17h (20.000đ/h)
                if ($gio_ket_thuc <= 17) {
                    $tien_thanh_toan = ($gio_ket_thuc - $gio_bat_dau) * 20000;
                } 
                // Trường hợp 2: Hát hoàn toàn trong khung giờ 17h - 24h (45.000đ/h)
                elseif ($gio_bat_dau >= 17) {
                    $tien_thanh_toan = ($gio_ket_thuc - $gio_bat_dau) * 45000;
                } 
                // Trường hợp 3: Hát vắt ngang qua mốc 17h (ví dụ 15h đến 19h)
                else {
                    $tien_truoc_17h = (17 - $gio_bat_dau) * 20000;
                    $tien_sau_17h = ($gio_ket_thuc - 17) * 45000;
                    $tien_thanh_toan = $tien_truoc_17h + $tien_sau_17h;
                }
            } else {
                $thong_bao = "Quán chỉ hoạt động từ 10h đến 24h (Giờ nghỉ: 24h - 10h).";
            }
        } else {
            // Thông báo lỗi nếu giờ kết thúc <= giờ bắt đầu
            $thong_bao = "Giờ kết thúc phải > Giờ bắt đầu"; 
        }
    } else {
        $thong_bao = "Vui lòng nhập giờ là một số hợp lệ.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Tiền Karaoke</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fef9e7; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 480px;
            padding: 35px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(243, 156, 18, 0.15); /* Bóng đổ ám vàng */
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #d68910; 
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
        }

        .form-group label {
            flex: 0 0 135px;
            font-weight: 600;
            color: #555;
            font-size: 15px;
        }

        .form-group input[type="text"] {
            flex: 1;
            padding: 10px 12px;
            border: 1px solid #f8c471; 
            border-radius: 6px;
            font-size: 15px;
            transition: all 0.3s ease;
            box-sizing: border-box;
            outline: none;
        }

        .form-group input[type="text"]:focus {
            border-color: #f39c12;
            box-shadow: 0 0 0 3px rgba(243, 156, 18, 0.2);
        }

        .form-group span {
            flex: 0 0 45px;
            text-align: right;
            color: #888;
            font-size: 14px;
            font-weight: 500;
        }

        .readonly-input {
            background-color: #fcf3cf !important; 
            color: #c0392b !important; 
            font-weight: bold;
            cursor: not-allowed;
            border-color: #f5b041 !important;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background-color: #f39c12; 
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
            margin-top: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-submit:hover {
            background-color: #d68910; 
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        /* Hiển thị lỗi báo đỏ */
        .error-message {
            background-color: #fadbd8;
            color: #c0392b;
            text-align: center;
            padding: 12px;
            border-radius: 6px;
            margin-top: 20px;
            font-weight: bold;
            font-size: 14px;
            border: 1px solid #f5b7b1;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>TÍNH TIỀN KARAOKE</h2>
    
    <!-- Giữ nguyên action như yêu cầu -->
    <form action="bai5_karaoke.php" method="POST">
        
        <div class="form-group">
            <label for="gio_bat_dau">Giờ bắt đầu:</label>
            <input type="text" name="gio_bat_dau" id="gio_bat_dau" value="<?php echo htmlspecialchars($gio_bat_dau); ?>" required>
            <span>(h)</span>
        </div>
        
        <div class="form-group">
            <label for="gio_ket_thuc">Giờ kết thúc:</label>
            <input type="text" name="gio_ket_thuc" id="gio_ket_thuc" value="<?php echo htmlspecialchars($gio_ket_thuc); ?>" required>
            <span>(h)</span>
        </div>
        
        <div class="form-group">
            <label for="tien_thanh_toan">Tiền thanh toán:</label>
            <input type="text" name="tien_thanh_toan" id="tien_thanh_toan" class="readonly-input" value="<?php echo htmlspecialchars($tien_thanh_toan); ?>" readonly>
            <span>(VNĐ)</span>
        </div>
        
        <button type="submit" class="btn-submit">TÍNH TIỀN</button>

        <?php if (!empty($thong_bao)): ?>
            <div class="error-message">
                <?php echo $thong_bao; ?>
            </div>
        <?php endif; ?>
        
    </form>
</div>

</body>
</html>