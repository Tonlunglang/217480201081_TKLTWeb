<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Operations</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: center;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Matrix Operations</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="matrix">Enter matrix (rows separated by semicolons, numbers separated by commas):</label><br>
        <textarea id="matrix" name="matrix" rows="5" cols="50" required></textarea><br><br>
        <input type="checkbox" id="max" name="operation[]" value="max">
        <label for="max">Find Max</label><br>
        <input type="checkbox" id="min" name="operation[]" value="min">
        <label for="min">Find Min</label><br>
        <input type="checkbox" id="sum" name="operation[]" value="sum">
        <label for="sum">Calculate Sum</label><br>
        <input type="checkbox" id="print" name="operation[]" value="print">
        <label for="print">Print Matrix</label><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Nhận dữ liệu ma trận từ form và chuyển đổi thành mảng 2 chiều
        $matrixInput = $_POST["matrix"];
        $rows = explode(";", $matrixInput);
        $matrix = array_map(function($row) {
            return array_map('floatval', explode(",", $row));
        }, $rows);

        // Nhận loại thao tác từ form
        $operations = isset($_POST["operation"]) ? $_POST["operation"] : [];

        // Khởi tạo các biến cho kết quả
        $maxValue = null;
        $minValue = null;
        $sum = 0;

        // Duyệt qua từng phần tử của ma trận để thực hiện thao tác tương ứng
        foreach ($matrix as $row) {
            foreach ($row as $value) {
                // Tìm giá trị lớn nhất
                if ($maxValue === null || $value > $maxValue) {
                    $maxValue = $value;
                }
                // Tìm giá trị nhỏ nhất
                if ($minValue === null || $value < $minValue) {
                    $minValue = $value;
                }
                // Tính tổng các phần tử
                $sum += $value;
            }
        }

        // Hiển thị kết quả dựa trên loại thao tác
        if (in_array("max", $operations)) {
            echo "<h2>Max Value: $maxValue</h2>";
        }
        if (in_array("min", $operations)) {
            echo "<h2>Min Value: $minValue</h2>";
        }
        if (in_array("sum", $operations)) {
            echo "<h2>Sum of All Values: $sum</h2>";
        }
        if (in_array("print", $operations)) {
            // Hiển thị ma trận dưới dạng bảng
            echo "<h2>Matrix:</h2>";
            echo "<table>";
            foreach ($matrix as $row) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>
</body>
</html>
