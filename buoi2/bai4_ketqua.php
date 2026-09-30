<?php
$toan = "";
$ly = "";
$hoa = "";
$diemchuan = "20";
$tongdiem = "";
$ketqua = "";

if (isset($_POST["xemketqua"])) {
    $toan = trim($_POST["toan"]);
    $ly = trim($_POST["ly"]);
    $hoa = trim($_POST["hoa"]);
    $diemchuan = trim($_POST["diemchuan"]);

    // Kiểm tra dữ liệu phải là số
    if (is_numeric($toan) && is_numeric($ly) && is_numeric($hoa) && is_numeric($diemchuan)) {
        
        // Ràng buộc điểm từng môn không được âm và không được lớn hơn 10 (Cho phép = 0)
        if ($toan < 0 || $toan > 10 || $ly < 0 || $ly > 10 || $hoa < 0 || $hoa > 10) {
            $tongdiem = "Lỗi";
            $ketqua = "Lỗi: Điểm môn 0-10";
        }
        // Ràng buộc điểm chuẩn phải lớn hơn 0 và tối đa là 30
        elseif ($diemchuan <= 0 || $diemchuan > 30) {
            $tongdiem = "Lỗi";
            $ketqua = "Lỗi: Chuẩn 1-30";
        } 
        // Hợp lệ thì tính tổng điểm và xét kết quả
        else {
            $tongdiem = $toan + $ly + $hoa;
            
            // Điều kiện đậu: Điểm các môn >= 0 (cho phép 0) và tổng điểm >= điểm chuẩn
            if ($toan >= 0 && $ly >= 0 && $hoa >= 0 && $tongdiem >= $diemchuan) {
                $ketqua = "Đậu";
            } else {
                $ketqua = "Rớt";
            }
        }
    } else {
        $tongdiem = "Lỗi";
        $ketqua = "Lỗi: Phải nhập số";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả thi đại học</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        .form-container {
            background-color: #fae6fa; 
            width: 380px;
            border: 1px solid #dca3dc;
        }

        h2 {
            background-color: #d8467b; 
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
            color: #834468; 
            font-size: 15px;
            font-weight: bold;
            width: 120px;
        }

        input[type="text"] {
            width: 200px;
            padding: 3px;
            border: 1px solid #a9a9a9;
        }

        .result-input {
            background-color: #feffc0; 
            color: red; 
            font-weight: bold;
        }

        .btn-container {
            text-align: center;
            padding-top: 10px;
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
        <h2>Kết quả thi đại học</h2>
        
        <form method="POST" action="">
            <table>
                <tr>
                    <td class="label-text">Toán:</td>
                    <td><input type="text" name="toan" value="<?php echo htmlspecialchars($toan); ?>"></td>
                </tr>
                <tr>
                    <td class="label-text">Lý:</td>
                    <td><input type="text" name="ly" value="<?php echo htmlspecialchars($ly); ?>"></td>
                </tr>
                <tr>
                    <td class="label-text">Hoá:</td>
                    <td><input type="text" name="hoa" value="<?php echo htmlspecialchars($hoa); ?>"></td>
                </tr>
                <tr>
                    <td class="label-text">Điểm chuẩn:</td>
                    <td><input type="text" name="diemchuan" value="<?php echo htmlspecialchars($diemchuan); ?>"></td>
                </tr>
                <tr>
                    <td class="label-text">Tổng điểm:</td>
                    <td><input type="text" name="tongdiem" class="result-input" value="<?php echo htmlspecialchars($tongdiem); ?>" readonly></td>
                </tr>
                <tr>
                    <td class="label-text">Kết quả thi:</td>
                    <td><input type="text" name="ketqua" class="result-input" value="<?php echo htmlspecialchars($ketqua); ?>" readonly></td>
                </tr>
            </table>
            
            <div class="btn-container">
                <input type="submit" name="xemketqua" value="Xem kết quả">
            </div>
        </form>
    </div>

</body>
</html>