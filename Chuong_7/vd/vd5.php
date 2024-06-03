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
}
echo "Connection successfully";

// Corrected SQL insert statement
$sql = "DELETE FROM khachhang WHERE makh = 'K011'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<br>"."Đã xóa!";
} 
else {
    echo "<br>"."Không xóa được! Error: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
