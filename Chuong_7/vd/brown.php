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

$hoten = "";

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['txthoten'])){
        $hoten = $_POST['txthoten'];
    }

   // $sql = "SELECT * FROM danhsach WHERE hoten = '$hoten'";
   $sql = "SELECT * FROM danhsach ";
    echo "<table style = 'border-collapse: collapse' border = '1'>";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "
            <tr>
            <th>Mã sinh viên</th>
            <th>Họ tên</th>
            <th>Ngành học</th>
            <th>Tổng điểm</th>
            </tr>
            ";
            while($row = mysqli_fetch_array($result)){
                echo "
                <tr>
                    <td>".$row['msv']."</td>
                    <td>".$row['hoten']."</td>
                    <td>".$row['nganhhoc']."</td>
                    <td>".$row['tongdiem']."</td>
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
