<?php
// Yêu cầu 1: Hàm kiểm tra dữ liệu nhập vào
function kiem_tra_du_lieu($a, $b, $phep_tinh) {
    // Kiểm tra xem dữ liệu có bị rỗng hoặc không phải là số (chuỗi ký tự)
    if (!is_numeric($a) || !is_numeric($b)) {
        // Tự động quay lại trang trước bằng Javascript kèm thông báo
        echo "<script>
                alert('Lỗi: Dữ liệu nhập vào phải là số hợp lệ!');
                window.history.back();
              </script>";
        exit();
    }

    // Kiểm tra lỗi chia cho 0
    if ($phep_tinh === 'chia' && $b == 0) {
        echo "<script>
                alert('Lỗi: Không thể thực hiện phép chia cho 0!');
                window.history.back();
              </script>";
        exit();
    }
}

// Các hàm tính toán cơ bản
function cong($a, $b) { return $a + $b; }
function tru($a, $b) { return $a - $b; }
function nhan($a, $b) { return $a * $b; }
function chia($a, $b) { return $a / $b; }

// Khởi tạo biến
$so1 = "";
$so2 = "";
$pheptinh_val = "";
$ten_pheptinh = "";
$ketqua = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $so1 = isset($_POST["so1"]) ? trim($_POST["so1"]) : "";
    $so2 = isset($_POST["so2"]) ? trim($_POST["so2"]) : "";
    $pheptinh_val = isset($_POST["pheptinh"]) ? $_POST["pheptinh"] : "";

    // Gọi hàm kiểm tra dữ liệu trước khi thực hiện tính toán
    kiem_tra_du_lieu($so1, $so2, $pheptinh_val);

    // Xử lý trường hợp là số thực bằng cách ép kiểu (float)
    $so1 = (float)$so1;
    $so2 = (float)$so2;

    switch ($pheptinh_val) {
        case 'cong':
            $ketqua = cong($so1, $so2);
            $ten_pheptinh = "Cộng";
            break;
        case 'tru':
            $ketqua = tru($so1, $so2);
            $ten_pheptinh = "Trừ";
            break;
        case 'nhan':
            $ketqua = nhan($so1, $so2);
            $ten_pheptinh = "Nhân";
            break;
        case 'chia':
            $ketqua = chia($so1, $so2);
            $ten_pheptinh = "Chia";
            break;
    }

    // Yêu cầu 2: Điều khiển xuất dữ liệu
    // Nếu kết quả là số thực có nhiều chữ số thập phân, làm tròn về tối đa 3 chữ số
    if (is_float($ketqua)) {
        $ketqua = round($ketqua, 3);
    }
} else {
    header("Location: bai7_nhap.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kết quả phép tính</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
        }
        table { 
            margin: 20px auto; 
            border: 0; 
        }
        h2 { 
            color: #0055a4; 
            text-transform: uppercase; 
            text-align: center; 
        }
        .label-red { 
            color: #d9534f; 
            font-weight: bold; 
        }
        .label-blue { 
            color: #0055a4; 
            font-weight: bold; 
        }
        td { 
            padding: 8px; 
        }
        input[type="text"] { 
            text-align: right; 
        }
        .back-link { 
            font-style: italic; 
            color: purple; 
            text-decoration: underline; 
            cursor: pointer; 
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="2">
                <h2>Phép tính trên hai số</h2>
            </td>
        </tr>
        <tr>
            <td class="label-red" align="right">Chọn phép tính:</td>
            <td class="label-red"><?php echo $ten_pheptinh; ?></td>
        </tr>
        <tr>
            <td class="label-blue" align="right">Số 1:</td>
            <td>
                <input 
                    type="text" 
                    value="
                    <?php echo htmlspecialchars($so1); ?>" readonly>
            </td>
        </tr>
        <tr>
            <td class="label-blue" align="right">Số 2:</td>
            <td>
                <input 
                    type="text" 
                    value="
                    <?php echo htmlspecialchars($so2); ?>" readonly>
            </td>
        </tr>
        <tr>
            <td class="label-blue" align="right">Kết quả:</td>
            <td>
                <input 
                    type="text" 
                    value="
                    <?php echo htmlspecialchars($ketqua); ?>" readonly>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <a onclick="window.history.back();" class="back-link">Quay lại trang trước</a>
            </td>
        </tr>
    </table>
</body>
</html>