<?php
$servername = "localhost";
$database = "quanlybanhang";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    exit();
}

$makh = "";
$tenkh = "";
$ngsinh = "";
$sodt = "";
$diachi = "";

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['txtmakh'])){
        $makh = $_POST['txtmakh'];
    }
    if(isset($_POST['txttenkh'])){
        $tenkh = $_POST['txttenkh'];
    }
    if(isset($_POST['txtngsinh'])){
        $ngsinh = $_POST['txtngsinh'];
    }
    if(isset($_POST['txtsodt'])){
        $sodt = $_POST['txtsodt'];
    }
    if(isset($_POST['txtdiachi'])){
        $diachi = $_POST['txtdiachi'];
    }
    $sql = "UPDATE khachhang SET tenkh = '$tenkh', namsinh = '$ngsinh', dienthoai = '$sodt', diachi = '$diachi' WHERE makh = '$makh'";

    if(mysqli_query($conn, $sql)) {
        echo "Cập nhật thành công";
    }
    else {
            echo "Cập nhật thất bại!".$sql."<br>".mysqli_error($conn);
    }
}
// Close connection
mysqli_close($conn);
?>
