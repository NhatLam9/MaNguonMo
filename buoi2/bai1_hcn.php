<?php
$chieudai = "";
$chieurong = "";
$dientich = "";

if (isset($_POST["tinh"])) {
    $chieudai = trim($_POST["chieudai"]);
    $chieurong = trim($_POST["chieurong"]);

    // Kiểm tra phải là số
    if (is_numeric($chieudai) && is_numeric($chieurong)) {
        
        // Kiểm tra không nhận số âm và không nhận số 0
        if ($chieudai <= 0 || $chieurong <= 0) {
            $dientich = "Lỗi: Số > 0";
        } 
        // Ràng buộc chiều dài không được nhỏ hơn chiều rộng
        elseif ($chieudai < $chieurong) {
            $dientich = "Lỗi: Dài >= Rộng";
        } 
        // Hợp lệ thì tính toán
        else {
            $dientich = $chieudai * $chieurong;
        }
        
    } else {
        $dientich = "Lỗi: Phải nhập số";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính diện tích hình chữ nhật</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        .form-container {
            background-color: #fff9e6; 
            width: 350px;
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
            padding: 10px 15px;
        }

        td {
            padding: 5px;
        }

        .label-text {
            color: #5d4037;
            font-weight: bold;
            font-size: 15px;
            width: 100px;
        }

        input[type="text"] {
            width: 170px;
            padding: 3px;
            border: 1px solid #a9a9a9;
        }

        #dientich {
            background-color: #ffcccc; 
            color: red; /* Thêm màu đỏ cho chữ để dễ nhìn báo lỗi */
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
        <h2>Diện tích hình chữ nhật</h2>
        
        <form method="POST" action="">
            <table>
                <tr>
                    <td class="label-text">Chiều dài:</td>
                    <td><input type="text" name="chieudai" value="<?php echo htmlspecialchars($chieudai); ?>"></td>
                </tr>
                <tr>
                    <td class="label-text">Chiều rộng:</td>
                    <td><input type="text" name="chieurong" value="<?php echo htmlspecialchars($chieurong); ?>"></td>
                </tr>
                <tr>
                    <td class="label-text">Diện tích:</td>
                    <td><input type="text" name="dientich" id="dientich" value="<?php echo htmlspecialchars($dientich); ?>" readonly></td>
                </tr>
            </table>
            
            <div class="btn-container">
                <input type="submit" name="tinh" value="Tính">
            </div>
        </form>
    </div>

</body>
</html>