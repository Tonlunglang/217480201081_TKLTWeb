<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dang nhap thanh vien</title>
    <style>
        h2 {
            background-color: yellow;
            width: 300px;
        }
    </style>
</head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <script>
        function togglePassword(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của nút submit
            var passwordInput = document.getElementById("passwordInput");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
    <center>
    <h2>Đăng nhập thành viên</h2>
    <br>
    <input type="text" placeholder="Email name" name="email" style="width: 200px;" required> <input type="text" value="@blu.edu.vn" style="width: 85px;" readonly><br><br>
    <input id="passwordInput" type="password" name="password" placeholder="Password" style="width: 250px;" required> <button type="button" onclick="togglePassword(event)">Hiện</button><br><br>
    <input type="text" placeholder="Mã số" name="ma_so" style="width: 300px;" required><br><br><br>
    <button style="text-align: center; width: 300px;" type="submit">Đăng nhập</button><br><br>
    <button style="text-align: center; width: 300px;" type="button">Đăng ký</button>
    </center>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin đăng nhập từ form
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ma_so = $_POST['ma_so'];

    // Đọc tập tin user.ini
    $users = parse_ini_file("user.ini", true);

    // Kiểm tra xem thông tin đăng nhập có khớp với dữ liệu trong tập tin user.ini không
    if (isset($users[$email]) && $users[$email]['password'] == $password && $users[$email]['ma_so'] == $ma_so) {
        // Tạo cookie lưu thông tin đăng nhập và đặt thời gian sống là 3 phút
        setcookie("email", $email, time() + 180, "/"); // Cookie hết hạn sau 3 phút (180 giây)
        // Chuyển hướng người dùng đến trang chính sau khi đăng nhập thành công
        header("Location: cau20-home.php");
        exit();
    } else {
        echo "<p style='color: red;'>Thông tin đăng nhập không chính xác. Vui lòng thử lại!</p>";
    }
}

// Kiểm tra nếu đã đăng nhập và cookie vẫn còn hiệu lực
if (isset($_COOKIE["email"]) && !empty($_COOKIE["email"])) {
    // Kiểm tra thời gian sống của cookie
    if ((int)$_COOKIE["email"] + 180 < time()) { // Chuyển đổi sang kiểu số nguyên trước khi thực hiện phép toán cộng
        // Xóa cookie và chuyển hướng người dùng đến trang đăng nhập
        setcookie("email", "", time() - 3600, "/");
        header("Location: cau20-login.php");
        exit();
    }
    // Nếu thời gian sống của cookie còn, người dùng vẫn đang đăng nhập
    // Bạn có thể tiếp tục hiển thị nội dung trang chính ở đây
}
?>

    </form>
</body>
</html>
