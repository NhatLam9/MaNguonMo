<?php
$chuvi = "";
$dientich = "";
$bankinh = "";

if (isset($_POST["tinh"])) {
    $bankinh = trim($_POST["bankinh"]);

    // Kiểm tra đầu vào phải là số và lớn hơn hoặc bằng 0
    if (is_numeric($bankinh) && $bankinh >= 0) {
        // Khai báo hằng số PI
        if(!defined("PI")) define("PI", 3.14);

        // Tính chu vi
        $chuvi = 2 * PI * $bankinh;

        // Tính diện tích
        $dientich = PI * $bankinh * $bankinh;
    } else {
        $chuvi = "Lỗi: Hãy nhập số >= 0";
        $dientich = "Lỗi: Hãy nhập số >= 0";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính chu vi và diện tích hình tròn</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f5;
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
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #d35400; 
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 22px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .input-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .input-group label {
            flex: 0 0 120px;
            font-weight: 600;
            color: #555;
            font-size: 15px;
        }

        .input-group input[type="text"] {
            flex: 1;
            padding: 10px 12px;
            border: 1px solid #ccd1d9;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        .input-group input[type="text"]:focus {
            border-color: #e67e22;
            outline: none;
        }


        .input-group input[readonly] {
            background-color: #f8f9fa;
            color: #c0392b;
            font-weight: bold;
            border-color: #e0e4e8;
            cursor: not-allowed;
        }

     .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #e67e22;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #d35400;
        }

        .btn-submit:active {
            transform: scale(0.98);
        }
    </style>
</head>

<body>

    <div class="form-container">
        <form method="POST" action="bai2_hinhtron.php">

            <h2>TÍNH CHU VI & DIỆN TÍCH HÌNH TRÒN</h2>

            <div class="input-group">
                <label for="bankinh">Bán kính:</label>
                <input type="text" id="bankinh" name="bankinh" value="<?php echo htmlspecialchars($bankinh); ?>" required>
            </div>

            <div class="input-group">
                <label for="chuvi">Chu vi:</label>
                <input type="text" id="chuvi" name="chuvi" value="<?php echo htmlspecialchars($chuvi); ?>" readonly>
            </div>

            <div class="input-group">
                <label for="dientich">Diện tích:</label>
                <input type="text" id="dientich" name="dientich" value="<?php echo htmlspecialchars($dientich); ?>" readonly>
            </div>

            <button type="submit" name="tinh" class="btn-submit">TÍNH TOÁN</button>

        </form>
    </div>

</body>
</html>