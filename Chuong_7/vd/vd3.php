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
$sql = "INSERT INTO khachhang VALUES ('K011', 'Meo Meo', '1907', '0909090111', 'Cà Mau')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<br>"."Đã thêm!";
} 
else {
    echo "<br>"."Không thêm được! Error: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
