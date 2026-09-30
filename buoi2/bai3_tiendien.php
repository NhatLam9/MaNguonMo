<?php
$tenchuho = "";
$chisocu = "";
$chisomoi = "";
$dongia = "2000";
$sotien = "";

if (isset($_POST["tinh"])) {
    $tenchuho = trim($_POST["tenchuho"]);
    $chisocu = trim($_POST["chisocu"]);
    $chisomoi = trim($_POST["chisomoi"]);
    $dongia = trim($_POST["dongia"]);

    // Kiểm tra các trường dữ liệu phải là số
    if (is_numeric($chisocu) && is_numeric($chisomoi) && is_numeric($dongia)) {
        
        // Chỉ số điện không được âm
        if ($chisocu < 0 || $chisomoi < 0) {
            $sotien = "Lỗi: Chỉ số >= 0";
        }
        // Đơn giá không được âm và không được bằng 0
        elseif ($dongia <= 0) {
            $sotien = "Lỗi: Đơn giá > 0";
        }
        // Ràng buộc chỉ số mới phải lớn hơn hoặc bằng chỉ số cũ
        elseif ($chisomoi < $chisocu) {
            $sotien = "Lỗi: Mới >= Cũ";
        } 
        // Dữ liệu hợp lệ thì tính tiền
        else {
            $sotien = ($chisomoi - $chisocu) * $dongia;
        }

    } else {
        $sotien = "Lỗi: Phải nhập số";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán tiền điện</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        .form-container {
            background-color: #fff9e6;
            width: 420px;
            border: 1px solid #d4c29d;
        }

        h2 {
            background-color: #f7d788;
            color: #a04000;
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
            padding: 10px;
            border-spacing: 0;
        }

        td {
            padding: 5px;
        }

        .label-text {
            color: #5d4037;
            font-size: 15px;
            width: 140px;
        }

        input[type="text"] {
            width: 170px;
            padding: 3px;
            border: 1px solid #a9a9a9;
        }

        .unit {
            font-size: 14px;
            color: #5d4037;
            width: 40px;
        }

        #sotien {
            background-color: #ffcccc; 
            color: red; /* Chữ đỏ để thông báo lỗi nổi bật hơn */
        }

        .btn-container {
            text-align: center;
            padding-bottom: 15px;
        }

        input[type="submit"] {
            padding: 4px 20px;
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
        <h2>Thanh toán tiền điện</h2>
        
        <form method="POST" action="">
            <table>
                <tr>
                    <td class="label-text">Tên chủ hộ:</td>
                    <td><input type="text" name="tenchuho" value="<?php echo htmlspecialchars($tenchuho); ?>"></td>
                    <td class="unit"></td>
                </tr>
                <tr>
                    <td class="label-text">Chỉ số cũ:</td>
                    <td><input type="text" name="chisocu" value="<?php echo htmlspecialchars($chisocu); ?>"></td>
                    <td class="unit">(Kw)</td>
                </tr>
                <tr>
                    <td class="label-text">Chỉ số mới:</td>
                    <td><input type="text" name="chisomoi" value="<?php echo htmlspecialchars($chisomoi); ?>"></td>
                    <td class="unit">(Kw)</td>
                </tr>
                <tr>
                    <td class="label-text">Đơn giá:</td>
                    <td><input type="text" name="dongia" value="<?php echo htmlspecialchars($dongia); ?>"></td>
                    <td class="unit">(VNĐ)</td>
                </tr>
                <tr>
                    <td class="label-text">Số tiền thanh toán:</td>
                    <td><input type="text" name="sotien" id="sotien" value="<?php echo htmlspecialchars($sotien); ?>" readonly></td>
                    <td class="unit">(VNĐ)</td>
                </tr>
            </table>
            
            <div class="btn-container">
                <input type="submit" name="tinh" value="Tính">
            </div>
        </form>
    </div>

</body>
</html>