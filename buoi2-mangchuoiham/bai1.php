<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài tập Mảng và Form PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        .result { margin-top: 20px; padding: 15px; border: 1px solid #ccc; background-color: #f9f9f9; }
        .error { color: red; font-weight: bold; }
    </style>
</head>
<body>

    <!-- Tạo form nhập số tự nhiên n -->
    <form method="POST" action="">
        <label for="n">Nhập n:</label>
        <input type="text" name="n" id="n" value="<?php echo isset($_POST['n']) ? htmlspecialchars($_POST['n']) : ''; ?>" required>
        <button type="submit" name="submit">Thực hiện</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $n = trim($_POST['n']);

        echo "<div class='result'>";
        
        // a- Kiểm tra n có phải là số nguyên dương
        if (filter_var($n, FILTER_VALIDATE_INT) !== false && (int)$n > 0) {
            $n = (int)$n;
            $arr = [];

            // b- Phát sinh ngẫu nhiên mảng có n phần tử là số nguyên
            // (Sử dụng khoảng từ -50 đến 150 để đảm bảo có thể xuất hiện số âm, số 0 và số > 100 phục vụ test)
            for ($i = 0; $i < $n; $i++) {
                $arr[] = rand(-50, 150); 
            }
            
            echo "<b>Mảng vừa phát sinh:</b> " . implode(", ", $arr) . "<br>";

            // Khởi tạo các biến lưu kết quả
            $countEven = 0;
            $countLess100 = 0;
            $sumNegative = 0;
            $zeroPositions = [];

            // Duyệt mảng để xử lý các yêu cầu c, d, e, f
            foreach ($arr as $index => $value) {
                // c- Đếm số phần tử trong mảng có giá trị là số chẵn
                if ($value % 2 == 0) {
                    $countEven++;
                }

                // d- Đếm số phần tử trong mảng có giá trị là số nhỏ hơn 100
                if ($value < 100) {
                    $countLess100++;
                }

                // e- Tính tổng của các phần tử trong mảng có giá trị là số âm
                if ($value < 0) {
                    $sumNegative += $value;
                }

                // f- Tìm vị trí của các phần tử trong mảng có giá trị bằng 0
                if ($value == 0) {
                    $zeroPositions[] = $index; // Lưu vị trí (index bắt đầu từ 0)
                }
            }

            // In kết quả thống kê
            echo "<ul>";
            echo "<li><b>Số phần tử chẵn:</b> $countEven</li>";
            echo "<li><b>Số phần tử nhỏ hơn 100:</b> $countLess100</li>";
            echo "<li><b>Tổng các phần tử âm:</b> $sumNegative</li>";
            
            if (count($zeroPositions) > 0) {
                echo "<li><b>Vị trí các phần tử bằng 0 (index):</b> " . implode(", ", $zeroPositions) . "</li>";
            } else {
                echo "<li><b>Vị trí các phần tử bằng 0:</b> Không có phần tử nào bằng 0 trong mảng.</li>";
            }
            echo "</ul>";

            // g- Sắp xếp các phần tử theo thứ tự tăng dần rồi in mảng ra màn hình
            sort($arr);
            echo "<b>Mảng sau khi sắp xếp tăng dần:</b> " . implode(", ", $arr) . "<br>";

        } else {
            // Hiển thị lỗi nếu n không phải số nguyên dương
            echo "<span class='error'>Lỗi: Vui lòng nhập n là một số nguyên dương (n > 0)!</span>";
        }
        
        echo "</div>";
    }
    ?>

</body>
</html>