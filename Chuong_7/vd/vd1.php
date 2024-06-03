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
    <table border="1", style="border-collapse: collapse;">
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

$sql = "SELECT * FROM khachhang";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "
        <tr>
        <th>MaKH</th>
        <th>TenKH</th>
        <th>Nam sinh</th>
        <th>Dia chi</th>
        <th>DT</th> </tr>"
        ;
        while ($row = mysqli_fetch_array($result)) {
            echo "
                <tr>
                    <td>".$row['makh']."</td>
                    <td>".$row['tenkh']."</td>
                    <td>".$row['namsinh']."</td>
                    <td>".$row['diachi']."</td>
                    <td>".$row['dienthoai']."</td>
                    </tr>";
        }
        mysqli_free_result($result);
    }
    else{
        echo " No records";
    }
}else{
    echo "Truy van that bai".mysqli_error($link);
}
mysqli_close($conn);
?>
</table>
</body>
</html>