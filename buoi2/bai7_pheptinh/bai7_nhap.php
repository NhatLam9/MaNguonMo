<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Phép tính</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
        }
        table { 
            margin: 20px auto; border: 0; 
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
        td { padding: 8px; }
    </style>
</head>
<body>
    <form action="bai7_ketqua.php" method="POST">
        <table>
            <tr>
                <td colspan="2">
                    <h2>Phép tính trên hai số</h2>
                </td>
            </tr>
            <tr>
                <td class="label-red" align="right">Chọn phép tính:</td>
                <td class="label-red">
                    <input type="radio" name="pheptinh" value="cong" checked> Cộng
                    <input type="radio" name="pheptinh" value="tru"> Trừ
                    <input type="radio" name="pheptinh" value="nhan"> Nhân
                    <input type="radio" name="pheptinh" value="chia"> Chia
                </td>
            </tr>
            <tr>
                <td class="label-blue" align="right">Số thứ nhất:</td>
                <td><input type="text" name="so1" required></td>
            </tr>
            <tr>
                <td class="label-blue" align="right">Số thứ nhì:</td>
                <td><input type="text" name="so2" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tính"></td>
            </tr>
        </table>
    </form>
</body>
</html>