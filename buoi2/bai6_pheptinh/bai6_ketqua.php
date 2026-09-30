<?php
// Yêu cầu: Viết các hàm cộng, trừ, nhân, chia cho 2 số
function cong($a, $b) {
    return $a + $b;
}

function tru($a, $b) {
    return $a - $b;
}

function nhan($a, $b) {
    return $a * $b;
}

function chia($a, $b) {
    if ($b == 0) {
        return "Lỗi chia 0";
    }
    return $a / $b;
}

// Khởi tạo biến
$so1 = "";
$so2 = "";
$pheptinh_val = "";
$ten_pheptinh = "";
$ketqua = "";

// Lấy dữ liệu từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $so1 = isset($_POST["so1"]) ? trim($_POST["so1"]) : "";
    $so2 = isset($_POST["so2"]) ? trim($_POST["so2"]) : "";
    $pheptinh_val = isset($_POST["pheptinh"]) ? $_POST["pheptinh"] : "";

    // Kiểm tra dữ liệu hợp lệ
    if (is_numeric($so1) && is_numeric($so2)) {
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
    } else {
        $ketqua = "Dữ liệu không hợp lệ";
    }
} else {
    header("Location: bai6_nhap.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả phép tính</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { margin: 20px auto; border: 0; }
        h2 { color: #0055a4; text-transform: uppercase; text-align: center; }
        .label-red { color: #d9534f; font-weight: bold; }
        .label-blue { color: #0055a4; font-weight: bold; }
        td { padding: 8px; }
        
        input[type="text"] { text-align: right; }
        .back-link { font-style: italic; color: purple; text-decoration: underline; }
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="2"><h2>Phép tính trên hai số</h2></td>
        </tr>
        <tr>
            <td class="label-red" align="right">Chọn phép tính:</td>
            <td class="label-red"><?php echo $ten_pheptinh; ?></td>
        </tr>
        <tr>
            <td class="label-blue" align="right">Số 1:</td>
            <td><input type="text" value="<?php echo htmlspecialchars($so1); ?>" readonly></td>
        </tr>
        <tr>
            <td class="label-blue" align="right">Số 2:</td>
            <td><input type="text" value="<?php echo htmlspecialchars($so2); ?>" readonly></td>
        </tr>
        <tr>
            <td class="label-blue" align="right">Kết quả:</td>
            <td><input type="text" value="<?php echo htmlspecialchars($ketqua); ?>" readonly></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="javascript:window.history.back(-1);" class="back-link">Quay lại trang trước</a></td>
        </tr>
    </table>
</body>
</html>