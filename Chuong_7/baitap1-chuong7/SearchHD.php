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

   // $sql = "SELECT * FROM danhsach WHERE hoten = '$hoten'";
   $sql = "SELECT * FROM hoadon WHERE makh = '$makh'";
    echo "<table style = 'border-collapse: collapse' border = '1'>";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "
            <tr>
            <th>Mã hóa đơn</th>
            <th>Mã khách hàng</th>
            <th>Mã hàng</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            </tr>
            ";
            while($row = mysqli_fetch_array($result)){
                echo "
                <tr>
                    <td>".$row['mahd']."</td>
                    <td>".$row['makh']."</td>
                    <td>".$row['mahang']."</td>
                    <td>".$row['soluong']."</td>
                    <td>".$row['thanhtien']."</td>
                    </tr>";
            }
            echo "</table>";

            
            mysqli_free_result($result);
        }
        else {
            echo "No record!";
        }
    }
}

// Close connection
mysqli_close($conn);
?>
