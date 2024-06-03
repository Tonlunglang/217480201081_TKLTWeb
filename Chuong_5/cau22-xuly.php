<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    
    // Thiết lập cookie với thời gian tồn tại 10 phút
    setcookie("name", $name, time() + 600);
    setcookie("phone", $phone, time() + 600);
    
    header("Location: cau22-show.php");
    exit();
}
?>
