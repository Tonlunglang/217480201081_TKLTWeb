<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            text-align: center;
        }
    </style>
</head>
<body>
<?php
$servername = "localhost";
$database = "quanlybanhang";
$username = "root";
$password = "";
//crate connection
$conn = mysqli_connect($servername, $username, $password, $database);
//check connection
if(!$conn){
    die("connection failed: ".mysqli_connect_error());
}
echo ("connection successfully");
// mysqli_close($conn);

$sql = "SELECT makh, tenkh FROM khachhang";
$result = mysqli_query($conn, $sql);
echo "<select id='cars'>";
while ($row = mysqli_fetch_assoc($result)){
    echo "<option value=''>";
  
    echo $row['tenkh'];
    
    echo "</option>";
}
echo"</select>";
mysqli_free_result($result);
mysqli_close($conn);
?>
</body>
</html>