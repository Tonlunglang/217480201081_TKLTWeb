<?php
$servername = "localhost";
$database = "quanlybanhang";
$username = "root";
$password = "";

// Tạo kết nối
$conn = mysqli_connect($servername, $username, $password, $database);

// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    exit();
}

$mahang = "";
$tenhang = "";
$namsx = "";
$gia = "";
$mansx = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['txtmahang'])) {
        $mahang = $_POST['txtmahang'];
    }
    if (isset($_POST['txttenhh'])) {
        $tenhang = $_POST['txttenhh'];
    }
    if (isset($_POST['txtnamsx'])) {
        $namsx = $_POST['txtnamsx'];
    }
    if (isset($_POST['txtgia'])) {
        $gia = $_POST['txtgia'];
    }
    if (isset($_POST['mansx'])) {
        $mansx = $_POST['mansx'];
    }

    // Kiểm tra nếu mansx tồn tại trong bảng nhasanxuat
    $sql_check = "SELECT mansx FROM nhasanxuat WHERE mansx = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $mansx);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // Nếu mansx tồn tại, chèn dữ liệu vào bảng hanghoa
        $sql_insert = "INSERT INTO hanghoa (mahang, tenhang, namsx, gia, mansx) VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("sssss", $mahang, $tenhang, $namsx, $gia, $mansx);

        if ($stmt_insert->execute()) {
            echo "Thêm dữ liệu thành công";
        } else {
            echo "Thêm thất bại! " . $stmt_insert->error;
        }

        $stmt_insert->close();
    } else {
        echo "Thêm thất bại! Mã nhà sản xuất không tồn tại trong bảng nhasanxuat.";
    }

    $stmt_check->close();
}

// Đóng kết nối
mysqli_close($conn);
?>
