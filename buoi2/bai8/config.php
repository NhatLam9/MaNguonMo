<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Config</title>
    <style>
        body { 
            font-family: "Times New Roman", Times, serif; 
            font-size: 16px; margin: 20px; 
        }
        .back-btn { 
            margin-top: 15px; 
            display: inline-block; 
            text-decoration: none; 
            color: blue; }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : "";
    $address = isset($_POST['address']) ? trim($_POST['address']) : "";
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : "";
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : "";
    $country = isset($_POST['country']) ? trim($_POST['country']) : "";
    $note = isset($_POST['note']) ? trim($_POST['note']) : "";

    // Chuyển đổi các dấu ngắt dòng trong Note thành khoảng trắng để in trên cùng một dòng
    $note_inline = str_replace(array("\r\n", "\n", "\r"), ' ', $note);

    // In dữ liệu ra màn hình
    echo "Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập:<br>";
    echo "Họ tên: " . htmlspecialchars($fullname) . "<br>";
    echo "Address: " . htmlspecialchars($address) . "<br>";
    echo "Phone: " . htmlspecialchars($phone) . "<br>";
    echo "Gender: " . htmlspecialchars($gender) . "<br>";
    echo "Country: " . htmlspecialchars($country) . "<br>";
    echo "Note: " . htmlspecialchars($note_inline) . "<br>";
} else {
    echo "Không có dữ liệu gửi đến.";
}
?>

<br>
<a href="javascript:history.back();" class="back-btn">Quay về trang trước</a>

</body>
</html>