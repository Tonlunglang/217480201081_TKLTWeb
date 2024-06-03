<?php
session_start();

if (!isset($_SESSION["username"]) || !isset($_SESSION["email"])) {
    header("Location: login.html");
    exit();
}

$username = $_SESSION["username"];
$email = $_SESSION["email"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang Chính</title>
</head>
<body>
    <h1>TRANG CHÍNH</h1>
    <p>Người dùng đã đăng nhập với tên <strong><?php echo htmlspecialchars($username); ?></strong> và Email là <strong><?php echo htmlspecialchars($email); ?></strong></p>
    <a href="cau21-login.html">Đăng xuất</a>
</body>
</html>
