<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hàng hóa</title>
    <style>
        button {
            width: 100px;
            height: 30px;
            border-radius: 5px;
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <form method="post" action="inserthanghoa.php">
        <h1 style="text-align: center;">HÀNG HÓA</h1>
        <div style="text-align: center;">
            <input type="text" name="txtmahang" value="" placeholder="Nhập mã hàng hóa"><br>
            <input type="text" name="txttenhh" value="" placeholder="Nhập tên hàng hóa"><br>
            <input type="text" name="txtnamsx" value="" placeholder="Nhập năm sản xuất"><br>
            <input type="text" name="txtgia" value="" placeholder="Nhập giá"><br>
            <select name="mansx" required>
                <option value="">Chọn nhà sản xuất</option>
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

                $sqli = "SELECT mansx FROM nhasanxuat";
                $result = mysqli_query($conn, $sqli);

                while ($row = mysqli_fetch_assoc($result)){
                    echo "<option value='" . $row['mansx']. "'>" . $row['mansx'] . "</option>";
                }
                // Close connection
                ?>
            </select><br>
            <button type="submit"><b>Insert</b></button>
        </div>
    </form>
</body>
</html>
