<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cau5</title>
</head>
<body>
    <?php
    $x = isset($_POST['so1']) ? $_POST['so1'] : '';
    $y = isset($_POST['so2']) ? $_POST['so2'] : '';
    $tinh = isset($_POST['tinh']) ? $_POST['tinh'] : '';
    $ketqua = '';

    function timUCLN($a, $b) {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }

    function timBCNN($a, $b) {
        return ($a * $b) / timUCLN($a, $b);
    }

    function xuly($x, $y, $tinh) {
        switch ($tinh) {
            case 'UCLN':
                return timUCLN($x, $y);
            case 'BCNN':
                return timBCNN($x, $y);
            default:
                return 'Phép tính không hợp lệ';
        }
    }

    if (is_numeric($x) && is_numeric($y)) {
        $x = (int)$x;
        $y = (int)$y;
        $ketqua = xuly($x, $y, $tinh);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ketqua = 'Vui lòng nhập hai số hợp lệ';
    }
    ?>
    <h1 style="text-align: center;">TÍNH UCLN VÀ BCNN</h1>
    <hr size="2">
    <br>
    <form method="post" style="text-align: center;">
        Số thứ 1: <input type="text" name="so1" value="<?php echo htmlspecialchars($x); ?>"><br>
        Số thứ 2: <input type="text" name="so2" value="<?php echo htmlspecialchars($y); ?>"><br>
        Kết quả: &nbsp;<input type="text" name="ketqua" value="<?php echo htmlspecialchars($ketqua); ?>" readonly><br>
        <input type="submit" name="tinh" value="UCLN" > &nbsp;
        <input type="submit" name="tinh" value="BCNN" > &nbsp;
    </form>
</body>
</html>
