<?php
$servername = "localhost";
$database = "sinhvien";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    exit();
}

$msv = "";
$hoten = "";

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['txtmsv'])){
        $msv = $_POST['txtmsv'];
    }
    if(isset($_POST['txthoten'])){
        $hoten = $_POST['txthoten'];
    }
    $sql = "UPDATE danhsach SET hoten = '$hoten' WHERE msv = '$msv'";

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
