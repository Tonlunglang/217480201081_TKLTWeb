<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cau4</title>
</head>
<body>
    <?php
    $x = isset($_POST['so1']) ? $_POST['so1'] : '';
    $y = isset($_POST['so2']) ? $_POST['so2'] : '';
    $tinh = isset($_POST['tinh']) ? $_POST['tinh'] : '';
    $ketqua = '';

    function xuly($x, $y, $tinh) {
        switch ($tinh) {
            case 'Cộng':
                return $x + $y;
            case 'Trừ':
                return $x - $y;
            case 'Nhân':
                return $x * $y;
            case 'Chia':
                return $y != 0 ? $x / $y : 'Không thể chia cho 0';
            case 'Mod':
                return $y != 0 ? $x % $y : 'Không thể chia cho 0';
            default:
                return 'Phép tính không hợp lệ';
        }
    }

    if (is_numeric($x) && is_numeric($y)) {
        $ketqua = xuly($x, $y, $tinh);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ketqua = 'Vui lòng nhập hai số hợp lệ';
    }
    ?>
    <h1 style="text-align: center;">TÍNH TOÁN SỐ HỌC</h1>
    <hr size="2">
    <br>
    <form method="post" style="text-align: center;">
        Số thứ 1: <input type="text" name="so1" value="<?php echo htmlspecialchars($x); ?>"><br>
        Số thứ 2: <input type="text" name="so2" value="<?php echo htmlspecialchars($y); ?>"><br>
        Kết quả: &nbsp;<input type="text" name="ketqua" value="<?php echo htmlspecialchars($ketqua); ?>" readonly><br>
        <input type="submit" name="tinh" value="Cộng" > &nbsp;
        <input type="submit" name="tinh" value="Trừ" > &nbsp;
        <input type="submit" name="tinh" value="Nhân" > &nbsp;
        <input type="submit" name="tinh" value="Chia" > &nbsp;
        <input type="submit" name="tinh" value="Mod" > &nbsp;
    </form>
</body>
</html>
