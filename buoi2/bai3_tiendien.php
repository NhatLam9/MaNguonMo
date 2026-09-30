<?php
$tenchuho = "";
$chisocu = "";
$chisomoi = "";
$dongia = "2000"; 
$sotien = "";

if (isset($_POST["tinh"])) {
    // Lấy dữ liệu từ form và loại bỏ khoảng trắng thừa
    $tenchuho = trim($_POST["tenchuho"]);
    $chisocu = trim($_POST["chisocu"]);
    $chisomoi = trim($_POST["chisomoi"]);
    $dongia = trim($_POST["dongia"]);

    // Kiểm tra dữ liệu đầu vào phải là số
    if (is_numeric($chisocu) && is_numeric($chisomoi) && is_numeric($dongia)) {
        // Chỉ số mới phải >= chỉ số cũ
        if ($chisomoi >= $chisocu) {
            $sotien = ($chisomoi - $chisocu) * $dongia;
        } else {
            $sotien = "Lỗi: Chỉ số mới < Chỉ số cũ";
        }
    } else {
        $sotien = "Lỗi: Vui lòng nhập số hợp lệ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền điện</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 500px;
            padding: 35px 45px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .input-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .input-group label {
            flex: 0 0 160px;
            font-weight: 600;
            color: #4a5568;
            font-size: 15px;
        }

        .input-group input[type="text"] {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #cbd5e0;
            border-radius: 6px;
            font-size: 15px;
            transition: all 0.3s ease;
            box-sizing: border-box;
            background-color: #fff;
        }

        .input-group input[type="text"]:focus {
            border-color: #3182ce;
            outline: none;
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.15);
        }

        .input-group input[readonly] {
            background-color: #edf2f7;
            color: #e53e3e; /* Màu đỏ cho số tiền */
            font-weight: bold;
            border-color: #e2e8f0;
            cursor: not-allowed;
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background-color: #3182ce;
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
            background-color: #2b6cb0;
        }

        .btn-submit:active {
            transform: scale(0.98);
        }
    </style>
</head>

<body>

    <div class="form-container">
        <form method="POST" action="bai3_tiendien.php">
            
            <h2>TÍNH TIỀN ĐIỆN</h2>

            <div class="input-group">
                <label for="tenchuho">Tên chủ hộ:</label>
                <input type="text" id="tenchuho" name="tenchuho" value="<?php echo htmlspecialchars($tenchuho); ?>" required>
            </div>

            <div class="input-group">
                <label for="chisocu">Chỉ số cũ:</label>
                <input type="text" id="chisocu" name="chisocu" value="<?php echo htmlspecialchars($chisocu); ?>" required>
            </div>

            <div class="input-group">
                <label for="chisomoi">Chỉ số mới:</label>
                <input type="text" id="chisomoi" name="chisomoi" value="<?php echo htmlspecialchars($chisomoi); ?>" required>
            </div>

            <div class="input-group">
                <label for="dongia">Đơn giá (VNĐ):</label>
                <input type="text" id="dongia" name="dongia" value="<?php echo htmlspecialchars($dongia); ?>" required>
            </div>

            <div class="input-group">
                <label for="sotien">Số tiền (VNĐ):</label>
                <input type="text" id="sotien" name="sotien" value="<?php echo htmlspecialchars($sotien); ?>" readonly>
            </div>

            <button type="submit" name="tinh" class="btn-submit">TÍNH TOÁN</button>

        </form>
    </div>

</body>
</html>