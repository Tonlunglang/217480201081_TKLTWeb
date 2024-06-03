<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thong tin dang nhap</title>
</head>
<body>
<?php
session_start();

// Dummy data for validation
$Username = "user";
$Email = "user@gmail.com";
$Password = "123456";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if ($username === $Username && $email === $Email && $password === $Password) {
        // Set session variables
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        echo "<h1 style = 'text-align: center'>TRANG XỬ LÝ THÔNG TIN ĐĂNG NHẬP</h1>";
        echo "<hr style = 'border = 1px solid black'>";
        echo "<p>Thông tin đăng nhập hợp lệ</p>";
        // echo "<a href='cau21-mainpage.php'>Trang chính</a>";
        echo "<form action='cau21-mainpage.php' method='GET'><button type='submit'>Trang chính</button></form>";
    } else {
        echo "<h1>TRANG XỬ LÝ THÔNG TIN ĐĂNG NHẬP</h1>";
        echo "<p>Thông tin đăng nhập không hợp lệ. Vui lòng thử lại.</p>";
        echo "<a href='cau21-login.html'>Quay lại trang đăng nhập</a>";
    }
}
?>
</body>
</html>