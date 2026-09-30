<?php
$dientich = "";
$chieudai = "";
$chieurong = "";

if (isset($_POST["tinh"])) {
    $chieudai = $_POST["chieudai"];
    $chieurong = $_POST["chieurong"];

    // Thêm kiểm tra số để tránh lỗi báo vàng nếu nhập chữ
    if (is_numeric($chieudai) && is_numeric($chieurong)) {
        $dientich = $chieudai * $chieurong;
    } else {
        $dientich = "Lỗi: Vui lòng nhập số";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính diện tích hình chữ nhật</title>
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
            max-width: 420px;
            padding: 35px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
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
            flex: 0 0 110px;
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
            border-color: #3498db;
            outline: none;
        }

        .input-group input[readonly] {
            background-color: #f8f9fa;
            color: #e74c3c;
            font-weight: bold;
            border-color: #e0e4e8;
            cursor: not-allowed;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
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
            background-color: #2980b9;
        }

        .btn-submit:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>

    <div class="form-container">
        <form method="POST" action="bai1_hcn.php">

            <h2>Tính diện tích</h2>

            <div class="input-group">
                <label for="chieudai">Chiều dài:</label>
                <input type="text" id="chieudai" name="chieudai" value="<?php echo htmlspecialchars($chieudai); ?>" required>
            </div>

            <div class="input-group">
                <label for="chieurong">Chiều rộng:</label>
                <input type="text" id="chieurong" name="chieurong" value="<?php echo htmlspecialchars($chieurong); ?>" required>
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