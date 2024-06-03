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
$nganhhoc = "";
$tongdiem = "";

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['txtmsv'])){
        $msv = $_POST['txtmsv'];
    }
    if(isset($_POST['txthoten'])){
        $hoten = $_POST['txthoten'];
    }
    if(isset($_POST['txtnganhhoc'])){
        $nganhhoc = $_POST['txtnganhhoc'];
    }
    if(isset($_POST['txttongdiem'])){
        $tongdiem = $_POST['txttongdiem'];
    }
    $sql = "INSERT INTO danhsach (msv, hoten, nganhhoc, tongdiem)
    VALUES ('$msv', '$hoten', '$nganhhoc', '$tongdiem')";
    
    if(mysqli_query($conn, $sql)){
        echo "Thêm dữ liệu thành công";
    }
    else {
            echo "Thêm thất bại!".$sql."<br>".mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
