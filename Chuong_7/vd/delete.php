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

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['txtmsv'])){
        $msv = $_POST['txtmsv'];
    }
    $sql = "DELETE FROM danhsach WHERE msv = $msv";
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
