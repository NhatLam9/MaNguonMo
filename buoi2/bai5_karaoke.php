<?php
$gio_bat_dau = "";
$gio_ket_thuc = "";
$tien_thanh_toan = "";

if (isset($_POST["tinh"])) {
    $gio_bat_dau = trim($_POST["gio_bat_dau"]);
    $gio_ket_thuc = trim($_POST["gio_ket_thuc"]);

    // Kiểm tra dữ liệu phải là số
    if (is_numeric($gio_bat_dau) && is_numeric($gio_ket_thuc)) {
        
        // Ràng buộc chỉ nhận giờ trong khoảng 10h đến 24h
        if ($gio_bat_dau < 10 || $gio_ket_thuc > 24 || $gio_bat_dau > 24 || $gio_ket_thuc < 10) {
            $tien_thanh_toan = "Lỗi: Chỉ từ 10h - 24h";
        } 
        // Ràng buộc giờ kết thúc phải lớn hơn giờ bắt đầu
        elseif ($gio_ket_thuc <= $gio_bat_dau) {
            $tien_thanh_toan = "Lỗi: Giờ KT > Giờ BĐ";
        } 
        // Hợp lệ thì tiến hành tính tiền
        else {
            // Trường hợp 1: Hát hoàn toàn trước 17h
            if ($gio_ket_thuc <= 17) {
                $tien_thanh_toan = ($gio_ket_thuc - $gio_bat_dau) * 20000;
            } 
            // Trường hợp 2: Hát hoàn toàn từ 17h trở đi
            elseif ($gio_bat_dau >= 17) {
                $tien_thanh_toan = ($gio_ket_thuc - $gio_bat_dau) * 45000;
            } 
            // Trường hợp 3: Hát vắt ngang qua mốc 17h
            else {
                $tien_truoc_17h = (17 - $gio_bat_dau) * 20000;
                $tien_sau_17h = ($gio_ket_thuc - 17) * 45000;
                $tien_thanh_toan = $tien_truoc_17h + $tien_sau_17h;
            }
        }
    } else {
        $tien_thanh_toan = "Lỗi: Phải nhập số";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính tiền Karaoke</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        .form-container {
            background-color: #1abc9c; 
            width: 400px;
            border: 1px solid #16a085;
        }

        h2 {
            background-color: #16a085; 
            color: white;
            text-align: center;
            margin: 0;
            padding: 10px;
            font-family: "Times New Roman", Times, serif;
            font-style: italic;
            font-size: 22px;
            text-transform: uppercase;
            font-weight: bold;
        }

        table {
            width: 100%;
            padding: 10px 15px;
            border-spacing: 0;
        }

        td {
            padding: 5px;
        }

        .label-text {
            color: #2c3e50;
            font-size: 15px;
            width: 120px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 170px;
            padding: 3px;
            border: 1px solid #a9a9a9;
        }

        .unit {
            font-size: 14px;
            color: #2c3e50;
            width: 50px;
            font-weight: bold;
        }

        /* Thêm chữ đỏ in đậm cho ô kết quả để đồng bộ */
        .result-input {
            background-color: #ffffe0; 
            color: red; 
            font-weight: bold;
        }

        .btn-container {
            text-align: center;
            padding-bottom: 15px;
        }

        input[type="submit"] {
            padding: 4px 15px;
            background-color: #e0e0e0;
            border: 1px solid #777;
            cursor: pointer;
            font-size: 14px;
        }

        input[type="submit"]:active {
            background-color: #ccc;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Tính tiền karaoke</h2>
        
        <form method="POST" action="">
            <table>
                <tr>
                    <td class="label-text">Giờ bắt đầu:</td>
                    <td><input type="text" name="gio_bat_dau" value="<?php echo htmlspecialchars($gio_bat_dau); ?>"></td>
                    <td class="unit">(h)</td>
                </tr>
                <tr>
                    <td class="label-text">Giờ kết thúc:</td>
                    <td><input type="text" name="gio_ket_thuc" value="<?php echo htmlspecialchars($gio_ket_thuc); ?>"></td>
                    <td class="unit">(h)</td>
                </tr>
                <tr>
                    <td class="label-text">Tiền thanh toán:</td>
                    <td><input type="text" name="tien_thanh_toan" class="result-input" value="<?php echo htmlspecialchars($tien_thanh_toan); ?>" readonly></td>
                    <td class="unit">(VNĐ)</td>
                </tr>
            </table>
            
            <div class="btn-container">
                <input type="submit" name="tinh" value="Tính tiền">
            </div>
        </form>
    </div>

</body>
</html>