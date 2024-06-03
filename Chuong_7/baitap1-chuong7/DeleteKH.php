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

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['txtmakh'])){
        $makh = $_POST['txtmakh'];
    }
    $sql = "DELETE FROM khachhang WHERE makh = '$makh'";

    if(mysqli_query($conn, $sql)){
        echo "Xóa thành công";
    }
    else {
            echo "Thất bại!".$sql."<br>".mysqli_error($conn);
    }
}
// Close connection
mysqli_close($conn);
?>
