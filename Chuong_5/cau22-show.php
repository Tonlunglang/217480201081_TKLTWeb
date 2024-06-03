<?php
$name = isset($_COOKIE['name']) ? $_COOKIE['name'] : "Chưa có tên khách hàng";
$phone = isset($_COOKIE['phone']) ? $_COOKIE['phone'] : "Chưa có số điện thoại";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
</head>
<body>
    <h2>Thông tin khách hàng</h2>
    <p><strong>Tên khách hàng:</strong> <?php echo $name; ?></p>
    <p><strong>Số điện thoại:</strong> <?php echo $phone; ?></p>
</body>
</html>
