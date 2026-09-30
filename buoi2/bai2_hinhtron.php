<?php
$chuvi = "";
$dientich = "";
$bankinh = "";

if (isset($_POST["tinh"])) {
    $bankinh = trim($_POST["bankinh"]);

    // Kiểm tra dữ liệu nhập vào phải là số
    if (is_numeric($bankinh)) {
        
        // Bán kính không được là số âm và không được bằng 0
        if ($bankinh <= 0) {
            $chuvi = "Lỗi: Số > 0";
            $dientich = "Lỗi: Số > 0";
        } 
        // Hợp lệ thì tiến hành tính toán
        else {
            if(!defined("PI")) define("PI", 3.14);
            
            $chuvi = 2 * PI * $bankinh;
            $dientich = PI * $bankinh * $bankinh;
        }
        
    } else {
        $chuvi = "Lỗi: Phải nhập số";
        $dientich = "Lỗi: Phải nhập số";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính chu vi và diện tích hình tròn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        .form-container {
            background-color: #fff9e6;
            width: 380px; 
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
            font-size: 21px;
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
            width: 200px;
            padding: 3px;
            border: 1px solid #a9a9a9;
        }

        .result-input {
            background-color: #ffcccc; 
            color: red; /* Chữ màu đỏ để hiển thị thông báo lỗi rõ ràng hơn */
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
        <h2>Diện tích và chu vi hình tròn</h2>
        
        <form method="POST" action="">
            <table>
                <tr>
                    <td class="label-text">Bán kính:</td>
                    <td><input type="text" name="bankinh" value="<?php echo htmlspecialchars($bankinh); ?>"></td>
                </tr>
                <tr>
                    <td class="label-text">Chu vi:</td>
                    <td><input type="text" name="chuvi" class="result-input" value="<?php echo htmlspecialchars($chuvi); ?>" readonly></td>
                </tr>
                <tr>
                    <td class="label-text">Diện tích:</td>
                    <td><input type="text" name="dientich" class="result-input" value="<?php echo htmlspecialchars($dientich); ?>" readonly></td>
                </tr>
            </table>
            
            <div class="btn-container">
                <input type="submit" name="tinh" value="Tính">
            </div>
        </form>
    </div>

</body>
</html>