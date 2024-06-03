<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$database = "quanlybanhang";
$conn = mysqli_connect($servername, $username, $password, $database);

// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Xử lý dữ liệu từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu được chọn từ form
    $selected_data = isset($_POST['data']) ? $_POST['data'] : [];

    // Kiểm tra xem có dữ liệu được chọn không
    if (empty($selected_data)) {
        echo "Vui lòng chọn ít nhất một mục từ danh sách trước khi tiếp tục.";
    } else {
        // Liệt kê dữ liệu từng bảng theo yêu cầu
        foreach ($selected_data as $data) {
            $sql = "SELECT * FROM $data";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<h2>Dữ liệu từ bảng $data</h2>";
                echo "<table border='1' style='border-collapse: collapse'>";
                // Hiển thị tiêu đề của bảng
                echo "<tr>";
                while ($row = mysqli_fetch_field($result)) {
                    echo "<th>" . $row->name . "</th>";
                }
                echo "</tr>";

                // Hiển thị dữ liệu từ cơ sở dữ liệu
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>" . $value . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";

                // Thực hiện truy vấn để đếm số lượng bản ghi trong bảng
                $sql_count = "SELECT COUNT(*) AS total FROM $data";
                $result_count = mysqli_query($conn, $sql_count);
                $row_count = mysqli_fetch_assoc($result_count);
                $total_records = $row_count['total'];
                echo "<p>Tổng số dữ liệu trong bảng $data là: $total_records</p>";

                // Nếu là bảng hàng hóa, hiển thị số lượng mã hàng hóa cho từng nhà sản xuất
                if ($data === "hanghoa") {
                    $sql_mansx = "SELECT mansx, COUNT(mahang) AS soLuongHangHoa FROM hanghoa GROUP BY mansx";
                    $result_mansx = mysqli_query($conn, $sql_mansx);

                    if (mysqli_num_rows($result_mansx) > 0) {
                        // Hiển thị kết quả dưới dạng bảng
                        echo "<h3>Số lượng mã hàng hóa cho từng nhà sản xuất</h3>";
                        echo "<table border='1' style='border-collapse: collapse'>";
                        echo "<tr><th>Mã Nhà Sản Xuất</th><th>Số Lượng Mã Hàng Hóa</th></tr>";
                        while ($row_mansx = mysqli_fetch_assoc($result_mansx)) {
                            echo "<tr><td>" . $row_mansx["mansx"] . "</td><td>" . $row_mansx["soLuongHangHoa"] . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Không có dữ liệu.";
                    }
                }
            } else {
                echo "Không có dữ liệu từ bảng $data";
            }
        }
    }
}

// Đóng kết nối
mysqli_close($conn);
?>
