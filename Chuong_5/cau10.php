<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Input and Display</title>
</head>
<body>
    <h2>Enter Integer Array</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="integer_array">Enter integers separated by commas:</label><br>
        <input type="text" id="integer_array" name="integer_array"><br><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Integer Array:</h2>
    <?php
    // Kiểm tra xem có dữ liệu được gửi từ form chưa
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $input_array = $_POST["integer_array"];

        // Tách chuỗi nhập thành mảng các số nguyên
        $numbers = explode(",", $input_array);

        // Kiểm tra mảng không rỗng và chỉ chứa các số nguyên
        if (!empty($numbers) && is_array($numbers) && count(array_filter($numbers, 'is_numeric')) === count($numbers)) {
            // Hiển thị mảng số nguyên
            echo "<ul>";
            foreach ($numbers as $number) {
                echo "<li>$number</li>";
            }
            echo "</ul>";

            // Đếm số chẵn
            $even_count = 0;
            foreach ($numbers as $number) {
                if ($number % 2 == 0) {
                    $even_count++;
                }
            }
            echo "<p>Total even numbers: $even_count</p>";

            // Tính tổng các số lẻ
            $odd_sum = 0;
            foreach ($numbers as $number) {
                if ($number % 2 != 0) {
                    $odd_sum += $number;
                }
            }
            echo "<p>Sum of odd numbers: $odd_sum</p>";

            // Xác định giá trị lớn nhất và nhỏ nhất của mảng
            // $max_value = max($numbers);
            $min_value = min($numbers);
            echo "<p>Maximum value: ".max($numbers)."</p>";
            echo "<p>Minimum value: $min_value</p>";

            // Xuất mảng theo chiều ngược lại
            echo "<h2>Reversed Array:</h2>";
            echo "<ul>";
            $reversed_array = array_reverse($numbers);
            foreach ($reversed_array as $number) {
                echo "<li>$number</li>";
            }
            echo "</ul>";
        } else {
            // Nếu mảng không hợp lệ, thông báo cho người dùng
            echo "Invalid input. Please enter integers separated by commas.";
        }
    }
    ?>
</body>
</html>
